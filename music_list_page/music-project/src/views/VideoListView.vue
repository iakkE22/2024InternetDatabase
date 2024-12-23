<template>
  <div class="video-list">
    <h1>推荐视频</h1>
    <div class="video-grid">
      <div
        class="video-item"
        v-for="(video, index) in videos"
        :key="index"
        @click="goToVideoDetail(video)"
      >
        <!-- 视频缩略图 -->
        <img :src="video.thumbnail" alt="视频缩略图" />
        <!-- 视频信息和点赞按钮 -->
        <div class="video-info">
          <div class="info-left">
            <h3>{{ video.title }}</h3>
            <p class="views">{{ video.views }} 次观看</p>
          </div>
          <LikeButton :likes="video.likes" @like="handleLike(video.id)" />
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
      videos: [
        {
          id: 1,
          title: "Bejewled",
          thumbnail: "/music-project/assets/images/song_covers/BejewledCover.jpg", // 视频缩略图
          views: "1.2万", // 浏览次数
        },
        {
          id: 2,
          title: "Whiplash",
          thumbnail: "/music-project/assets/images/song_covers/WhiplashCover.jpg",
          views: "3.4万",
        },
        {
          id: 3,
          title: "启示录",
          thumbnail: "/music-project/assets/images/song_covers/启示录cover.jpg",
          views: "2.8万",
        },
        {
          id: 4,
          title: "Accidino",
          thumbnail: "/music-project/assets/images/song_covers/AccidinoCover.jpg",
          views: "1.1万",
        },
        {
          id: 5,
          title: "Queencard",
          thumbnail: "/music-project/assets/images/song_covers/QueencardCover.jpg",
          views: "1.1万",
        },
      ],
    };
  },
  methods: {  
    handleLike(videoId) {
      const video = this.videos.find((v) => v.id === videoId);
      if (video) {
        video.likes += 1;
        console.log(`Liked video with ID: ${videoId}, new likes count: ${video.likes}`);
      }
    },
    goToVideoDetail(video) {
      this.$router.push({ name: "videoDetail", params: { id: video.id } });
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
  justify-content: center; /* 居中排列 */
}

.video-item {
  width: 320px; /* 增大宽度 */
  cursor: pointer;
  transition: transform 0.3s ease;
}

.video-item:hover {
  transform: scale(1.05);
}

.video-item img {
  width: 100%;
  height: 180px; /* 增加图片高度 */
  border-radius: 8px;
  margin-bottom: 10px; /* 间距 */
}

/* 视频信息区域 */
.video-info {
  display: flex;
  justify-content: space-between; /* 左右分布 */
  align-items: center; /* 垂直居中 */
  margin-top: 10px; /* 与图片的间距 */
}

/* 信息左侧：标题和观看次数 */
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