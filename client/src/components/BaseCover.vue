
<script setup>
const props = defineProps(['img'])
const color = 'red';
</script>

<template>
    <div class="main-cover"
    v-bind:style="{ 
        'background-image': `url(${props.img})`
      }" 

    >
        <slot/>
    </div>
</template>



<style scoped>

.main-cover{
    margin-top: 2rem;
    width: 100%;
    background-size: cover;
    color: white;
    height: 300px;
    display: grid;
    justify-content: center;
    align-content: center;
    justify-items: center;
    padding: 3rem;

}
</style>