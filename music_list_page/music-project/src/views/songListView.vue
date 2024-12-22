<template>
  <div class="page-container">
    <!-- 主内容：歌单信息和歌曲列表 -->
    <div class="main-content">
      <div class="song-list-container">
        <!-- 歌单封面和简介 -->
        <div class="playlist-header" v-if="playlist">
          <img :src="playlist.CoverImage || '/music-project/assets/images/loading.gif'" alt="歌单封面" class="playlist-cover" />
          <div class="playlist-info">
            <h1>{{ playlist.Title }}</h1>
            <p>{{ playlist.Description }}</p>
          </div>
        </div>

        <!-- 歌曲列表 -->
        <div class="song-list" v-if="songs.length">
          <h2>歌曲列表</h2>
          <div
            class="song-item"
            v-for="song in songs"
            :key="song.SongID"
            @click="playSong(song)"
          >
            <img :src="song.CoverImage || '/music-project/assets/images/loading.gif'" alt="歌曲封面" class="song-cover" />
            <div class="song-info">
              <h3>{{ song.Title }}</h3>
              <p>歌手 ID: {{ song.ArtistID }}</p>
            </div>
          </div>
        </div>

        <!-- 评论区 -->
        <div class="comments-section">
          <h2>评论</h2>
          <div class="comment-item" v-for="comment in comments" :key="comment.CommentID">
            <p class="comment-text">{{ comment.CommentText }}</p>
            <p class="comment-info">
              用户 ID: {{ comment.UserID }} | 评论时间: {{ comment.CommentDate }}
            </p>
          </div>
        </div>

        <!-- 底部播放器 -->
        <MusicPlayer :currentSong="currentSong" />
      </div>
    </div>
  </div>
</template>



<script>
import axios from "axios";
import MusicPlayer from "@/components/MusicPlayer.vue";

export default {
  components: { MusicPlayer },
  data() {
      return {
        playlist: null, // 当前歌单信息
        songs: [], // 当前歌单的歌曲列表
        comments: [], // 评论列表
        currentSong: {
          Title: "未播放歌曲", // 默认歌曲信息
          ArtistID: "未知歌手",
          CoverImage: "/music-project/assets/images/song_covers/default-cover.jpg",
          url: ""
        } // 当前播放的歌曲
      };
    },
    mounted() {
      this.fetchPlaylistData();
    },
  methods: {
    async fetchPlaylistData() {
        const playlistID = this.$route.query.id; // 从 URL 获取 playlistID
        if (!playlistID) {
          console.error("未提供 playlistID");
          return;
        }
  
        try {
          // 调用后端接口，获取歌单和歌曲信息
          const response = await axios.get(
            `http://localhost:8080/index.php?r=api/get-songs&id=${playlistID}`
          );
  
          if (response.data.status === 1) {
            this.playlist = response.data.data.playlist; // 歌单信息
            this.songs = response.data.data.songs; // 歌曲信息
            this.comments = response.data.data.comments; // 评论信息
          } else {
            console.error("加载歌单信息失败:", response.data.message);
          }
        } catch (error) {
          console.error("加载歌单数据出错:", error);
        }
      },
    // 播放歌曲
    playSong(song) {
      this.currentSong = song; // 更新当前播放歌曲的信息
    }
  }
};
</script>
<style scoped>
/* 页面容器 */
.page-container {
  display: flex;
  justify-content: center;
  padding: 20px;
  width: 100%; /* 确保占满视口宽度 */
}

/* 主内容 */
.main-content {
  width: 100%; /* 主内容占满页面 */
  max-width: 800px; /* 设置最大宽度 */
}

/* 歌单头部区域样式 */
.playlist-header {
  display: flex;
  gap: 20px;
  align-items: center;
  background: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}
.playlist-cover {
  width: 150px;
  height: 150px;
  border-radius: 10px;
  object-fit: cover;
}
.playlist-info h1 {
  margin: 0;
  font-size: 24px;
}
.playlist-info p {
  margin: 10px 0 0;
  color: #666;
}

/* 歌曲列表样式 */
.song-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 20px;
}
.song-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  transition: background 0.3s;
}
.song-item:hover {
  background: #f0f0f0;
}
.song-cover {
  width: 50px;
  height: 50px;
  border-radius: 5px;
  object-fit: cover;
}
.song-info h3 {
  margin: 0;
  font-size: 16px;
}
.song-info p {
  margin: 5px 0 0;
  color: #888;
}

/* 评论区 */
.comments-section {
  background: #f9f9f9;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-top: 80px; /* 与歌曲列表的间距 */
}
.comments-section h2 {
  font-size: 20px;
  margin-bottom: 15px;
}
.comment-item {
  margin-bottom: 15px;
  padding: 10px;
  border-bottom: 1px solid #ddd;
}
.comment-text {
  font-size: 14px;
  margin: 0 0 5px;
}
.comment-info {
  font-size: 12px;
  color: #666;
}

/* 确保页面可以滚动 */
body {
  margin: 0;
  padding: 0;
  overflow-y: auto; /* 启用垂直滚动 */
  height: 100%;
}

html {
  height: 100%;
}
</style>
