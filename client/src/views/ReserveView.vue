<script setup>
import TheAppointments from "../components/TheAppointments.vue";
import BaseHeader from "../components/BaseHeader.vue";
import BaseFooter from "../components/BaseFooter.vue";
import { onMounted, ref } from "vue";
import weekDayTiming from "../data/weekDayTiming.json";
import { formatDate } from "@vueuse/shared";
import { useClientStore } from '../stores/ClientStore';
import Swal from 'sweetalert2'


const ClientStore = useClientStore();
var userRef = ClientStore.getuserRef;
const date = new window.Date();


const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const formattedDate = `${year}-${month}-${day}`;
console.log(formattedDate);


const TodayDate = ref(new window.Date());
const DayHoursAvailable = ref(null);
let timings = null;
const hoursOfWork = [];
const selectedDate = ref(null);
const aviablesHours = ref([]);
const isUpdate = ref(false) ; 
let appointmentID = null;
let updateForm = null;
let SelectedTime = ref(null);

onMounted(async()=>{
  ClientStore.fetchClientAppointments();
  timings = getTimingsForDay(today.getDay());
  mapDayHoursAvailable(timings);
  await fetchTodaysHoursReserved(formattedDate);

})



const addMonths = (date, months) => {
  date.setMonth(date.getMonth() + months);
  return date;
};

const mapDayHoursAvailable = (dayTiming) => {
  var AviablesHours = [];
  var monringHoursNumbers = dayTiming.morning_end - dayTiming.morning_start;
  var afternoonHoursNumbers =
    dayTiming.afternoon_end - dayTiming.afternoon_start;
  var temp = dayTiming.morning_start;
  for (let i = 0; i < monringHoursNumbers; i++) {
    AviablesHours.push({
      time: `${temp}:00:00`,
      disabled: false,
    });
    temp++;
  }
  var temp2 = dayTiming.afternoon_start;
  for (let i = 0; i < afternoonHoursNumbers; i++) {
    AviablesHours.push({
      time: `${temp2}:00:00`,
      disabled: false,
    });
    temp2++;
  }
  aviablesHours.value = AviablesHours;
};

function getTimingsForDay(day) {
  return weekDayTiming.find((timing) => timing.day === day);
}

const fetchTodaysHoursReserved = async (today) => {
  
  aviablesHours.value.forEach((element) => {
    element.disabled = false;
  });
   var response = await fetch(`http://localhost:8001/api/Appointment?date=${today}`);
   if ((await response).status == 400) {
    return console.log("no hours found in this date ");
  }
  const todaysHoursReserved = await (await response).json();
  let appointmentTimes = todaysHoursReserved.map(function (appointment) {
    return appointment.AppointmentTime;
  });
  
  // aviablesHours.value = aviablesHours.value.filter((element) => {
  //   return !appointmentTimes.includes(element.time);
  // });
  aviablesHours.value.forEach((element) => {
    if (appointmentTimes.includes(element.time)) {
      element.disabled = true;
    }
    
  });
  console.log(aviablesHours.value);
  console.log(appointmentTimes);

  

};

const confirmAppoitement = async(time) => {
  const myFormData = new FormData();
  myFormData.append('AppointmentDate',selectedDate.value.id);
  myFormData.append('AppointmentTIme',time);
  myFormData.append('CustomerID',userRef);
  myFormData.append("AppointmentStatus","Scheduled")
  myFormData.append("EmployeeID",1);
  myFormData.append("AppointmentType","haircut")
  const response = await fetch("http://localhost:8001/api/Appointment",{
        method: 'POST',
        headers: {
        },
        body: myFormData
    });
    const data = await response.json()
    console.log(data);
    ClientStore.fetchClientAppointments()
    Swal.fire(
      'Thank You !',
      'Your Appointment is confirmed',
      'success'
    );
    location.reload();
};


const cancelAppointment = async (e)=>{
  const myFormData = new FormData(e.target);
  const response = await fetch("http://localhost:8001/api/Appointment",{
        method: 'POST',
        headers: {
        },
        body: myFormData
    });
    const data = await response.json()
    console.log(data);
    ClientStore.fetchClientAppointments();
}


const updateAppointment = async ( event , date , time,IdAppointment)=>{
  isUpdate.value = true;
  TodayDate.value = date;
  appointmentID = IdAppointment;
}

const confirmUpdate = async (e)=>{
  const myFormData = new FormData(e.target);
  myFormData.append('AppointmentDate',selectedDate.value.id);
  myFormData.append('_method',"UPDATE");
  myFormData.append('CustomerID',userRef);
  myFormData.append("AppointmentStatus","Scheduled")
  myFormData.append("EmployeeID",1);
  myFormData.append("AppointmentType","haircut")
  myFormData.append("AppointmentID",appointmentID)

  const response = await fetch("http://localhost:8001/api/Appointment",{
        method: 'POST',
        headers: {
        },
        body: myFormData
    });
    const data = await response.json()
    console.log(data);
    ClientStore.fetchClientAppointments();
    Swal.fire(
      'Thank You !',
      'Your Appointment is Updated Successfully ',
      'success'
    );
  isUpdate.value = false;

}

