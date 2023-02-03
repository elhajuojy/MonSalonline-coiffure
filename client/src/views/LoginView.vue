<script setup>
import { ref } from "vue";
import BaseHeader from  "../components/BaseHeader.vue"
import {useRouter} from "vue-router";
import axios from "axios"
import { useClientStore } from "../stores/ClientStore";
const reference = ref("")
const messageError = ref("")
const router = useRouter();

const ClientStore = useClientStore();

var login = async (e)=>{
    const formData = new FormData();
    formData.append('Customer_reference', reference.value);
    e.preventDefault();
    console.log(reference.value)
    const response = await fetch("http://localhost:8001/api/customer/login",{
        method: 'POST',
        headers: {
        },
        body: formData
    });
    const data = await response.json()
    if(response.status=="200"){
        // you need to store his referance on cookie so he can register in all website 
        console.log(data.Customer_reference);
        ClientStore.setUserRefInLocalStorage(data.Customer_reference);
        router.push("/reserve");
    }
    else{
        
        messageError.value = data.message ;
    }
    
    
}
</script>


<template>
    <div>
        <BaseHeader/>
        <div class="referance-section">
            <form @submit.prevent="login">   
                <div class="logo">
                    <img class=". rounded-full w-52 m-auto" src="https://img.freepik.com/premium-vector/beard-man-design-logo-illustration_441059-23.jpg?w=740" alt="">
                </div>
                <label for="default-search" class="mb-2 text-sm font-medium  sr-only ">Search</label>
                <div class="relative">
                    <input v-model="reference" type="login" id="default-login" class="block w-full p-4 pl-10 text-sm  border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="login in by your referance ..." required>
                    <span class="text-red-400">
                        {{ messageError }}
                    </span>
                </div>
                <button type="submit" class="text-white w-56 m-auto   bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log in </button>
            </form>
        </div>
    </div>
</template>


<style scoped>
.referance-section{
    display: grid;
    margin: auto;
    height: 90vh;
    align-items: center;
    max-width: 666px;
    width: 95%;
    margin: auto;
}

form{
    display: grid;
    gap: 4rem ;
}

</style>