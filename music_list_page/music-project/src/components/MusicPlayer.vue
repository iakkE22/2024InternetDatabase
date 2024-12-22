<template>
    <div class="music-player">
      <!-- 歌曲封面 -->
      <img :src="currentSong.cover" alt="歌曲封面" class="player-cover" />
  
      <!-- 歌曲信息 -->
      <div class="player-info">
        <h3>{{ currentSong.name || "未播放歌曲" }}</h3>
        <p>{{ currentSong.artist || "未知歌手" }}</p>
      </div>
  
      <!-- 播放控制 -->
      <div class="player-controls">
        <button @click="togglePlay">{{ isPlaying ? "暂停" : "播放" }}</button>
        <div class="progress-bar">
          <span>{{ formatTime(currentTime) }}</span>
          <input
            type="range"
            min="0"
            :max="duration"
            v-model="currentTime"
            @input="seek"
          />
          <span>{{ formatTime(duration) }}</span>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      currentSong: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        audio: null, // 音频对象
        isPlaying: false, // 是否正在播放
        currentTime: 0, // 当前播放时间
        duration: 0 // 歌曲总时长
      };
    },
    watch: {
      currentSong: {
        immediate: true,
        handler(newSong) {
          if (this.audio) {
            this.audio.pause();
          }
          this.initAudio(newSong.url);
        }
      }
    },
    methods: {
      initAudio(url) {
        this.audio = new Audio(url);
        this.audio.addEventListener("loadedmetadata", () => {
          this.duration = this.audio.duration;
        });
        this.audio.addEventListener("timeupdate", () => {
          this.currentTime = this.audio.currentTime;
        });
      },
      togglePlay() {
        if (this.isPlaying) {
          this.audio.pause();
        } else {
          this.audio.play();
        }
        this.isPlaying = !this.isPlaying;
      },
      seek(event) {
        if (this.audio) {
          this.audio.currentTime = event.target.value;
        }
      },
      formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? "0" + secs : secs}`;
      }
    }
  };
  </script>
  
  <style scoped>
  .music-player {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #333;
    color: #fff;
    display: flex;
    align-items: center;
    padding: 10px 20px;
  }
  
  .player-cover {
    width: 50px;
    height: 50px;
    border-radius: 5px;
  }
  
  .player-info {
    flex: 1;
    margin-left: 15px;
  }
  
  .player-controls {
    display: flex;
    align-items: center;
  }
  
  .progress-bar {
    margin-left: 10px;
  }
  </style>
  