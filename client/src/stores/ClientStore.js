import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'



export const useClientStore=  defineStore('ClientStore',{
    state: () => ({
       userRef : useStorage('userRef', null),
       userInformation : null,
        userToken : null,
        userRole : null,
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