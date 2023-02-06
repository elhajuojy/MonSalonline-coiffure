
<script setup>
import { useClientStore } from '../stores/ClientStore';


const ClientStore = useClientStore();


var userRef = ClientStore.getuserRef;

const logout =()=>{
  localStorage.removeItem('userRef');
  window.location.href = "/login";
}

// userRef = null;
</script>

<template>
  <header class=". shadow">
    <h3>
      <router-link to="/">MonSaloneline</router-link>
    </h3>
    <nav>

      <router-link to="/reserve" class="userRef" v-if="userRef">{{userRef}}</router-link>
      <router-link to="/">Home</router-link>
      <router-link v-if="!userRef" to="/login">Login</router-link>
      <a v-if="userRef" href="#"  @click="logout">logout</a>
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

.userRef{
  color:  gold;
}


</style>
