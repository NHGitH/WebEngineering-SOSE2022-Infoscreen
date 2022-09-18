<template>
    <div>
        <p>Here should be smth.</p>
        <a class="list-buildings-item" v-for="building in buildings" v-bind:key="building.id">
            <p>{{building.name}}</p>
        </a>
    </div>
</template>

<script>
    import { axios } from '../../../../vendor/fruitcake/laravel-cors/tests/js/axios';
    
    export default {
        data: function(){
            return{
                buildings: []
            }
        },
        mounted(){
            this.loadBuildings();
        },
        methods:{
            loadBuildings: function(){
                //load API
                axios.get('/api/buildings')
                .then((response) => {
                    //assign this.buildings
                    this.buildings = response.data.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            }
        }
    }
    </script>