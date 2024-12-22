<template>
  <div class="song-list-container">
    <!-- 歌单封面和简介 -->
    <div class="playlist-header">
      <img :src="playlist.cover" alt="歌单封面" class="playlist-cover" />
      <div class="playlist-info">
        <h1>{{ playlist.name }}</h1>
        <p>{{ playlist.description }}</p>
      </div>
    </div>

    <!-- 歌曲列表 -->
    <div class="song-list">
      <div
        class="song-item"
        v-for="(song, index) in playlist.songs"
        :key="index"
        @click="playSong(song)"
      >
        <img :src="song.cover" alt="歌曲封面" class="song-cover" />
        <div class="song-info">
          <h3>{{ song.name }}</h3>
          <p>{{ song.artist }}</p>
        </div>
      </div>
    </div>

    <!-- 底部播放器 -->
    <MusicPlayer :currentSong="currentSong" />
  </div>
</template>
<script>
import MusicPlayer from "@/components/MusicPlayer.vue";

export default {
  components: { MusicPlayer },
  data() {
    return {
      playlist: {
        cover: require("@/assets/images/playlist_covers/rock.jpg"), // 歌单封面图片
        name: "精选歌单", // 歌单名称
        description: "这是一份精选歌单，包含多首好听的音乐！", // 歌单描述
        songs: [
          {
            name: "歌曲1",
            artist: "歌手1",
            cover: require("@/assets/images/song_covers/song-cover.jpg"),
            url: require("@/assets/audio/songs/song1.mp3")
          },
          {
            name: "歌曲2",
            artist: "歌手2",
            cover: require("@/assets/images/song_covers/song-cover.jpg"),
            url: require("@/assets/audio/songs/song2.mp3")
          }
        ]
      },
      currentSong: {
        name: "未播放歌曲", // 默认歌曲信息
        artist: "未知歌手",
        cover: require("@/assets/images/song_covers/default-cover.jpg"),
        url: ""
      } // 当前播放的歌曲
    };
  },
  methods: {
    // 播放歌曲
    playSong(song) {
      this.currentSong = song; // 更新当前播放歌曲的信息
    }
  }
};
</script>
<style scoped>
/* 页面容器样式 */
.song-list-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 20px;
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

/* 底部播放器组件样式（单独放在 MusicPlayer 组件内） */
</style>
