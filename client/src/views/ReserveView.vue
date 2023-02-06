<script setup>
import TheAppointments from "../components/TheAppointments.vue";
import BaseHeader from "../components/BaseHeader.vue";
import BaseFooter from "../components/BaseFooter.vue";
import { ref } from "vue";
import weekDayTiming from "../data/weekDayTiming.json";
//this hours of work must be filted based on client reserved date and time
// and employe based working times
// • Du lundi au jeudi et le samedi, de 9h à 12h puis de 14h à 20h
// • Le vendredi, de 9h à 12h puis de 16h à 22h
// • Le dimanche, de 9h à 12h

const date = new window.Date();
const TodayDate = new window.Date();
const DayHoursAvailable = ref(null);
let timings = null;
const hoursOfWork = [];
const selectedDate = ref(null);

const aviablesHours = ref([])

const addMonths = (date, months) => {
  date.setMonth(date.getMonth() + months);

  return date;
};


const mapDayHoursAvailable = (dayTiming) => {
  var AviablesHours = []
  var monringHoursNumbers = dayTiming.morning_end - dayTiming.morning_start ;
  var afternoonHoursNumbers = dayTiming.afternoon_end - dayTiming.afternoon_start;
  var temp = dayTiming.morning_start;
  for(let i=0;i<monringHoursNumbers;i++){
    AviablesHours.push(`${temp}:00:00`)
    temp++
  }
  var temp2 = dayTiming.afternoon_start;
  for(let i=0;i<afternoonHoursNumbers;i++){
    AviablesHours.push(`${temp2}:00:00`)
    temp2++;
  }
  aviablesHours.value = AviablesHours;

};




const allDayHours = [];
for (let i = 0; i < 24; i++) {
  allDayHours.push({
    time: i,
  });
}


function getTimingsForDay(day) {
  return weekDayTiming.find(timing => timing.day === day);
}


const fetchTodaysHoursReserved = async (today)=>{

  return await fetch(`http://localhost:8001/api/Appointment?date=${today}`)


}

const onDayClick = async(day ) => {
  
  selectedDate.value = day;
  timings = getTimingsForDay(day.weekdayPosition);
  mapDayHoursAvailable(timings);
  //filter aviablesHours based on if someSelse is reseved this hour 
  // condition is the todays date 
  var today = day.id 
  const response =  fetchTodaysHoursReserved(today);

  if((await response).status == 400){
    return console.log("no hours found in this date ")
  } 
  const todaysHoursReserved = await (await response).json() ;
  //filter AviableHours besed on date on data 1
  // filterHours(todaysHoursReserved);
  console.log(todaysHoursReserved.length);
  filterHours(todaysHoursReserved);
};

const filterHours = (hours)=>{
  console.log(aviablesHours.value);
}




const dateAfterMonth = addMonths(date, 1);



</script>

<template>
  <div>
    <BaseHeader />
    <div class="rendez-vous">
      <div class="rendez-card shadow-lg" id="card">
        <h1 class="text-center text-4xl font-semibold">Rendez vous</h1>
        <v-date-picker v-model="TodayDate" 
        :max-date="dateAfterMonth"
        :min-date="new Date()"
        @dayclick="onDayClick"/>
        <div class="select-time">
          <label
            for="countries"
            class="block mb-2 text-sm font-medium "
            >Select an option</label
          >
          <select
            id="countries"
            class="bg-gray-50 border border-gray-300 transition-all	 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
            ">
            <option disabled selected>Choose a Time </option>
            <option  v-for="date in aviablesHours " :key="date">
              {{ 
                date
              }}
            </option>
            
          </select>
          <button class=". text-white bg-blue-500 px-4 py-3 rounded mt-4 hover:bg-blue-600 active:bg-blue-600 ease-in transtio">
              confirm reservation
          </button>
        </div>
      </div>
      
    </div>
    <div class="information">
      <p v-if="selectedDate">
        <span class="font-semibold">Date:</span> {{ selectedDate.id }}
        <span>
          <br> information i need <br>
          {{ 
            selectedDate.ariaLabel + 
            "week day position"+ selectedDate.weekdayPosition
          }}
        </span>
      </p>
      <p v-if="timings">
        <span class="font-semibold">Timings:</span>
        {{ timings }} 
      </p>
    </div>
    <BaseFooter/>
  </div>
</template>

<style scoped>
.rendez-vous {
  width: 100%;
  height: 90vh;
  background-image: url("https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80");
  background-size: cover;
  display: grid;
  justify-content: center;
  align-content: center;
}

#card {
  width: 40vw;
  min-height: 60vh;
  background-color: whitesmoke;
  border-radius: 5px;
  padding: 0 0.5rem;
  display: grid;
  gap: 1rem;
  justify-content: center;
  align-content: center;
}

@media (max-width: 850px) {
  #card {
    width: 90vw;
  }
}
    


</style>
