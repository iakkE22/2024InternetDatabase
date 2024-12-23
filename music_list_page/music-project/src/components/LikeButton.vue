<template>
  <div class="like-button">
    <button @click="toggleLike" :class="{ 'liked': isLiked }">
      <span class="heart-icon">❤️</span>
      <span class="like-count">{{ likes }}</span>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    likes: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      isLiked: false, // 是否已点赞
    };
  },
  methods: {
    toggleLike() {
      this.isLiked = !this.isLiked;
      this.$emit("like", this.isLiked ? 1 : -1); // 触发点赞/取消点赞事件
    },
  },
};
</script>

<style scoped>
.like-button {
  display: flex;
  align-items: center;
  margin-top: 10px;
}

.like-button button {
  position: relative;
  padding: 10px 15px;
  font-size: 16px;
  background-color: transparent;
  color: #333;
  border: 2px solid #007bff;
  border-radius: 8px;
  cursor: pointer;
  outline: none;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: all 0.3s ease;
}

.like-button button:hover {
  background-color: #007bff;
  color: white;
  transform: scale(1.1); /* 鼠标悬停时放大效果 */
}

.like-button button.liked {
  background-color: #ff4b5c;
  color: white;
  transform: scale(1.2); /* 点击后的缩放效果 */
  animation: pop 0.4s ease;
}

@keyframes pop {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.3);
  }
  100% {
    transform: scale(1.2);
  }
}

.heart-icon {
  font-size: 20px;
  transition: transform 0.3s ease;
}

.like-count {
  font-size: 16px;
}
</style>
