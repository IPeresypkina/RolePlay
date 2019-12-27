import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/record',
    name: 'record',
    component: () => import('../views/Record.vue')
  },
  {
    path: '/index',
    name: 'index',
    component: () => import('../views/Index.vue')
  },
  {
    path: '/wasteland',
    name: 'wasteland',
    component: () => import('../views/Wasteland.vue')
  },
  {
    path: '/stalker',
    name: 'stalker',
    component: () => import('../views/Stalker.vue')
  },
  {
    path: '/fantasy',
    name: 'fantasy',
    component: () => import('../views/Fantasy.vue')
  }

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
