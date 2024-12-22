<template>
  <div>
    <!-- 顶部导航栏 -->
    <div class="App-Header">
      <NavBar />
    </div>

    <!-- 路由视图 -->
    <div class="App-Containner">
      <router-view />
    </div>
  </div>
</template>
<script>
// 导入 NavBar 组件
import NavBar from "@/components/NavBar.vue";

export default {
  // 注册 NavBar 组件
  components: {
    NavBar
  }
};
</script>
<style>
/* 背景渐变色 */
html {
  background: linear-gradient(to top, rgba(0, 181, 255, 1) 0%, rgba(0, 231, 220, 1) 100%);
}

/* 导航栏区域 */
.App-Header {
  position: fixed; /* 固定在页面顶部 */
  top: 0;
  left: 0;
  right: 0;
  height: 60px; /* 设置导航栏高度 */
  background-color: #2f80ed; /* 导航栏背景颜色 */
  z-index: 1000; /* 确保导航栏位于最前方 */
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* 添加阴影 */
  display: flex;
  align-items: center; /* 垂直居中导航栏内容 */
  padding: 0 20px; /* 添加左右内边距 */
}

/* 路由内容区域 */
.App-Containner {
  margin-top: 60px; /* 给内容区预留导航栏的高度 */
  display: flex;
  justify-content: center;
  padding: 20px; /* 内容区域的内边距 */
  background-color: rgba(255, 255, 255, 0.8); /* 内容区域的背景半透明 */
  border-radius: 8px; /* 内容区域边框圆角 */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* 内容区域的阴影 */
  min-height: calc(100vh - 60px); /* 保证内容区域最小高度填满剩余页面 */
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
</style>
