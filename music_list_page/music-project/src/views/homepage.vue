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
              :key="playlist.PlaylistID"
              :class="{ visible: isCardVisible(index) }"
              :style="cardStyle(index)"
              @click="goToPlaylist(playlist.url)"
            >
              <img
                :src="playlist.CoverImage || '/music-project/assets/images/loading.gif'"
                alt="歌单封面"
              />
              <h3>{{ playlist.Title }}</h3>
              <p>{{ playlist.Description }}</p>
            </div>
          </div>
  
          <!-- 右箭头 -->
          <button class="arrow right" @click="slideRight">→</button>
        </div>
  
        <!-- 新增：三行五列歌单展示 -->
        <section class="showing-playlists">
          <h2>歌单展示</h2>
          <div class="showing-playlists-grid">
            <div
              class="small-playlist-card"
              v-for="playlist in showing_playlists"
              :key="playlist.PlaylistID"
              @click="goToPlaylist(playlist.url)"
            >
              <img
                :src="playlist.CoverImage || '/music-project/assets/images/loading.gif'"
                alt="歌单封面"
              />
              <h3>{{ playlist.Title }}</h3>
              <p>{{ playlist.Description }}</p>
            </div>
          </div>
        </section>
  
        <!-- 新增：MV模块 -->
        <section class="mv-showcase">
          <h2>热门 MV</h2>
          <div class="mv-grid">
            <div
              class="mv-card"
              v-for="mv in mvs"
              :key="mv.MVID"
              @click="playMV(mv.url)"
            >
              <img
                :src="mv.CoverImage || '/music-project/assets/images/loading.gif'"
                alt="MV封面"
              />
              <h3>{{ mv.Title }}</h3>
            </div>
          </div>
        </section>
      </main>
  
      <!-- 底部 -->
      <footer>
        <p>版权所有 © 2024 音乐世界</p>
      </footer>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    name: "HomePage",
    data() {
      return {
        playlists: [], // 歌单数据
        showing_playlists: [], // 三行五列的歌单数据
        mvs: [], // MV 数据
        visibleStartIndex: 0, // 当前展示的起始索引
        windowSize: 3, // 每次展示的歌单数量
      };
    },
    mounted() {
      this.fetchPlaylists();
      this.fetchMVs();
    },
    methods: {
      async fetchPlaylists() {
        try {
          const response = await axios.get(
            "http://localhost:8080/index.php?r=api/get-playlists"
          );
          if (response.data.status === 1) {
            this.playlists = response.data.data.playlists;
            this.showing_playlists = this.playlists.length > 15
              ? this.playlists.slice(0, 15)
              : this.playlists;
          } else {
            console.error("获取歌单失败:", response.data.message);
          }
        } catch (error) {
          console.error("加载歌单出错:", error);
        }
      },
      async fetchMVs() {
        try {
          const response = await axios.get(
            "http://localhost:8080/index.php?r=api/get-mvs"
          );
          if (response.data.status === 1) {
            this.mvs = response.data.data.mvs;
          } else {
            console.error("获取 MV 失败:", response.data.message);
          }
        } catch (error) {
          console.error("加载 MV 出错:", error);
        }
      },
      slideLeft() {
        this.visibleStartIndex =
          (this.visibleStartIndex - 1 + this.playlists.length) %
          this.playlists.length;
      },
      slideRight() {
        this.visibleStartIndex =
          (this.visibleStartIndex + 1) % this.playlists.length;
      },
      cardStyle(index) {
        const cardWidth = 420; // 推荐歌单卡片宽度
        const total = this.playlists.length; // 总卡片数
        const relativeIndex = (index - this.visibleStartIndex + total) % total;
        return {
          transform: `translateX(${relativeIndex * cardWidth}px)`,
          transition: "transform 0.5s ease",
        };
      },
      isCardVisible(index) {
        const total = this.playlists.length;
        const relativeIndex = (index - this.visibleStartIndex + total) % total;
        return relativeIndex < this.windowSize;
      },
      playMV(url) {
        window.location.href = url;
      },
      goToPlaylist(url) {
        window.location.href = url;
      },
    },
  };
  </script>

  <style scoped>
  /* 推荐歌单滑动窗口卡片样式 */
  /* 滑动展示容器 */
  .slider-container {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 1em;
      padding: 2em;
      position: relative;
      overflow: hidden;
      width: 1227px;
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
      width: 400px;
      height: 450px;
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
      height: 320px;
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
  
  /* 三行五列小歌单展示卡片样式 */
  .showing-playlists-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1em;
  }
  
  .small-playlist-card {
    width: 200px;
    height: 250px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }
  
  .small-playlist-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
  }
  
  .small-playlist-card:hover {
    transform: scale(1.1);
  }
  
  /* MV模块样式 */
  .mv-showcase {
    margin-top: 2em;
    text-align: center;
  }
  
  .mv-showcase h2 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 1em;
  }
  
  .mv-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1em;
  }
  
  .mv-card {
    width: 200px;
    height: 250px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
  }
  
  .mv-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }
  
  .mv-card:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 12px rgba(255, 0, 0, 0.2);
  }
  
  .mv-card h3 {
    font-size: 1em;
    margin: 0.5em 0;
    color: #333;
  }
  </style>
  