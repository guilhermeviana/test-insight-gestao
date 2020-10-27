<template>
  <div class="container">
    <div class="text-center">
      <div class="row justify-content-center m-3">
        <router-link  :to="{ name: 'crud', props: { acoes: false, funcionarios: {} }}" class="btn btn-outline-secondary mr-3" tag="button" to="/crud" 
          >CRUD</router-link
        >
        <router-link class="btn btn-outline-secondary mr-3" tag="button" to="/todolist"
          >TO DO LIST</router-link
        >
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>