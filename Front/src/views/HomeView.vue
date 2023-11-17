<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png" />
    <HelloWorld msg="Welcome to Your Vue.js App" /> -->
    <!-- <HeaderComponent></HeaderComponent> -->
    <FormComponent></FormComponent>
    <!-- <SideComponent></SideComponent> -->
  </div>
</template>

<script>
// @ is an alias to /src
import FormComponent from "@/components/FormComponent.vue";
export default {
  name: "HomeView",
  components: {
    FormComponent,
  },
};
</script>
