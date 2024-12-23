<template>
  <el-menu
    :default-active="getCurrentMenuUrl()"
    class="el-menu"
    mode="horizontal"
    router="true"
    menu-trigger="hover"
    :ellipsis="false"
    unique-opened
  >
    <!-- 菜单项 -->
    <el-menu-item index="/">首页</el-menu-item>
    <div class="flex-grow" />
    <el-menu-item index="/video">视频</el-menu-item>
    <el-menu-item index="/playlist">音乐</el-menu-item>
    <el-menu-item index="/aboutus">关于</el-menu-item>
    <el-menu-item index="/user">个人</el-menu-item>

    <!-- 搜索图标 -->
    <img
      src="/music-project/assets/images/icon/fdj.png"
      alt="搜索"
      @click="openSearchOverlay"
      class="search-toggle"
    />

    <!-- 搜索弹窗 -->
    <div v-if="showSearchOverlay" class="overlay">
      <div class="overlay-header">
        <el-input
          v-model="searchText"
          size="large"
          placeholder="请输入搜索内容..."
          class="overlay-search-input"
          @keydown.enter="performSearch"
        />
        <button class="overlay-close" @click="closeSearchOverlay">关闭</button>
      </div>

      <div class="overlay-results">
        <p v-if="results.length === 0 && searchText">没有找到与 "{{ searchText }}" 相关的内容</p>
        <ul v-if="results.length > 0">
          <li
            v-for="(result, index) in results"
            :key="index"
            @click="navigateToPlaylist(result.PlaylistID)"
            class="search-result-item"
          >
            <h3>{{ result.Title }}</h3>
            <p>{{ result.Description }}</p>
          </li>
        </ul>
      </div>
    </div>
  </el-menu>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      searchText: "", // 搜索内容
      showSearchOverlay: false, // 是否显示搜索弹窗
      results: [], // 搜索结果
      allPlaylists: [], // 存储所有歌单数据
    };
  },
  mounted() {
    this.loadPlaylists(); // 页面加载时获取所有歌单
  },
  methods: {
    getCurrentMenuUrl() {
      return this.$route.path;
    },
    openSearchOverlay() {
      this.showSearchOverlay = true;
    },
    closeSearchOverlay() {
      this.showSearchOverlay = false;
      this.searchText = "";
      this.results = [];
    },
    async loadPlaylists() {
      try {
        const response = await axios.get("http://localhost:8080/index.php?r=api/get-playlists", {
          withCredentials: true, // 如果需要发送跨域 Cookie
        });
        if (response.data.status === 1) {
          this.allPlaylists = response.data.data.playlists; // 存储所有歌单数据
        } else {
          console.error("加载歌单失败：", response.data.message);
        }
      } catch (error) {
        console.error("请求歌单数据时发生错误：", error);
      }
    },
    performSearch() {
      if (!this.searchText.trim()) {
        this.results = [];
        return;
      }

      const lowerQuery = this.searchText.toLowerCase();
      this.results = this.allPlaylists.filter((playlist) => {
        return (
          playlist.Title.toLowerCase().includes(lowerQuery) ||
          playlist.Description.toLowerCase().includes(lowerQuery)
        );
      });
    },
    navigateToPlaylist(playlistId) {
      // 跳转到对应歌单页面
      this.$router.push({ path: "/playlist", query: { id: playlistId } });
      this.closeSearchOverlay(); // 关闭搜索弹窗
    },
  },
};
</script>



<style scoped>
/* 导航栏样式 */
.el-menu {
  line-height: 60px;
  background-color: #f99c07; /* 橙色主题背景 */
  color: white;
  display: flex;
  align-items: center;
}

/* 搜索按钮样式 */
.search-toggle {
  cursor: pointer;
  width: 30px;
  height: 30px;
  margin-left: auto;
  filter: brightness(0) invert(1); /* 确保图标在白色背景下可见 */
  transition: transform 0.3s ease;
}

.search-toggle:hover {
  transform: scale(1.2);
}

/* 弹出搜索框的背景样式 */
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(249, 156, 7, 0.9); /* 橙色半透明背景 */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
  z-index: 9999;
}

/* 搜索框标题 */
.overlay-header {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

/* 搜索输入框 */
.overlay-search-input {
  width: 300px;
  border: 2px solid white;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
  background: rgba(255, 255, 255, 0.8);
  color: #333;
}

.overlay-search-input:focus {
  outline: none;
  border-color: #f99c07; /* 橙色主题边框 */
}

/* 搜索结果列表样式 */
.overlay-results {
  width: 80%;
  max-height: 60%;
  overflow-y: auto;
  background: white;
  color: black;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* 按钮全局样式 */
button {
  background-color: #f99c07; /* 橙色主题按钮 */
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
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

/* 为弹出搜索框添加轻微动画 */
.overlay {
  animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
