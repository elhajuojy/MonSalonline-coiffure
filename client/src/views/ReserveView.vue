<script setup>
import TheAppointments from "../components/TheAppointments.vue";
import BaseHeader from "../components/BaseHeader.vue";
import BaseFooter from "../components/BaseFooter.vue";

const date = new window.Date();
const TodayDate = new window.Date();

const addMonths = (date, months) => {
  date.setMonth(date.getMonth() + months);

  return date;
};

const allDayHours = [];
for (let i = 0; i < 24; i++) {
  allDayHours.push({
    time: i,
  });
}

const dateAfterMonth = addMonths(date, 1);

console.log(allDayHours);

//this hours of work must be filted based on client reserved date and time
// and employe based working times
// • Du lundi au jeudi et le samedi, de 9h à 12h puis de 14h à 20h
// • Le vendredi, de 9h à 12h puis de 16h à 22h
// • Le dimanche, de 9h à 12h
const hoursOfWork = [];
</script>

<template>
  <div>
    <BaseHeader />
    <div class="rendez-vous">
      <div class="rendez-card shadow-lg" id="card">
        <h1 class="text-center text-4xl font-semibold">Rendez vous</h1>
        <v-date-picker v-model="TodayDate" :max-date="dateAfterMonth" />
        <div class="select-time">
          <label
            for="countries"
            class="block mb-2 text-sm font-medium "
            >Select an option</label
          >
          <select
            id="countries"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
            ">
            <option selected>Choose a country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
          </select>
        </div>
      </div>
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
