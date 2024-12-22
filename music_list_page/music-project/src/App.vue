<template>
    <div class="App-Containner">
      <router-view></router-view>
    </div>
</template>
<style>
html {
  background: linear-gradient(to top, rgba(0, 181, 255, 1) 0%, rgba(0, 231, 220, 1) 100%);
}

.App-Header {
  height: 3vh;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.App-Containner {
  display: flex;
  justify-content: center;
}

.App-Footer {
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
