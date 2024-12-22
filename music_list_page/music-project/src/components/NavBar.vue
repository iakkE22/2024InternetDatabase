<template>
  <el-menu
    :default-active="getCurrentMenuUrl()"
    class="el-menu"
    mode="horizontal"
    :router="true"
    menu-trigger="hover"
    :ellipsis="false"
    unique-opened
  >
    <!-- 菜单项 -->
    <el-menu-item index="/">首页</el-menu-item>
    <div class="flex-grow" />
    <el-menu-item index="/article">视频</el-menu-item>
    <el-menu-item index="/list">音乐</el-menu-item>
    <el-menu-item index="/aboutus">关于</el-menu-item>
    <el-menu-item index="/user">个人</el-menu-item>

    <!-- 搜索框 -->
    <div class="search-container">
      <!-- 搜索输入框 -->
      <el-input
        v-if="searchVisible" 
        v-model="searchText"
        size="small"
        placeholder="搜索..."
        class="search-input"
        @keydown.enter="performSearch"
      >
        <template #prefix>
          <img src="@/assets/images/icon/fangdajing.png" alt="搜索" class="search-image" />
        </template>
      </el-input>

      <!-- 点击显示搜索框的图片 -->
      <img
        v-show="!searchVisible"
        src="@/assets/images/icon/fangdajing.png"
        alt="搜索"
        @click="toggleSearch"
        class="search-toggle"
      />
    </div>
  </el-menu>
</template>

<script>
export default {
  data() {
    return {
      searchText: "", // 搜索框内容
      searchVisible: false // 默认隐藏搜索框
    };
  },
  methods: {
    getCurrentMenuUrl() {
      return this.$route.path; // 当前路由路径，用于菜单高亮
    },
    toggleSearch() {
      console.log("搜索图标被点击"); // 调试信息
      this.searchVisible = !this.searchVisible; // 切换搜索框显示状态
      console.log("搜索框是否显示：", this.searchVisible);
    },
    performSearch() {
      console.log("搜索内容：", this.searchText); // 打印搜索内容
      this.searchText = ""; // 清空搜索框
      this.searchVisible = false; // 关闭搜索框
    }
  }
};
</script>

<style scoped>
/* 搜索框容器 */
.search-container {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-left: auto; /* 将搜索框置于右侧 */
  position: relative;
}

/* 搜索框样式 */
.search-input {
  display: block;
  width: 150px; /* 初始宽度 */
  transition: width 0.3s ease;
}

/* 搜索框展开后的宽度 */
.search-input[style] {
  width: 600px !important; /* 展开时变宽 */
}

.search-toggle {
  cursor: pointer;
  width: 32px; /* 调整为32像素 */
  height: 32px;
  position: relative;
  z-index: 10; /* 确保图片位于搜索框之上 */
}

.search-toggle:hover {
  transform: scale(1.2); /* 鼠标悬停时稍微放大 */
}

.search-input {
  display: block !important;
  width: 150px; /* 设置默认宽度 */
  transition: width 0.3s ease; /* 添加宽度动画 */
}

</style>
