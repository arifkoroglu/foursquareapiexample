<template>
   <div>
      <b-container class="bv-example-row">
         <b-row >
            <b-col v-if="venues" cols="12" md="12">
               <b-alert  v-for="venue in venues" show>{{ venue.name }}</b-alert>
            </b-col>
         </b-row>

         <b-row >
            <b-col v-if="venues.length < 1" cols="12" md="12">
               <b-alert
                       v-model="showDismissibleAlert"
                       v-if="venues.length < 1"
                        variant="warning"
               >Sory:( Venue not found...</b-alert>
            </b-col>
         </b-row>
            <b-row cols="1" cols-sm="4" cols-md="3" cols-lg="6">
            <b-col v-for="category in categories">
               <div class="card" style="height:320px;margin-bottom:20px;">
                  <img class="card-img-top" style="background-color:#007bff;" v-bind:src="category.icon.prefix+64+category.icon.suffix" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">{{ category.name }}</h5>

                  </div>
                  <div class="card-footer">
                     <b-button variant="outline-primary"  @click="fetchVenue(category.id,category.name),showDismissibleAlert=true"  >Get Venues</b-button>

                  </div>
               </div>
            </b-col>
         </b-row>
      </b-container>
   </div>
</template>

<script>
   export default {

       data() {
           return {
               categories: [],
               venues: [],
               category:{
                   id: '',
                   name: '',
                  icon:{
                     prefix:'',
                     suffix:'',
                  },
               },
              showDismissibleAlert: false

           }

       },

       created: function() {
           fetch('/venues')
               .then(resp => resp.json())
               .then(categories => {
                   this.categories = categories.response.categories;

               })
       },
      methods: {

         fetchVenue(id,name) {

               fetch(`venue/${id}/${name}`, {
                  method: 'get'
               })
                       .then(res => res.json())
                       .then(venues => {
                          this.venues = venues.response.venues;

                       })
                       .catch(err => console.log(err));
         },
      }
   }
</script>