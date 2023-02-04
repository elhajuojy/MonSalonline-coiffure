
<script setup>
import TheAppointments from '../components/TheAppointments.vue';

const date = new window.Date();


const addMonths = (date, months)=> {
  date.setMonth(date.getMonth() + months);

  return date;
}

const allDayHours  = [];
for (let i = 0; i < 24; i++) {
  allDayHours.push({
    'time':i
  });
}

const dateAfterMonth = addMonths(date , 1);


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
        <h1>
            Resverstion Client Page  He can went here only if he is loged in  ... 
        </h1>
        <p>
            good news you are loged in ✅
        </p>

        <div class="calander">
            <!-- <v-calendar /> -->
            <v-date-picker 
            v-model="date"
            :min-date='new Date()'
            :max-date = 'dateAfterMonth'
            />

        </div>
        <v-date-picker 
        v-model="date"
        :min-date='new Date()'
        :max-date = 'dateAfterMonth'
        
        >
            <template #default="{ inputValue, inputEvents }">
              <input class="px-3 py-1 border rounded" :value="inputValue" v-on="inputEvents" />
            </template>
          </v-date-picker>


        <div class="workingHours">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose a time</option>
            <option v-for="date in hoursOfWork" :key="date">{{date.time}}</option>
            </select>
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