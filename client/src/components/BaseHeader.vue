
<script setup>

</script>

<template>
  <header>
    <h3>
      MonSaloneline
    </h3>
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/login">Login</router-link>
      <router-link to="/register">Register</router-link>
    </nav>
  </header>
</template>

<style  scoped>
header {
  display: flex;
  width: 100%;
  height: 10vh;
  justify-content: space-between;
  align-items: center;
  padding: 0 1rem ;
  background-color: #333;
  color: #fff;
  position: sticky;
}

nav {
  display: flex;
  justify-content: space-between;

  align-items: center;
  gap: 20px;
  color: #fff;
  margin: 20px;
}
nav a{
  color: #fff;
  text-decoration: none;
}


</style>
