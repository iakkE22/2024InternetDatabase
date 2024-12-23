<template>
  <div class="user-profile-container">
    <!-- 头部 -->
    <header class="profile-header">
      <h1>个人信息</h1>
      <p>管理您的账户信息</p>
    </header>

    <!-- 用户信息卡片 -->
    <section class="profile-card" v-if="user">
      <h2>UserID: {{ user.UserID }}</h2>
      <h2>Username: {{ user.Username }}</h2>
    </section>

    <!-- 用户评论部分 -->
    <section class="user-comments" v-if="playlistComments.length || mvComments.length || songComments.length">
      <h2>我的评论</h2>

      <!-- 歌单评论 -->
      <div v-if="playlistComments.length">
        <h3>歌单评论：</h3>
        <ul>
          <li v-for="comment in playlistComments" :key="comment.CommentID">
            <strong>歌单 ID: {{ comment.PlaylistID }}</strong>
            <p>评论内容: {{ comment.CommentText }}</p>
            <p>评论时间: {{ comment.CommentDate }}</p>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>暂无歌单评论。</p>
      </div>

      <!-- MV 评论 -->
      <div v-if="mvComments.length">
        <h3>MV 评论：</h3>
        <ul>
          <li v-for="comment in mvComments" :key="comment.CommentID">
            <strong>MV ID: {{ comment.MVID }}</strong>
            <p>评论内容: {{ comment.CommentText }}</p>
            <p>评论时间: {{ comment.CommentDate }}</p>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>暂无 MV 评论。</p>
      </div>

      <!-- 歌曲评论 -->
      <div v-if="songComments.length">
        <h3>歌曲评论：</h3>
        <ul>
          <li v-for="comment in songComments" :key="comment.CommentID">
            <strong>歌曲 ID: {{ comment.SongID }}</strong>
            <p>评论内容: {{ comment.CommentText }}</p>
            <p>评论时间: {{ comment.CommentDate }}</p>
          </li>
        </ul>
      </div>
      <div v-else>
        <p>暂无歌曲评论。</p>
      </div>
    </section>

    <!-- 加载中状态 -->
    <section v-else class="loading">
      <p>加载中...</p>
    </section>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "UserProfile",
  data() {
    return {
      // 用于存储当前用户信息
      user: null,
      // 用户的评论数据
      playlistComments: [], // 歌单评论
      mvComments: [], // MV 评论
      songComments: [], // 歌曲评论
    };
  },
  mounted() {
    // 获取当前用户信息
    this.fetchUserInfo();
    // 获取用户评论数据
    this.fetchUserComments();
  },
  methods: {
    // 获取当前登录用户的信息
    async fetchUserInfo() {
      try {
        const response = await axios.get("http://localhost:8080/index.php?r=api/get-user-info", {
          withCredentials: true, // 确保携带 Session/Cookie
        });
        
        if (response.data.status === 1) {
          this.user = response.data.user; // 将用户数据存储到 user 中
        } else {
          alert("获取用户信息失败，请重新登录！");
          window.location.href = "/login"; // 如果未登录，跳转到登录页面
        }
      } catch (error) {
        console.error("Failed to fetch user info:", error);
        alert("获取用户信息时发生错误，请稍后重试！");
      }
    },
    // 获取用户的评论数据
    async fetchUserComments() {
      try {
        const response = await axios.get("http://localhost:8080/index.php?r=api/get-user-comments", {
          withCredentials: true,
        });
        console.log("User Comments Response:", response.data); // 调试日志
        if (response.data.status === 1) {
          this.playlistComments = response.data.data.playlistComments;
          this.mvComments = response.data.data.mvComments;
          this.songComments = response.data.data.songComments;
        } else {
          console.error("Failed to fetch user comments:", response.data.message);
        }
      } catch (error) {
        console.error("Error fetching user comments:", error);
        alert("获取评论数据时发生错误，请稍后重试！");
      }
    },
  },
};
</script>
<style scoped> 
/* 页面容器 */
.user-profile-container {
  font-family: Arial, sans-serif;
  padding: 20px;
  color: #333;
  background: linear-gradient(to bottom, #f99c07, #ffcc80); /* 橙色渐变背景 */
  min-height: 100vh;
  text-align: center;
  width: 1500px; /* 调宽页面整体宽度 */
  margin: 0 auto; /* 居中显示 */
}

/* 页头样式 */
.profile-header {
  margin-bottom: 30px;
}

.profile-header h1 {
  font-size: 2.8em; /* 字体稍微调大 */
  color: #fff; /* 白色标题 */
}

.profile-header p {
  font-size: 1.4em; /* 副标题字体加大 */
  color: #ffe5b4; /* 浅橙色副标题 */
}

/* 用户信息卡片 */
.profile-card {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* 添加阴影效果 */
  padding: 30px; /* 内边距增大 */
  margin: 20px auto;
  max-width: 800px; /* 卡片宽度增大 */
  text-align: center;
}

.profile-card h2 {
  font-size: 2em; /* 字体调大 */
  color: #f99c07; /* 突出橙色标题 */
  margin: 10px 0;
}

.profile-card p {
  color: #555;
  margin-top: 10px;
  font-size: 1.2em; /* 调整文字大小 */
}

/* 评论部分 */
.user-comments {
  margin-top: 30px; /* 增加顶部间距 */
  text-align: left;
}

.user-comments h2 {
  font-size: 2em; /* 标题字体加大 */
  margin-bottom: 20px; /* 增加间距 */
  color: #f99c07; /* 橙色标题 */
}

.user-comments h3 {
  margin-top: 25px;
  font-size: 1.6em;
  color: #555;
}

.user-comments ul {
  list-style-type: none;
  padding: 0;
}

.user-comments li {
  margin-bottom: 20px; /* 增加间距 */
  padding: 15px; /* 内边距增大 */
  background: #fff8e1; /* 浅橙色背景 */
  border-left: 6px solid #f99c07; /* 橙色装饰条加宽 */
  border-radius: 8px; /* 增加圆角 */
  transition: transform 0.3s ease;
}

.user-comments li:hover {
  transform: translateX(8px); /* 悬停时更明显的移动 */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

.user-comments li strong {
  display: block;
  margin-bottom: 5px;
  color: #333;
  font-size: 1.1em; /* 加大用户名字体 */
}

.loading p {
  font-size: 1.4em;
  color: #fff;
}
</style>
