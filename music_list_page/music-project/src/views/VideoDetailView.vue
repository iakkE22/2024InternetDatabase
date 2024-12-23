<template>
  <div class="video-detail">
    <div class="video-player" v-if="video.VideoPath">
      <video :src="video.VideoPath" controls autoplay></video>
    </div>
    <div class="video-info">
      <h1>{{ video.Title }}</h1>
      <p>艺术家ID: {{ video.ArtistID }}</p>
      <!-- 使用 LikeButton 组件 -->
      <LikeButton :likes="video.LikeCount" @like="onLike" />
    </div>

    <!-- 评论功能 -->
    <div class="comment-section">
      <h2>评论</h2>
      <textarea v-model="newComment" placeholder="写下你的评论..." />
      <button @click="addMvComment">发表评论</button>
      <div class="comment-list">
        <div v-for="(comment, index) in comments" :key="index" class="comment">
          <p><strong>用户ID: {{ comment.UserID }}</strong></p>
          <p>{{ comment.CommentText }}</p>
          <p class="comment-date">{{ comment.CommentDate }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LikeButton from "@/components/LikeButton.vue";
import axios from "axios";

export default {
  components: {
    LikeButton,
  },
  data() {
    return {
      video: {
        MVID: "",
        Title: "",
        ArtistID: "",
        VideoPath: "",
        LikeCount: 0,
      },
      newComment: "",
      comments: [], // 评论列表
    };
  },
  async created() {
    const videoId = this.$route.query.id;
    if (!videoId) {
      alert("视频 ID 丢失！");
      this.$router.push("/");
      return;
    }
    await this.fetchVideoDetail(videoId);
    await this.fetchComments(videoId);
  },
  methods: {
    // 获取视频详情
    async fetchVideoDetail(videoId) {
      try {
        const response = await axios.get(
          `http://localhost:8080/index.php?r=api/get-video-detail&id=${videoId}`
        );
        if (response.data.status === 1) {
          this.video = response.data.data.video;
        } else {
          alert("加载视频详情失败！");
        }
      } catch (error) {
        console.error("加载视频详情时发生错误：", error);
        alert("无法加载视频，请稍后再试！");
      }
    },
    // 获取评论
    async fetchComments(videoId) {
      try {
        const response = await axios.get(
          `http://localhost:8080/index.php?r=api/get-comments&videoId=${videoId}`
        );
        if (response.data.status === 1) {
          this.comments = response.data.data.comments;
        } else {
          console.error("加载评论失败：", response.data.message);
        }
      } catch (error) {
        console.error("加载评论时发生错误：", error);
        alert("无法加载评论，请稍后再试！");
      }
    },
    // 点赞
    async onLike() {
      try {
        const response = await axios.post(
          `http://localhost:8080/index.php?r=api/like-mv`,
          { MVID: this.video.MVID }
        );
        if (response.data.status === 1) {
          this.video.LikeCount += 1;
        } else {
          console.error("点赞失败：", response.data.message);
        }
      } catch (error) {
        console.error("点赞时发生错误：", error);
        alert("点赞失败，请稍后再试！");
      }
    },
    // 添加评论
    async addMvComment() {
      if (!this.newComment.trim()) {
        alert("评论内容不能为空！");
        return;
      }
      try {
        const response = await axios.post(
          `http://localhost:8080/index.php?r=api/add-mv-comment`, // 确保 API 路径正确
          {
            MVID: this.video.MVID, // 视频 ID
            CommentText: this.newComment.trim(), // 去除多余空格的评论内容
          },
          { withCredentials: true } // 确保携带 session/cookie 信息
        );

        if (response.data.status === 1) {
          // 评论成功后，将新评论插入到列表顶部
          this.comments.unshift({
            UserID: response.data.data.UserID, // 从后端获取的用户 ID
            CommentText: response.data.data.CommentText, // 后端返回的评论内容
            CommentDate: response.data.data.CommentDate, // 后端返回的评论时间
          });
          this.newComment = ""; // 清空评论输入框
        } else {
          // API 返回错误信息
          console.error("评论失败：", response.data.message);
          alert(`发表评论失败：${response.data.message}`);
        }
      } catch (error) {
        // 捕获异常（如网络问题或服务器异常）
        console.error("发表评论时发生错误：", error);
        alert("发表评论失败，请检查网络或稍后再试！");
      }
    },
  },
};
</script>

<style scoped>
/* 样式保持不变 */
.video-detail {
  padding: 20px;
}
.video-player {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}
.video-player video {
  width: 100%;
  border-radius: 10px;
}
.video-info {
  margin-top: 20px;
}
.video-info h1 {
  margin: 0;
  font-size: 24px;
}
.video-info p {
  margin: 10px 0;
  color: #666;
}
.comment-section {
  margin-top: 30px;
  padding: 15px;
  background: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}
.comment-section textarea {
  width: 100%;
  height: 100px;
  margin-bottom: 10px;
  resize: none;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}
.comment-section button {
  padding: 8px 12px;
  background: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s ease;
}
.comment-section button:hover {
  background: #0056b3;
}
.comment-list {
  max-height: 300px;
  overflow-y: auto;
  margin-top: 20px;
  padding: 10px;
  background: #fff;
  border-radius: 8px;
  border: 1px solid #ddd;
  box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}
.comment {
  margin-bottom: 10px;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
  font-size: 14px;
  color: #555;
}
.comment:last-child {
  border-bottom: none;
}
</style>
