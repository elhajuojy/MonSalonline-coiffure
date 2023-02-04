
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
    state.appointments = data 
    console.log(state.appointments)
}


setTimeout(async() => {
    await fetchAppointments();
}, 2000);

</script>

<template>
    <div>
        <ul>
            <li v-for="appointment in state.appointments" :key="appointment.AppintmentID">
                {{ 
                    appointment.AppointmentDate+
                    appointment.AppointmentTime 

                }}

            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>

</style>