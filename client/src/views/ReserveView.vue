
<script setup>
import TheAppointments from '../components/TheAppointments.vue';

</script>

<template>
    <div>
        <h1>
            Resverstion Client Page  He can went here only if he is loged in  ... 
        </h1>
        <p>
            good news you are loged in ✅
        </p>
        <div class="calander">
            <!-- <v-calendar /> -->
            <v-date-picker v-model="date" />
        </div>
        <Suspense>
            <TheAppointments/>
            <template #fallback>
                Loading...
            </template>            
        </Suspense>
    </div>
</template>

<style lang="scss" scoped>

</style>