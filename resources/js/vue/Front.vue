<template>
  <div class="room-heading">
    <section>
      <div class="head-container">
        <img
          class="hochschuleLogo"
          src="getLogo() + Logo_der_Hochschule_Flensburg.png"
          width="150px"
          alt="logo"
        />
        <h1 class="welcome">Willkommen im Raum 6 des C-Gebäudes</h1>
        <div class="clock">
          <h1 class="time"></h1>
          <h1>
            {{time}}
          </h1>
        </div>
      </div>

      <div class="main-container">
        <div class="module-card"></div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
    name: "TimeComponent",

    data: () => ({

    }),

    methods: {
        getLogo(){
          return "images/";
        }
    },
    computed:{
      time(){
        let date = new Date();
        let time = date.getHours() + ":" + date.getMinutes();
        return time;
      }
    },
    mounted: function() {
    }
};
</script>

<style scoped>
.room-heading{
  color: white;
}
</style>