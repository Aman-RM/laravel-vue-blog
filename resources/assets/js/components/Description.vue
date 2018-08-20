<template>
<div class="Container-fluid">
  <div>
    <nav class="navbar navbar-expand-lg float-md-left">
    <router-link to="/Home"><i class="fas fa-arrow-left"></i> Back</router-link>
    </nav>
  <h1 class="blog"><i class="fab fa-blogger-b"></i>logs</h1>
   <ul>
     <li class="title">
       <h3 class="post-header">{{ post.newtitle }}</h3>
       <p class="post-text">{{ post.newpost }}</p>
       <p class="post-cat">{{ post.newcategory }}</p>
       <hr style="width:60%;background-color:dodgerblue">
    </li>
   </ul>
  </div>
</div>
</template>

<script>
export default {
  name: "Description",
  data() {
    return {
      post: "",
      posts: []
    };
  },
  mounted() {
    let self = this;
    axios.get("/post/" + this.$route.params.id).then(function(response) {
      console.log(response);
      self.post = response.data;
    });
  }
};
</script>

<style scoped>
div {
  background-repeat: no-repeat;
  background-size: cover;
}
.blog {
  text-align: center;
  font-family: cursive;
  font-size: 400%;
  color: white;
}
ul {
  margin-top: 5%;
  background-color: whitesmoke;
  opacity: 0.8;
  border-radius: 15px;
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
  padding: 15px;
  margin-left: 36%;
}
.fab.fa-blogger-b {
  color: dodgerblue;
}
.category {
  margin-left: 20px;
}
.post-text {
  letter-spacing: 1px;
  font-family: cursive;
  text-indent: 30%;
  font-size: 120%;
}
i {
  color: dodgerblue;
}
.navbar.navbar-expand-lg.float-md-left {
  font-family: cursive;
}
</style>
