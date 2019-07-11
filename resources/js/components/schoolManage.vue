<template>
  <div>

<div class="text-primary"  > <a href="" @click="deleteSchool"> Delete </a></div>


  </div>

</template>

<script>
import { METHODS } from 'http';

    export default {

     props:['deleteId'],



  methods:{
      deleteSchool(){
        axios.post('/schools/'+this.deleteId)
        .then(Response=>{
            console.log(Response.data);
        });
      }
  },



    }
</script>
