import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'



export const useClientStore=  defineStore('ClientStore',{
    state: () => ({
       useRef : useStorage('userRef', null),
       userInformation : null,
        userToken : null,
        userRole : null,
    }),
    getters:{
        userRef (){
            return this.useRef
        }
    }
    ,
    actions:{
        setUserRef(ref){
            this.useRef = ref
        }
        ,
        setUserRefInLocalStorage(ref){
            this.useRef = ref
            localStorage.setItem('userRef', ref)
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