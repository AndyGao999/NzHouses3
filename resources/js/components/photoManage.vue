<template>
  <div>

<div class="row col-sm-12">
  <div class="col-sm-8"> <img  v-bind:src="photoImage" class="w-100 m-2">  </div>
<div class="col-sm-4"> <br><button class="btn-sm btn-primary" @click="deletePhoto" v-if="!mainCheck" >Delete</button> <br><br>
                      <button class="btn-sm btn-primary" @click="setMain"  v-if="!mainCheck">Set To Main Photo</button>
                      <h5 class="text-success" v-if="mainCheck">This is main photo</h5></div>

  </div>
  </div>
</template>

<script>
import { METHODS } from 'http';
    export default {

        props:['photoId','photoImage','mainCheck'],



      methods: {
          deletePhoto(){
              axios.post('/photos/'+this.photoId)
                .then(response=>{

                      console.log(response.data);
                    });
          },

        setMain(){
            axios.post('/photoes/'+this.photoId)
                        .then(response=>{
                            console.log(response.data);
                        });


        }

      },

    }



</script>
