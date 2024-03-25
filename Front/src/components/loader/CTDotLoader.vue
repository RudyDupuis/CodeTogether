<template>
  <div class="box f j-betw">
    <div class="dot dot-1 bg-primary"></div>
    <div class="dot dot-2 bg-primary"></div>
    <div class="dot dot-3 bg-primary"></div>
  </div>
</template>

<style scoped>
.box {
  width: 60px;
}
.dot {
  width: 13px;
  height: 13px;
  border-radius: 50px;
}

.dot-1 {
  animation: goUpAndDown 1s infinite;
}
.dot-2 {
  animation: goUpAndDown 1s infinite 0.2s;
}
.dot-3 {
  animation: goUpAndDown 1s infinite 0.4s;
}

@keyframes goUpAndDown {
  0% {
    transform: translateY(-5px);
  }
  50% {
    transform: translateY(5px);
  }
  100% {
    transform: translateY(-5px);
  }
}
</style>
