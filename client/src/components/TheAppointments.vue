
<script setup>
//idea is to get all appoitments date and time and add all 
// the date employe not working on the disable all this date 
// and disable before and after month of choosing date 
// and reset of all those conndition client can choose date from them 

import { onMounted, reactive, ref } from "vue";

// Dsiable  all  reserved in this month not day but time appoitmeent 
// disable  all Employe  free time 
// dsiable before date 
// disable after month date 

const state = reactive({
    appointments: []
})

const fetchAppointments  = async ()=>{
    const response = await fetch("http://localhost:8001/api/Appointment");
    const data = await response.json()
   setTimeout(()=>{
        state.appointments = data
   },2000)
    console.log(state.appointments)
}

await fetchAppointments();

</script>

<template>
    <div>
        <ul>
            <li v-for="appointment in state.appointments" :key="appointment.AppintmentID">
                {{ 
                    appointment
                }}
            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>

</style>