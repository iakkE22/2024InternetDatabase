<template>
  <div class="video-list">
    <h1>推荐视频</h1>
    <div class="video-grid">
      <div
        class="video-item"
        v-for="video in videos"
        :key="video.MVID"
        @click="goToVideoDetail(video.MVID)"
      >
        <!-- 视频封面 -->
        <img :src="video.CoverImage || '/music-project/assets/images/loading.gif'" alt="视频封面" />
        <!-- 视频信息和点赞按钮 -->
        <div class="video-info">
          <div class="info-left">
            <h3>{{ video.Title }}</h3>
            <p class="views">{{ video.LikeCount }} 次点赞</p>
          </div>
          <LikeButton :likes="video.LikeCount" @like="handleLike(video.MVID)" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LikeButton from "@/components/LikeButton.vue"; // 引入 LikeButton 组件

export default {
  components: {
    LikeButton,
  },
  data() {
    return {
      videos: [], // 视频数据
    };
  },
  mounted() {
    this.fetchVideos(); // 页面加载时获取视频数据
  },
  methods: {
    // 获取视频数据
    async fetchVideos() {
      try {
        const response = await fetch("http://localhost:8080/index.php?r=api/get-mvs");
        const data = await response.json();
        if (data.status === 1) {
          this.videos = data.data.mvs; // 直接使用后端返回的数据
        } else {
          console.error("获取视频数据失败：", data.message);
        }
      } catch (error) {
        console.error("请求视频数据时出错：", error);
      }
    },
    // 跳转到视频详情页
    goToVideoDetail(MVID) {
      this.$router.push({
        name: "videoDetail",
        params: { id: MVID },
      });
    },
    // 处理点赞
    async handleLike(MVID) {
      try {
        const video = this.videos.find((v) => v.MVID === MVID);
        if (!video) return;

        const originalLikeCount = video.LikeCount;
        video.LikeCount += 1;

        const response = await fetch("http://localhost:8080/index.php?r=api/like-mv", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ MVID }),
        });

        const data = await response.json();
        if (data.status !== 1) {
          video.LikeCount = originalLikeCount; // 如果失败，回滚点赞数
          console.error("点赞失败：", data.message);
        }
      } catch (error) {
        console.error("点赞时发生错误：", error);
      }
    },
  },
};
</script>

<style scoped>
.video-list {
  padding: 20px;
}

.video-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

.video-item {
  width: 320px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.video-item:hover {
  transform: scale(1.05);
}

.video-item img {
  width: 100%;
  height: 180px;
  border-radius: 8px;
  margin-bottom: 10px;
}

/* 视频信息区域 */
.video-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.info-left h3 {
  margin: 0;
  font-size: 16px;
  font-weight: bold;
}

.info-left .views {
  margin: 5px 0 0;
  font-size: 12px;
  color: #666;
}
</style>