const submitForm = (e)=>{
  console.log("submit form ")
  if(isUpdate.value === true){
    confirmUpdate(e);
    return
  }
  confirmAppoitement(e);
}

const onDayClick = async (day) => {
  console.log(day);
  console.log("day clicked");
  selectedDate.value = day;
  timings = getTimingsForDay(day.weekdayPosition);
  mapDayHoursAvailable(timings);
  //filter aviablesHours based on if someSelse is reseved this hour
  // condition is the todays date
  var today = day.id;
  console.log(today);
  fetchTodaysHoursReserved(today);
  

  
  

};

const dateAfterMonth = addMonths(date, 1);
</script>

<template>
  <div>
    <BaseHeader />
    <div class="rendez-vous ">
      <div class="rendez-card py-6 shadow-lg" id="card">
        <h1 class="text-center text-4xl font-semibold">Rendez vous</h1>
        <div class="flex gap-6 ">
          <v-date-picker
          v-model="TodayDate"
          :max-date="dateAfterMonth"
          :min-date="new Date()"
          @dayclick="onDayClick"
        />
        <div class="time-grid  border rounded text-white">
          <div :class="!date.disabled  ? 'bg-blue-500' : 'bg-red-500'" @click="!date.disabled? confirmAppoitement(date.time):null" class="time" v-for="date in aviablesHours" :key="date">
            <div class="time-hour" >{{ date.time }}</div>
            <input type="hidden" :value="date.time" >
            <div class="time-available">
              <div class="time-available-circle"></div>
            </div>
          </div>
        </div>
        </div>
        <div class="select-time">
          <label for="countries" class="block mb-2 text-sm font-medium"
            >Select an option</label
          >
          <form action="" @submit.prevent="submitForm" >
            <select
              id="countries"
              class="bg-gray-50 border border-gray-300 transition-all text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              name="AppointmentTIme"
            >
              <option disabled selected>Choose a Time</option>
              <option
                v-for="date in aviablesHours"
                :value="date.time"
                :key="date"
                :v-model="SelectedTime"
              >
                {{ date.time }}
              </option>
            </select>
            <button
              type="submit"
              class=". text-white bg-blue-500 px-4 py-3 rounded mt-4 hover:bg-blue-600 active:bg-blue-600 ease-in transtio"
            >
            <span v-if="isUpdate === true" >
                Update Appointement 
            </span>
            <span v-else >
                Confirm Appointement
            </span>
            </button>
          </form>
          
        </div>
      </div>
      
    </div>
    <div v-if="ClientStore.userAppointments" class="resevertion bg-white m-auto w-full">
      <!-- get length of userAppointments -->
      
      <h1 class="text-center text-4xl font-semibold">Your Reservations</h1>

        <table class="m-auto">
          <thead>
            <tr>
              <th class="text-center">
                Date
              </th>
              <th class="text-center">
                Time
              </th>
              <th class="text-center">
                Status
              </th>
              <th class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="appointment in ClientStore.userAppointments" :key="appointment">
              <td class="px-2 py-4">{{appointment.AppointmentDate}}</td>
              <td class="px-2 py-4">{{appointment.AppointmentTime}}</td>
              <td class="px-2 py-4">{{appointment.AppointmentStatus}}</td>
              <td class="px-2 py-4">
                <form @submit.prevent="cancelAppointment">
                  <input type="hidden" name="AppointmentID" :value="appointment.AppointmentID" />
                  <input type="hidden" name="_method" value="DELETE" />
                  <button
                  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                  Cancel
                </button>
                </form>
              </td>
              <!-- update appointment status -->
              <td class="px-2 py-4">
                <form @submit.prevent="updateAppointment($event , appointment.AppointmentDate,appointment.AppointmentTime,appointment.AppointmentID)">
                  <input type="hidden" name="AppointmentID" :value="appointment.AppointmentID" />
                  <input type="hidden" name="_method" value="UPDATE" />
                  <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                  Update 
                </button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
    </div>

    <BaseFooter />
  </div>
</template>

<style scoped>
.rendez-vous {
  width: 100%;
  height: 80vh;
  background-size: cover;
  display: grid;
  justify-content: center;
  align-content: center;
}

#card {
  width: 80vw;
  min-height: 60vh;
  background-color: whitesmoke;
  border-radius: 5px;
  padding: 0 0.5rem;
  display: grid;
  gap: 1rem;
  justify-content: center;
  align-content: center;
}

.time-grid{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: repeat(3, 1fr);
  gap: 2rem;
  padding: 1rem;
  justify-items: center;
  align-items: center;
  
}

.time{
  width: 100%;
  height: 100%;
  display: grid;
  justify-content: center;
  align-content: center;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 0.5rem;
  cursor: pointer;
  
}
.time-hour{
  font-size: 1rem;
  font-weight: 600;
}
@media (max-width: 850px) {
  #card {
    width: 90vw;
  }
}
</style>
