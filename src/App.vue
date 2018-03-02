<template>
  <div>
    <router-view />
  </div>
</template>

<script>
export default {
  name: "app"
};
</script>


<style lang="scss">
// Colors as CSS vars
:root {
  --color-night-1: #2e3440;
  --color-night-2: #3b4252;
  --color-night-3: #434c5e;
  --color-night-4: #4c566a;
  --color-snow-1: #d8dee9;
  --color-snow-2: #e5e9f0;
  --color-snow-3: #eceff4;
  --color-cool-green: #8fbcbb;
  --color-cool-sky: #88c0d0;
  --color-cool-grayblue: #81a1c1;
  --color-cool-blue: #5e81ac;
  --color-warm-red: #bf616a;
  --color-warm-orange: #d08770;
  --color-warm-yellow: #ebcb8b;
  --color-warm-green: #a3be8c;
  --color-warm-purple: #b48ead;

  // UI Colors
  --background-color: var(--color-night-2);
  --text-color: var(--color-snow-1);
  --link-color: var(--color-cool-sky);

  // Measurements
  --base-font-size: 22px;
}

// General Styles

* {
  box-sizing: border-box;
}
body {
  background: var(--background-color);
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: var(--text-color);
  font-size: var(--base-font-size);
}

a {
  color: var(--link-color);
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}
</style>
