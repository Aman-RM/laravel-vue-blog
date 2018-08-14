<template>
<div class="container-fluid">
  <div class="Login">
      <h2>Sign in</h2>
      <input type="text" v-model="email" placeholder="Email"><br>
      <input type="Password" v-model="password" placeholder="Password"><br>
      <button type="submit" class="btn btn-primary" v-on:click="signin">Log in</button>
      <!-- <i  v-show="loading" class="fa fa-spinner fa-spin"></i> -->
        <p>Don't have an Account ? Then <router-link to="/Signup">create one</router-link></p>
        <router-view></router-view>
  </div>
</div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    signin() {
      axios.post("/signin", this.$data).then(
        function(response) {
          if (response.data == "successful") {
            alert("Welcome!");
            location.assign("#/Home");
          } else {
            alert("Error!");
          }
        },
        function() {
          alert("Please enter correct email or password");
        }
      );
    }
  }
};
</script>

<style scoped>
.container-fluid {
  width: 30%;
  background-color: black;
  opacity: 0.8;
  margin-top: 10%;
  border-radius: 5%;
}
.Login {
 width: 70%; 
 margin-left: 14%;
}
input {
  margin: 10px 0;
  width: 100%;
  padding: 10px;
}
button {
  margin-top: 20px;
  cursor: pointer;
}
h2 {
  margin-left: 30%;
  color: white;
}
p {
  margin-top: 10px;
  font-size: 14px;
  color: dodgerblue;
  font-family: cursive;
}
a {
  color: white;
}
.fa.fa-spinner.fa-spin {
  margin-left: 5px;
  color: white;
}
</style>
