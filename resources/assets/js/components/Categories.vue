<template>
<div class="Categories">
 <div class="category">
 <button class="btn btn-primary" name="category" @click="selectedCategory = 'All'" value="All">All</button>
 <button id="catbtn" class="btn btn-primary" v-for="(cat,index) in categories" :key="index" :name="cat" @click="selectedCategory = cat.newcategory" value="cat">{{cat.newcategory}}</button>
 </div>
   <ul>
     <li class="title" v-for="(post,index) in posts" :key="index" v-if="isShow(post.category)">
       <h3 class="post-header">{{ post.newtitle }}</h3>
       <p class="post-text">{{ post.newpost }}</p>
       <p class="post-cat">{{ post.category.newcategory }}</p>
       <hr style="width:60%;background-color:dodgerblue">
    </li>
   </ul>
</div>
</template>

<script>
export default {
  name: "Blogs",
  data() {
    return {
      selectedCategory: "All",
      posts: [],
      categories: []
    };
  },
  mounted() {
    this.post();
    this.category();
  },
  methods: {
    post() {
      let self = this;
      axios.get("/post").then(function(response) {
        self.posts = response.data;
      });
    },
    category() {
      let self = this;
      axios.get("/category").then(function(response) {
        self.categories = response.data;
      });
    },
    isShow(cat) {
      if (
        this.selectedCategory === "All" ||
        this.selectedCategory === cat.newcategory
      ) {
        return true;
      }
      return false;
    }
  }
};
</script>

<style scoped>
ul {
  margin-top: 5%;
  background-color: whitesmoke;
  opacity: 0.9;
  border-radius: 15px;
}
li {
  padding: 40px;
}
.post-header {
  font-family: cursive;
}
.post-text {
  font-family: cursive;
  font-size: 120%;
  text-indent: 30%;
}
.post-cat {
  font-family: cursive;
  font-size: 110%;
  color: dodgerblue;
}
.category {
  margin-top: 5%;
  margin-left: 5px;
}
.category .btn.btn-primary:not(:first-child) {
  margin-right: 4px;
}
</style>
