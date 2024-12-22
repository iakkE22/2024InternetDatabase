<template>
    <div id="app">
      <!-- 导航栏 -->
      <header>
        <h1>音乐世界</h1>
      </header>
  
      <!-- 歌单滑动展示 -->
      <main>
        <h2>推荐歌单</h2>
        <div class="slider-container">
          <!-- 左箭头 -->
          <button class="arrow left" @click="slideLeft">←</button>
  
          <!-- 歌单展示区域 -->
          <div class="playlist-wrapper">
            <div
              class="playlist-card"
              v-for="(playlist, index) in playlists"
              :key="playlist.id"
              :class="{ visible: isCardVisible(index) }"
              :style="cardStyle(index)"
            >
              <img :src="playlist.cover" alt="歌单封面" />
              <h3>{{ playlist.name }}</h3>
              <p>{{ playlist.description }}</p>
            </div>
          </div>
  
          <!-- 右箭头 -->
          <button class="arrow right" @click="slideRight">→</button>
        </div>
      </main>
  
      <!-- 底部 -->
      <footer>
        <p>版权所有 © 2024 音乐世界</p>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "HomePage",
    data() {
      return {
        playlists: [
          { id: 1, name: "流行经典", description: "精选流行音乐合集", cover: require("@/assets/images/playlist_covers/edm.jpg") },
          { id: 2, name: "轻音乐", description: "舒缓心情的轻音乐", cover: require("@/assets/images/playlist_covers/light.jpg") },
          { id: 3, name: "电子舞曲", description: "动感十足的电子乐", cover: require("@/assets/images/playlist_covers/pop.jpg") },
          { id: 4, name: "摇滚经典", description: "不可错过的摇滚金曲", cover: require("@/assets/images/playlist_covers/rock.jpg") },
          { id: 5, name: "爵士乐", description: "品味高雅的爵士乐", cover: require("@/assets/images/playlist_covers/jazz.jpg") },
          { id: 6, name: "古典音乐", description: "经典永恒的古典之声", cover: require("@/assets/images/playlist_covers/classical.jpg") },
        ],
        visibleStartIndex: 0, // 当前展示的起始索引
        windowSize: 3, // 每次展示的歌单数量
      };
    },
    methods: {
      slideLeft() {
        // 左滑，起始索引减1，支持循环
        this.visibleStartIndex =
          (this.visibleStartIndex - 1 + this.playlists.length) %
          this.playlists.length;
      },
      slideRight() {
        // 右滑，起始索引加1，支持循环
        this.visibleStartIndex =
          (this.visibleStartIndex + 1) % this.playlists.length;
      },
      cardStyle(index) {
    const cardWidth = 220; // 卡片宽度（200px） + 间距（20px）
    const total = this.playlists.length; // 总卡片数
    const relativeIndex = (index - this.visibleStartIndex + total) % total;
    return {
      transform: `translateX(${relativeIndex * cardWidth}px)`,
      transition: "transform 0.5s ease",
    };
  },
      isCardVisible(index) {
        // 确定卡片是否在当前窗口内
        const total = this.playlists.length;
        const relativeIndex = (index - this.visibleStartIndex + total) % total;
        return relativeIndex < this.windowSize;
      },
    },
  };
  </script>
  
  <style scoped>
  /* 样式调整 */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
  }
  
  /* 导航栏 */
  header {
    background-color: #333;
    color: white;
    padding: 1em;
    text-align: center;
  }
  
  /* 滑动展示容器 */
  .slider-container {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 1em;
    padding: 2em;
    position: relative;
    overflow: hidden;
    width: 627px;
    margin: 0 auto;
  }
  
  /* 左右箭头样式 */
  .arrow {
  position: absolute; /* 绝对定位基于父容器 */
    top: 50%; /* 垂直居中 */
    transform: translateY(-50%);
    background: #333;
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    cursor: pointer;
    font-size: 1.5em;
    z-index: 10; /* 确保箭头在卡片之上 */
  }
  
  .arrow.left {
    left: 10px; /* 左箭头相对于容器左侧的偏移（负值将其移到容器外部） */
  }
  
  /* 右箭头位置 */
  .arrow.right {
    right: -1px; /* 右箭头相对于容器右侧的偏移（负值将其移到容器外部） */
  }
  
  .arrow:hover {
    background: #555;
  }
  
  /* 歌单卡片容器 */
  .playlist-wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* 卡片从左对齐 */
    position: relative;
    width:580px; /* 容器的总宽度 */
    height: 450px;
  }
  
  /* 歌单卡片 */
  .playlist-card {
    position: absolute;
    z-index: 1;
    width: 200px;
    height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    border-radius: 0.6em;
    overflow: hidden;
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.5, 1), box-shadow 0.6s ease;
  }
  
  /* 悬停时的放大效果 */
  .playlist-card:hover {
    transform: scale(1.1); /* 卡片放大 */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* 提高阴影 */
    z-index: 10; /* 提升层级 */
  }
  
  /* 卡片图片样式 */
  .playlist-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.5, 1);
  }
  
  /* 图片悬停效果 */
  .playlist-card:hover img {
    transform: scale(1.1); /* 图片同步放大 */
  }
  
  /* 卡片内容样式 */
  .playlist-card h3 {
    font-size: 1.2em;
    color: #333;
    margin: 0.5em 0 0;
    text-align: center;
  }
  
  .playlist-card p {
    font-size: 0.9em;
    color: #666;
    margin: 0.5em 0;
    line-height: 1.2;
    padding: 0 10px;
    text-align: center;
    transition: opacity 0.5s ease, transform 0.5s ease;
  }
  
  /* 内容显隐效果 */
  .playlist-card:not(:hover) p {
    opacity: 0; /* 隐藏文字 */
    transform: translateY(10px); /* 下移文字 */
  }
  
  .playlist-card:hover p {
    opacity: 1; /* 显示文字 */
    transform: translateY(0); /* 回归原位 */
  }
  
  
  
  footer {
    text-align: center;
    padding: 1em;
    background-color: #333;
    color: white;
  }
  </style>
  