import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/admin',
    name: 'admin',
    component: () => import('../views/Admin.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/Login.vue'),
  }

]

const router = new VueRouter({
  routes
})

function tokenExpiredPolicies (expired) {
    if (expired !== undefined) {
        return expired > Math.floor(Date.now() / 1000)
    } else { return false }
}

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        let passport = localStorage.getItem('ecommerce')
        if (passport !== null && tokenExpiredPolicies(passport.expired)) {
            next()
        } else {
            localStorage.removeItem('ecommerce')
            router.replace({ name: 'Login' })
        }
    } else {
        next()
    }
    next()
})

export default router
