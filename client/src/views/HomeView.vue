<script setup>
import BaseHeader from "../components/BaseHeader.vue";
import BaseCalander from "../components/BaseCalander.vue";
import BaseCard from "../components/BaseCard.vue";
import BaseFooter from "../components/BaseFooter.vue";
import BaseCover from "../components/BaseCover.vue";

const imgCover = 'https://images.unsplash.com/photo-1600948836101-f9ffda59d250?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1136&q=80';
const cardsData = [
  {
    src: "https://images.unsplash.com/photo-1605497787865-e6d4762b386f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80",
    content:
      " is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a",
  },
  {
    src: "https://images.unsplash.com/photo-1532710093739-9470acff878f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
    content:
      " is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a",
  },
  {
    src: "https://images.unsplash.com/photo-1514336937476-a5b961020a5c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDl8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
    content:
      " is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a",
  },
  {
    src: "https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDEyfHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60",
    content:
      " is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a",
  },
];

</script>

<template>
  <div class="home">
    <BaseHeader />
    <div class="cover">
      <h1>MonSaloneline</h1>
      <p>Find your salon</p>
      <router-link to="/register" class=" text-blue-400">Register</router-link>
    </div>
    <div class="main-section">
      <h2>What is MonSaloneline?</h2>
      <p>
        MonSaloneline is a platform that allows you to find your salon and book
        an appointment with your favorite stylist.
      </p>
    </div>
    <div class="cards">
      <BaseCard v-for="card in cardsData" :card="card" :key="card.content"/>
    </div>
    
    <BaseCover :img="imgCover">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente, quidem temporibus quaerat sunt excepturi reprehenderit repellat sit eaque accusamus assumenda quasi nam provident laudantium nobis, asperiores et modi blanditiis? Fugiat.
      </p>
    </BaseCover>

    <BaseFooter/>
  </div>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}

.cards {
  width: 90%;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  justify-content: center;
  justify-items: center;
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
