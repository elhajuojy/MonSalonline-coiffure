import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'



export const useClientStore=  defineStore('ClientStore',{
    state: () => ({
       userRef : useStorage('userRef', null),
       userInformation : null,
        userToken : null,
        userRole : null,
        userAppointments : null,
    }),
    getters:{
        getuserRef (){
            return this.userRef
        }
    }
    ,
    actions:{
        setUserRefInLocalStorage(ref){
            localStorage.setItem('userRef', ref)
        },
        fetchClientAppointments(){
            fetch(`http://localhost:8001/api/Appointment?Customer_reference=${this.userRef}`)
                .then(response => response.json())
                .then(data => {
                    this.userAppointments = data.data
                    console.log(this.userAppointments)
                })
        },
        getUserRefInLocalStorage(){
            this.userRef = localStorage.getItem('userRef')
        },
        redirectwhenUserIsNotConnected(){
            if(this.userRef === null){
                window.location.href = '/login'
            }
        },
        setUserInformation(info){
            this.userInformation = info
        }
        ,
        setUserToken(token){
            this.userToken = token
        }
        ,
    }
})