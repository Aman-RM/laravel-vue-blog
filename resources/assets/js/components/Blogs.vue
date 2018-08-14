<template>
<div>
<nav class="navbar navbar-expand-lg float-right">
  <router-link to="/Login">Login <i class="fas fa-sign-in-alt"></i></router-link>
  <router-link to="/Signup">Signup <i class="fas fa-user-plus"></i></router-link>
</nav>
<br>
<div class="head">
  <h1 class="blog"><i class="fab fa-blogger-b"></i>logs</h1>
</div>
  <div class="tabs">
   <router-link to="/Categories">Categories</router-link>
   <router-link  to="/Aboutus">About us</router-link>
   <router-link to="/Contact">Contact</router-link>
  </div>
  <router-view></router-view>
</div>
</template>

<script scoped>
export default {
  data() {
    return {
      show: false
    };
  }
};
</script>

<style scoped>
h1.blog {
  margin-top: 20px;
  text-align: center;
  font-family: cursive;
  font-size: 400%;
  color: white;
  margin-left: 80px;
}
.post-header {
  font-family: cursive;
}
a {
  float: left;
  color: white;
  text-decoration: none;
  padding: 8px;
}
a:hover {
  color: dodgerblue;
  text-decoration: none;
}
.Add-post {
  margin-right: 25%;
  margin-left: 25%;
}
.float-md-right {
  margin-top: 0;
}
.router-link-exact-active.router-link-active {
  border-bottom: 3px solid dodgerblue;
}
.tabs {
  padding: 60px;
  margin-left: 35%;
}
.fab.fa-blogger-b {
  color: dodgerblue;
}
.category .btn.btn-primary:not(:first-child) {
  margin-right: 4px;
}
i {
  color: dodgerblue;
}
</style>
