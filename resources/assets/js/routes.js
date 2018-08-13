import Vue from 'vue'
import VueRouter from 'vue-router'

import Categories from './/components/Categories.vue'
import Aboutus from './/components/Aboutus.vue'
import Contact from './/components/Contact.vue'
import gen from './/components/gen.vue'
import Login from './/components/Login.vue'
import Blogs from './/components/Blogs.vue'
import Signup from './/components/Signup.vue'
import Home from './/components/Home.vue'
import Userblogs from './/components/Userblogs.vue'
import cat from './/components/cat.vue'
import Description from './/components/Description.vue'


Vue.use(VueRouter)

const router = new VueRouter ({
    routes: [
        {
            path: "/",
            component: Blogs,
            children: [

                {
                    path: "/",
                    component: gen
                },
                {
                    path: "/categories",
                    component: Categories
                },
                {
                    path: "/aboutus",
                    component: Aboutus
                },
                {
                    path: "/contact",
                    component: Contact
                },
          ]    
        },
        {
            path: "/login",
            component: Login
        },
        {
            path: "/signup",
            component: Signup
        },
        {
            path: "/home",
            component: Home
        },
        {
            path: "/userblogs",
            component: Userblogs
        },
        {
            path: "/cat",
            component: cat
        },
        {
            path: "/Description",
            component: Description
        },
    ]
})

export default router