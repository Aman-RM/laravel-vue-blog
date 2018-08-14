<template>
<div class="container-fluid">
   <div class="Sign-up">
  <h2>Sign up</h2>
  <input type="name" v-model="name" placeholder="name"><br>
  <input type="email" v-model="email" placeholder="Email"><br>
  <input type="Password" v-model="password" placeholder="Password"><br>
  <button type="submit" class="btn btn-primary" @click="signup">Sign Up</button>
  <span>Already a member ? <router-link to="/Login">Login</router-link></span>
    <router-view/>
  </div>
</div>
</template>

<script>
import axios from "axios";

export default {
  name: "SignUp",
  data: function() {
    return {
      name: "",
      email: "",
      password: ""
    };
  },
  methods: {
    signup() {
      axios.post("/register", this.$data).then(
        function() {
          alert("Your account has been created !");
          location.assign("#/Home");
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
  width: 25%;
  background-color: black;
  opacity: 0.8;
  margin-top: 10%;
  border-radius: 5%;
}
.Sign-up {
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
  font-family: cursive;
}
span {
  display: block;
  margin-top: 10px;
  font-size: 14px;
  color: dodgerblue;
  font-family: cursive;
}
a {
  color: white;
}
</style>
