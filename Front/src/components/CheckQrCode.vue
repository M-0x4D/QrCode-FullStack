<template>
  <div class="pt-36">
    <h1 class="pb-10 fas fa-heart">
      Please Enter Bar Code Link You Need To Check
    </h1>
    <form @submit.prevent="submitForm">
      <div class="relative flex flex-col justify-center items-center">
        <input
          v-model="this.num"
          type="text"
          id="search"
          class="flex w-1/2 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Bar Code Link"
          required
        />
        <button
          type="submit"
          class="text-white mt-10 end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
          Check Status
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {};
</script>
