import { createRouter, createWebHistory } from 'vue-router'
import Home from './Pages/Home.vue'
import Scholarship from './Pages/Scholarship.vue'
import Features from './Pages/Features.vue'
import Testimonials from './Pages/Testimonials.vue'
import About from './Pages/About.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/scholarship', component: Scholarship },
  { path: '/features', component: Features },
  { path: '/testimonial', component: Testimonials },
  { path: '/about', component: About },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
