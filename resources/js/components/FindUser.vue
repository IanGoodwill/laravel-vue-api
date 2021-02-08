<template>
  <section>
    <h2>Find A User By ID</h2>
    <form @submit="search" action="#" method="GET">
      <label for="userId">
        User ID:
        <input type="number" name="id" id="id" v-model="userId"/>
      </label>
      <input type="submit" value="Find User" />
    </form>
    <dl v-if="user">
        <dt> Name </dt>
        <dd> {{ user.name }} </dd>
        <dt> E-Mail Address </dt>
        <dd> {{ user.email }} </dd>
    </dl>
    <p v-else>
        User not found.
    </p>
  </section>
</template>

<script>
export default {
  name: "find-user",
  data ()
  {
      return {
          userId: '',
          user: false
      }
  },
  methods: {
      search ( event )
      { // Make sure our form does not refesh the page
          event.preventDefault();
          const userId = parseInt( this.userId );
          // search for the user
          axios.get( `/laravel-vue-api/public/api/user/${userId}` ) // ${} syntax is a template literal
            .then( response => {
              //  console.log( response );
              const user = response.data;
              this.user = user;
            } )
            .catch( error => { // catch is used for a request failure
                this.user = false;
                console.log( error );
            } )
      }
  }
};
</script>

<style scoped>
</style>