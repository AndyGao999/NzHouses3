<template>
  <div>
  <button class="btn-sm btn-primary" @click="watchingLists" v-text="buttonText"></button>
  </div>
</template>

<script>
import { METHODS } from 'http';
    export default {

        props: ['houseId','watchlists'],
        
        mounted() {
            console.log('Component mounted.')
        },

     data: function (){
         return {
             status: this.watchlists,
         }
     },

      methods: {
          watchingLists(){
              axios.post('/watching/'+this.houseId)
                .then(response=>{
                    this.status=!this.status;
                      console.log(response.data);
                    });
          }
      },

      computed: {
          buttonText(){
              return (this.status) ?'Watching' : 'Add Watch'
          }
      },

    }



</script>
