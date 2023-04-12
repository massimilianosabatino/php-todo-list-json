'use strict';

const { createApp } = Vue;

const todos = JSON.parse('[{"text":"HTML","done":true},{"text":"CSS","done":true},{"text":"Responsive design","done":true},{"text":"Javascript","done":true},{"text":"PHP","done":true},{"text":"Laravel","done":false}]');

createApp({
    data(){
        return {
            todos,
        }
    },
    methods: {

        
    }
}).mount('#app')