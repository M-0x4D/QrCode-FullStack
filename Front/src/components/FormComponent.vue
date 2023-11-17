<template>
  <div class="pt-36">
    <h1 class="pb-10 fas fa-heart">
      Please Enter Number Of Bar Codes You Need To Generate
    </h1>
    <form @submit.prevent="submitForm">
      <div class="relative flex flex-col justify-center items-center">
        <input
          v-model="this.num"
          type="text"
          id="search"
          class="flex w-1/2 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Nums Of Bar Codes"
          required
        />
        <button
          type="submit"
          class="text-white mt-10 end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
          Generate
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      name: "FormComponent",
      num: "",
    };
  },
  methods: {
    async submitForm() {
      //   const config = {
      //     headers: {
      //       Origin: "http://localhost:8080",
      //     },
      //   };
      await axios
        .get("http://127.0.0.1:8000/generate?num=" + this.num)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
};
</script>
