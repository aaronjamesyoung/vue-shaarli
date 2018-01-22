<template>
  <div>
    <router-view />
  </div>
</template>

<script>
  export default {
    name: 'app'
  };
</script>


<style lang="scss">
  $color: #56b983;

  div {
    color: $color;
  }
</style>

<style scoped>
  div {
    font-size: 32px;
  }
</style>
