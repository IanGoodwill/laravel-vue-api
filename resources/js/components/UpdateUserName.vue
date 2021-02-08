<template>
  <section>
    <h2>Update User Name</h2>
    <form @submit="update" action="#" method="GET">
      <label for="id">
        User ID:
        <input type="number" name="id" id="id" v-model="userId"/>
      </label>
      <label for="name">
        User name:
        <input type="text" name="name" id="name" v-model="userName"/>
      </label>
      <input type="submit" value="Update User" />
    </form>
    <dl v-if="user">
        <dt> Status </dt>
         <dd> User was succesfully updated</dd>
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
  name: "update-user-name",
  data ()
  {
      return {
          userId: '',
          userName: '',
          user: false
      }
  },
  methods: {
      update ( event )
      { // Make sure our form does not refesh the page
          event.preventDefault();
          const userId = parseInt( this.userId );
          const userName = this.userName;
          // search for the user
          axios.patch( `/laravel-vue-api/public/api/user/${userId}`, {
                  name: userName
              
          } ) // ${} syntax is a template literal
            .then( response => {
              //  console.log( response );
              const user = response.data;
              this.user = user;
              // clear the name and id fields
              this.userId = '';
              this.userName = '';
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