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
.Sign-up {
  margin: 10% 15% 0% 38%;
  width: 20%;
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
span {
  display: block;
  margin-top: 10px;
  font-size: 14px;
  color: dodgerblue;
}
a {
  color: white;
}
</style>
