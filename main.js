'use strict';

const { createApp } = Vue;


// const todos = JSON.parse('[{"text":"HTML","done":true},{"text":"CSS","done":true},{"text":"Responsive design","done":true},{"text":"Javascript","done":true},{"text":"PHP","done":true},{"text":"Laravel","done":false}]');

createApp({
    data(){
        return {
            todos: [],
            newTask: '',
        }
    },
    methods: {
        //Get data from back-end
        getTask(){
            axios.post('backend.php', {
                headers: {'Content-Type' : 'multipart/form-data'}
            }).then(response => {
                this.todos = response.data;
              })
        },

        //Send request to add task
        addTask(){
            const data = {newTask: this.newTask};
            axios.post('backend.php', data, {
                headers: {'Content-Type' : 'multipart/form-data'}
            }).then(response => {
                this.todos = response.data;
                this.newTask = '';
            })
        },

        removeItem(element){
            const data = {
                index: element,
                mark: 'remove'
            }
            console.log(data)
            axios.post('backend.php', data, {
                headers: {'Content-Type' : 'multipart/form-data'}
            }).then(response => {
                console.log(response)
            })
        },

        doneSwitch(element){
            const data = {
                index: element,
                mark: 'done'
            }
            console.log(data)
            axios.post('backend.php', data, {
                headers: {'Content-Type' : 'multipart/form-data'}
            }).then(response => {
                this.todos = response.data;
            })
        }
        
    },
    created(){
        this.getTask();
    }
}).mount('#app')