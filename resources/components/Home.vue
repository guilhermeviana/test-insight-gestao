<template>
  <div class="container">
    <div class="text-center">
      <div class="row justify-content-center m-3">
        <router-link tag="" to="/crud" 
          ><button class="btn btn-outline-secondary mr-3">CRUD</button></router-link
        >
        <router-link tag="" to="/form" style="list-style: none"
          ><button class="btn btn-outline-secondary">TO DO LIST</button></router-link
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