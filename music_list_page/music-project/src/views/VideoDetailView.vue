<template>
    <div class="video-detail">
      <div class="video-player">
        <video :src="video.url" controls autoplay></video>
      </div>
      <div class="video-info">
        <h1>{{ video.title }}</h1>
        <p>{{ video.description }}</p>
        <p>{{ video.views }} 次观看</p>
          <!-- 使用 LikeButton 组件 -->
      <LikeButton :likes="video.likes" @like="onLike" />
      </div>

      <!-- 评论功能 -->
    <div class="comment-section">
      <h2>评论</h2>
      <textarea v-model="newComment" placeholder="写下你的评论..." />
      <button @click="addComment">发表评论</button>
      <div class="comment-list">
        <div v-for="(comment, index) in comments" :key="index" class="comment">
          <p><strong>{{ comment.user }}</strong>: {{ comment.text }}</p>
        </div>
      </div>
    </div>
    </div>
  </template>
  
  <script>
  import LikeButton from "@/components/LikeButton.vue";
  export default {
    components: {
    LikeButton,
  },
    data() {
      return {
        video: {
          title: "",
          description: "",
          url: "",
          views: "",
          likes:"",
        },
        newComment: "",
      comments: [
        { user: "用户1", text: "这个视频真棒！" },
        { user: "用户2", text: "喜欢这个音乐！" },
      ],
      };
    },
    created() {
      // 根据路由参数加载视频数据
      const videoId = this.$route.params.id;
      const mockVideos = [
        {
          id: 1,
          title: "Bejewled",
          description: "这是一段动感十足的音乐视频！",
          url: "/music-project/assets/video/Bejewled.mp4", // 视频文件路径
          views: "1.2万",
        },
        {
          id: 2,
          title: "Whiplash",
          description: "一首浪漫的情歌，适合夜晚倾听。",
          url: "/music-project/assets/video/Whiplash.mp4",
          views: "3.4万",
        },
        {
          id: 3,
          title: "启示录",
          description: "摇滚之夜，让你嗨翻天！",
          url: "/music-project/assets/video/启示录.mp4",
          views: "2.8万",
        },
        {
          id: 4,
          title: "Accidino",
          description: "古典音乐让你感受到音乐的优雅。",
          url: "/music-project/assets/video/Accidino.mp4",
          views: "1.1万",
        },
        {
          id: 5,
          title: "Queencard",
          description: "古典音乐让你感受到音乐的优雅。",
          url: "/music-project/assets/video/Queencard.mp4",
          views: "1.1万",
        },
      ];
  
      // 根据 ID 查找视频
      this.video = mockVideos.find((v) => v.id === parseInt(videoId)) || {};
    },
    methods: {
      onLike(isLikedChange) {
    if (isLikedChange > 0) {
      this.video.likes += 1; // 点赞
    } else {
      this.video.likes -= 1; // 取消点赞
    }
  },
  addComment() {
    if (this.newComment.trim()) {
      // 添加新评论
      this.comments.push({
        user: "匿名用户",
        text: this.newComment,
      });
      this.newComment = ""; // 清空输入框
    }
  },
},
  };
  </script>
  
  <style scoped>
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
  resize: none; /* 禁用调整大小 */
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
  max-height: 300px; /* 固定高度 */
  overflow-y: auto; /* 启用垂直滚动条 */
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
  