<template>
  <div>
    <!-- 顶部导航栏 -->
    <div v-if="show" class="App-Header">
      <NavBar />
    </div>

    <!-- 路由视图 -->
    <div class="App-Containner">
      <router-view />
    </div>
        <!-- 全局音乐播放器 -->
    <div v-if="show">
      <MPlayer :currentSong="currentSong" />
    </div>
  </div>
</template>
<script>
// 导入 NavBar 组件
import NavBar from "@/components/NavBar.vue";
// 导入 NavBar 组件
import MPlayer from "@/components/MusicPlayer.vue";

import eventBus from "@/eventBus";

export default {
  // 注册 NavBar 组件
  components: {
    NavBar,
    MPlayer
  },
  data() {
  return {
    currentSong: {
      Title: "未播放歌曲",
      ArtistID: "未知歌手",
      CoverImage: "/music-project/assets/images/song_covers/default-cover.jpg",
      url: "",
    },
  };
},
  computed: {
    show() {
      const meta = this.$route.meta
      console.log("当前路由 meta 信息：", meta); // 调试 meta 信息
      return !meta || meta.showNavBar !== false
    }
  },
  mounted() {
    eventBus.on("play-song", (song) => {
      console.log("接收到全局播放事件：", song); // 调试日志
      this.currentSong = { ...song }; // 更新全局播放的歌曲信息
    });
  },

};
</script>
<style>
/* 设置全局背景颜色或图片 */
html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(249, 156, 7, 0.8), rgba(255, 255, 255, 1));
  font-family: Arial, sans-serif;
  color: #333;
  overflow-x: hidden; /* 防止水平滚动条 */
}

/* 导航栏区域 */
.App-Header {
  position: fixed; /* 固定在页面顶部 */
  top: 0;
  left: 0;
  right: 0;
  height: 60px; /* 设置导航栏高度 */
  background-color: rgba(249, 156, 7, 0.9); /* 橙色半透明背景 */
  z-index: 1000; /* 确保导航栏位于最前方 */
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* 添加轻微阴影 */
  display: flex;
  align-items: center; /* 垂直居中导航栏内容 */
  justify-content: space-between; /* 导航项左右分布 */
  padding: 0 20px; /* 添加左右内边距 */
}

/* 导航栏文字样式 */
.App-Header a {
  color: white;
  text-decoration: none;
  font-size: 16px;
  margin: 0 15px;
  transition: color 0.3s ease;
}

.App-Header a:hover {
  color: #ffcc66; /* 悬停时文字颜色 */
}

/* 搜索按钮 */
.search-toggle {
  cursor: pointer;
  width: 30px;
  height: 30px;
  filter: brightness(0) invert(1); /* 确保图标在白色背景下可见 */
  transition: transform 0.3s ease;
}

.search-toggle:hover {
  transform: scale(1.2);
}

/* 内容区域 */
.App-Containner {
  margin-top: 60px; /* 给内容区预留导航栏的高度 */
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.9); /* 内容区域背景半透明白色 */
  min-height: calc(100vh - 60px); /* 确保内容区域占满页面剩余高度 */
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* 按钮全局样式 */
button {
  background-color: #f99c07; /* 橙色按钮 */
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #e68a00; /* 按钮悬停效果 */
}

button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

/* 页面切换动画 */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

/* 表单样式 */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 15px;
  font-size: 14px;
}

input[type="text"]:focus,
input[type="password"]:focus {
  outline: none;
  border-color: #f99c07;
  box-shadow: 0px 0px 5px rgba(249, 156, 7, 0.5);
}

/* 响应式设计 */
@media (max-width: 768px) {
  .App-Header {
    flex-direction: column;
    height: auto;
    padding: 10px;
  }

  .App-Containner {
    padding: 10px;
  }

  button {
    font-size: 14px;
    padding: 8px 15px;
  }
}
</style>
