<template>
  <section>
    <h2>Users</h2>

    <ul>
      <li v-for="user in users" :key="user.id">
        <h3>{{ user.name }}</h3>
        <p>
          <a :href="'mailto:' + user.email"> {{ user.email }} </a>
        </p>
      </li>
    </ul>
  </section>
</template>


<script>
export default {
  name: "users-component",
  data() {
    return {
      users: []
    };
  },
  mounted()
   {
    axios.get( '/laravel-vue-api/public/api/users' )
    .then( response => {
      //console.log( response );
      this.users = response.data;
    } )

    axios.get('http://api.giphy.com/v1/gifs/search?q=Matt+Damon&api_key=123456')

    .then( response => {

        console.log(response);

    } )

    /*
    // AJAX request for users
    fetch("/laravel-vue-api/public/api/users")
      // convert users data to a JS object
      .then(response => response.json())
      // Store data in out component "data"
      .then(data => {
        this.users = data;
      });
      */
  }
};
</script>


<style scoped>
</style>