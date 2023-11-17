<template>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav> -->
  <HeaderComponent></HeaderComponent>
  <router-view />
  <SideComponent></SideComponent>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent.vue";
import SideComponent from "@/components/SideComponent.vue";
export default {
  name: "app",
  components: {
    SideComponent,
    HeaderComponent,
  },
};
</script>
<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
<!-- src/App.vue -->
<style src="./assets/css/tailwind.css"></style>

<!-- Your component code -->
