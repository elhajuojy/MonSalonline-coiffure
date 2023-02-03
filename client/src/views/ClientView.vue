<script setup>
import { useClientStore } from "../stores/ClientStore";

//redirect the when some put the route and ref is null ye 

const clientStore = useClientStore();

onBeforeMount(clientStore.redirectwhenUserIsNotConnected())


</script>

<template>
    <div class="Client-main">
        <h1>Client Main Page when he Logged in </h1>
    </div>

</template>


<style lang="scss" scoped>
</style>