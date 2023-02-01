
<script setup>


const props = defineProps(['card'])


</script>
<template>
    <div class="card">
        <div class="img">
            <img :src="card.src" alt="">
        </div>
        <p>
            {{ card.content }}
        </p>
    </div>
</template>

<style  scoped>

.card{
    max-width: 400px;

}


.img img{
    width: 100%;
    height:200px;
    object-fit: cover;
}

</style>