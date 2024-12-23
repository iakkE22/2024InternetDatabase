<template>
  <div class="music-player">
    <!-- 歌曲封面 -->
    <img
      :src="currentSong?.CoverImage || defaultCover"
      alt="歌曲封面"
      class="player-cover"
      @click="showSongDetails"
    />

    <!-- 歌曲信息 -->
    <div class="player-info">
      <h3>{{ currentSong?.Title || "未播放歌曲" }}</h3>
      <p>{{ currentSong?.ArtistID || "未知歌手" }}</p>
    </div>

    <!-- 播放控制 -->
    <div class="player-controls">
      <button @click="togglePlay" :disabled="!currentSong.url">
        {{ isPlaying ? "暂停" : "播放" }}
      </button>
      <div class="progress-bar">
        <span>{{ formatTime(currentTime) }}</span>
        <input
          type="range"
          min="0"
          :max="duration"
          v-model="currentTime"
          @input="seek"
          :disabled="!currentSong.url"
        />
        <span>{{ formatTime(duration) }}</span>
      </div>
    </div>

    <!-- 模态框 -->
    <div class="modal" v-if="isModalVisible">
      <div class="modal-content">
        <h2>歌曲详情</h2>
        <p><strong>歌曲名称：</strong>{{ currentSong?.Title || "未播放歌曲" }}</p>
        <p><strong>歌手：</strong>{{ currentSong?.ArtistID || "未知歌手" }}</p>
        <p><strong>时长：</strong>{{ formatTime(duration) }}</p>
        <button @click="closeModal">关闭</button>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: {
  currentSong: {
    type: Object,
    default: () => ({
      Title: "未播放歌曲",
      ArtistID: "未知歌手",
      CoverImage: "/music-project/assets/images/song_covers/default-cover.jpg",
      url: null,
    }),
  },
},
  data() {
    return {
      audio: null, // 音频对象
      isPlaying: false, // 是否正在播放
      currentTime: 0, // 当前播放时间
      duration: 0, // 歌曲总时长
      defaultCover: "/music-project/assets/images/song_covers/default-cover.jpg", // 默认封面
      isModalVisible: false, // 模态框显示状态
    };
  },
  watch: {
  currentSong: {
    immediate: true,
    handler(newSong) {
      if (this.audio) this.audio.pause();
      if (newSong.url) {
        this.initAudio(newSong.url);
        this.isPlaying = true; // 设置为播放状态
      } else {
        this.resetPlayer();
      }
    },
  },
},

  methods: {
    initAudio(url) {
      this.audio = new Audio(url);
      this.audio.addEventListener("loadedmetadata", () => {
        this.duration = this.audio.duration; // 初始化总时长
      });
      this.audio.addEventListener("timeupdate", () => {
        this.currentTime = this.audio.currentTime; // 实时更新播放时间
      });
      this.audio.play();
      this.isPlaying = true;
    },
    seek(event) {
      if (this.audio) {
        this.audio.currentTime = event.target.value; // 手动更新音频播放时间
        this.currentTime = event.target.value; // 同步当前时间显示
      }
    },

    togglePlay() {
      if (!this.audio) return;
      if (this.isPlaying) {
        this.audio.pause();
        //this.isPlaying = false; // 状态在暂停后更新
      } else {
        this.audio.play();
        //this.isPlaying = true; // 状态在播放后更新
      }
      this.isPlaying = !this.isPlaying;
    },
    formatTime(seconds) {
      if (!seconds || isNaN(seconds)) return "0:00";
      const minutes = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${minutes}:${secs < 10 ? "0" + secs : secs}`;
    },
    resetPlayer() {
      this.isPlaying = false;
      this.currentTime = 0;
      this.duration = 0;
      this.audio = null;
    },
    showSongDetails() {
      // 显示模态框
      this.isModalVisible = true;
    },
    closeModal() {
      // 关闭模态框
      this.isModalVisible = false;
    },
  },
};
</script>

<style>
 .music-player {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 20px;
  box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.player-cover {
  width: 50px;
  height: 50px;
  border-radius: 5px;
  object-fit: cover;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.player-cover:hover {
  transform: scale(1.1); /* 鼠标悬停时放大封面 */
}

.player-info {
  flex: 1;
  padding: 0 15px;
}

.player-info h3 {
  margin: 0;
  font-size: 16px;
}

.player-info p {
  margin: 5px 0 0;
  font-size: 14px;
  color: #ccc;
}

.player-controls {
  display: flex;
  align-items: center;
  gap: 10px;
}

button {
  background-color: #1db954;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 20px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #1ed760;
}

button:disabled {
  background-color: #666;
  cursor: not-allowed;
}

.progress-bar {
  display: flex;
  align-items: center;
  gap: 5px;
}

input[type="range"] {
  width: 100px;
}

.hidden {
  display: none;
}

/* 模态框样式 */
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1100;
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 10px;
  max-width: 500px;
  width: 90%;
  text-align: center;
}

.modal-content h2 {
  margin-top: 0;
}

.modal-content p {
  margin: 10px 0;
}

.modal-content button {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #1db954;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.modal-content button:hover {
  background-color: #1ed760;
}

</style>