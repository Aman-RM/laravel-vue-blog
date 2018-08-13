<template>
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg float-md-right">
  <router-link to="/Userblogs">Blogs <i class="fab fa-blogger-b"></i></router-link>
  <router-link to="/Categories">Logout <i class="fas fa-sign-out-alt"></i></router-link>
  </nav>
  <div>
  <h1 class="post"> Create Blog </h1>
  </div>

   <div class="Add-post">
   <span class="Scat">Select Category - </span>
   <select v-model="newcategory">
   <option disabled="disabled" selected="selected">Select Category</option>
   <option v-for="(cat,index) in categories" :key="index" :value="cat">{{cat.newcategory}}</option>
   </select>
   <router-link to="/cat"><button type="button" class="btn btn-link btn-sm">Add New Category</button></router-link>
   <input class="form-control" placeholder="Blog title" v-model="newtitle"><br>
   <textarea class="form-control" placeholder="Blog content" v-model="newpost"></textarea><br>
   <button class="btn btn-primary" @click="addpost"  >Submit</button>
   <button class="btn btn-info" @click="updatepost" >Update</button>
   </div>
   <div class="category">
   <button class="btn btn-primary" name="category" @click="selectedCategory = 'All'" value="All">All</button>
   <button class="btn btn-primary" v-for="(cat,index) in categories" :key="index" :name="cat" @click="selectedCategory = cat" value="cat">{{cat.newcategory}}</button>
   </div>
   <ul>
     <li class="title" v-for="(post,index) in posts" :key="index">
       <h3 class="post-header"> <router-link :to="'/Description/'+ index">{{ post.newtitle }}</router-link></h3>
       <p class="post-text collapse"> {{ post.newpost }} </p>
       <p class="post-cat">{{ post.category.newcategory }}</p>
       <button class="btn btn-success"  @click="editpost(post, index)">Edit</button>
       <button class="btn btn-danger" @click="removepost(post.id, index)">Remove</button>
       <hr style="width:60%;background-color:dodgerblue">
    </li>
   </ul>
  <router-view/>
  </div>
</template>

<script scoped>

export default {
  name: 'Home',
  data () {
    return {
      newtitle: '',
      newpost: '',
      posts: [],
      newcategory: '',
      categories: [],
    }
  },
  mounted() {
    this.post()
    this.category()
  },
  methods: {
   addpost() {
      let data = {
        newtitle: this.newtitle,
        newpost: this.newpost,
        newcategory: this.newcategory.id,
        category: this.newcategory
      }
       axios.post('/addpost', data).then( response => {
            this.posts.push(data)
        })
          this.newtitle= '',
          this.newpost= '',
          this.newcategory= ''
       
       
   },
   updatepost(){},

   removepost(id, index) {
      console.log(id)
      let self = this
      let data = {
        id: id
      }
      data['_method'] = 'DELETE'
      axios.post('/post/' + id, data).then( response => {
          this.posts.splice(index, 1)
      })
   },

   post() {
     let self = this
     axios.get('/post').then(
         function (response) {
            self.posts = response.data
          }
      )
   },
   category() {
      let self = this
      axios.get('/category').then(
        function(response) {
        self.categories = response.data
        }
      )
    }
  }
}
</script>

<style scoped>
h3 {
  color: black;
}
ul {
  margin-top: 5%;
  background-color: whitesmoke;
  opacity: 0.9;
  border-radius: 15px;
}
li {
  padding: 40px;
}
.post {
  text-align: center;
  font-size: 400%;
  font-family: cursive;
  margin-left: 45px;
  color: white;
}
.float-md-right {
    margin-top: 1%;
}
.post-header {
  font-family: cursive;
}
.post-cat {
  font-family: cursive;
}
a {
  color: black;
  text-decoration: none;
  padding: 5px;
}
a:hover {
  color: dodgerblue;
  text-decoration: none;
}
.Add-post {
  margin-right: 25%;
  margin-left: 25%;
}
.btn.btn-primary {
  margin-top: 15px;
}
.btn.btn-info {
  margin-top: 15px;
  margin-left: 10px;
}
.category {
 margin-left: 20px;
 margin-top: 40px;
}
.category .btn.btn-primary:not(:first-child) {
margin-right: 4px;
}
.form-control {
  margin-top: 20px;
  margin-top: 3%;
}
select {
  margin-top: 5%;
}
.btn.btn-primary.btn-sm {
margin-bottom: 20px;
}
.Scat {
  font-family: cursive;
}
.btn.btn-link.btn-sm {
  text-decoration: none;
  border: 3px solid dodgerblue;
  margin-left: 5px;
  margin-bottom: 5px;
  color: white;
  font-family: cursive;
}
span {
  color: white;

}
</style>
