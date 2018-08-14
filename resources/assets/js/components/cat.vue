<template>
 <div class = "container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark float-md-left">
  <router-link to="/Home"><i class="fas fa-arrow-left"></i> Back</router-link>
  </nav>
 <h1> Add Category </h1>
 <div class="cat">
 <div class="newCat">
 <input v-model="newcategory" type="text" placeholder="New Category"> <button class="btn btn-primary btn-sm" @click="addcategory">Add</button>
 </div>
 </div>
 <div class="category">
 <p>Click to remove category</p>
 <button class="btn btn-primary" @click="removecategory(cat.id,index)" v-for="(cat,index) in categories" :key="index" :name="cat" value="cat">{{cat.newcategory}}</button>
 </div>
 </div>
</template>

<script scoped>
export default {
  name: "cat",
  data() {
    return {
      newcategory: "",
      categories: [],
      cat: ""
    };
  },
  mounted() {
    this.category();
  },
  methods: {
    addcategory() {
      let data = {
        newcategory: this.newcategory
      };
      let self = this;
      axios.post("/addcategory", data).then(function(response) {
        console.log(response);
        self.categories.push(response.data);
      }, (this.newcategory = ""));
    },
    category() {
      let self = this;
      axios.get("/category").then(function(response) {
        self.categories = response.data;
      });
    },
    removecategory(id, index) {
      console.log(id);
      let data = {
        id: id
      };
      data["_method"] = "DELETE";
      axios.post("/category/" + id, data).then(response => {
        this.categories.splice(index, 1);
      });
    }
  }
};
</script>

<style scoped>
.container-fluid {
  background-repeat: no-repeat;
  background-size: cover;
}
h1 {
  font-size: 400%;
  text-align: center;
  font-family: cursive;
  margin-right: 5%;
  color: white;
}
select {
  margin-top: 5%;
}
.newCat {
  margin-top: 5%;
}
.category {
  margin-top: 5%;
  margin-left: 40%;
}
.cat {
  margin-left: 46%;
  margin-top: 3%;
}
.category .btn.btn-primary {
  margin-right: 4px;
}
.btn.btn-primary.btn-sm {
  margin-bottom: 5px;
}
a:hover {
  color: dodgerblue;
  text-decoration: none;
}
a {
  color: white;
}
.newCat {
  margin-left: -7%;
}
p {
  font-size: 200%;
  margin-right: 3%;
  font-family: cursive;
  color: white;
}
i {
  color: dodgerblue;
}
</style>
