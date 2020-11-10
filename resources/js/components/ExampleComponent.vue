<template>
    <div class="row">
        <div class="col-sm-4" v-show="adminId === 1">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li v-for="user in users" :key="user.id" @click="getChats(user.id)">{{ user.name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li v-for="chat in chats" :key="chat.id">{{ chat.chat }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                users : [],
                chats : [],
                adminId : Number(document.getElementById('adminId').value)
            }
        },
        created(){
            this.getUsers()
            this.getChats(1)
        },
        methods:{
            getUsers(){
                axios.get('/get_users')
                .then(response => {
                    this.users = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getChats(userId){
                axios.get('/get_chats/'+userId)
                .then(response => {
                    if(response.data === 'None'){
                        this.chats = []
                    }else{
                        this.chats = response.data
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }         
        }
    }
</script>
<style scoped>
    li{
        list-style-type: none;
        padding: 10px;
        border: 1px solid;
        text-align: center;
    }
    li:hover{
        background: cornsilk;
    }
</style>