<script setup>
import BaseHeader from "../components/BaseHeader.vue";
</script>


<template>
  <div class="home">
    <BaseHeader />
    <div class="cover">
      <h1>MonSaloneline</h1>
      <p>Find your salon</p>
      <router-link to="/register">Register</router-link>
    </div>
    <div class="main-section">
      <h2>What is MonSaloneline?</h2>
      <p>
        MonSaloneline is a platform that allows you to find your salon and book
        an appointment with your favorite stylist.
      </p>
      <div class="cards">
        <v-avatar color="primary" size="56">
          <v-icon>mdi-account</v-icon>
        </v-avatar>
      </div>
    </div>
  </div>
</template>

<style scoped >
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}
.main-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 2rem;
  gap: 1rem;
}
.cover {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 90vh;
  background-color: #333;
  background-image: url("https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");
  background-size: cover;
  color: #fff;
}

.cover h1 {
  font-size: 5rem;
  margin: 0;
}

.cover p {
  font-size: 2rem;
  margin: 0;
  background: gold;
  padding: 0.5rem;
  color: #333;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
}

.cover p:hover {
  background: #333;
  color: gold;
  transform: rotate(10deg);
}

.cover a {
  text-decoration: none;
  color: #fff;
  padding: 0.5rem;
  margin-top: 1rem;
  background: #333;
  transition: all 0.3s ease-in-out;
  box-shadow: -1px -1px 5px -1px rgba(0, 0, 0, 0.27);
  -webkit-box-shadow: -1px -1px 5px -1px rgba(0, 0, 0, 0.27);
  -moz-box-shadow: -1px -1px 5px -1px rgba(0, 0, 0, 0.27);
}
.cover a:hover {
  background: gold;
  color: #333;
  transform: scale(1.1);
}
</style>
