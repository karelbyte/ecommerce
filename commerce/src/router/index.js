import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/admin',
    name: 'Admin',
    component: () => import('@/views/Admin.vue'),
    children: [
          { path: 'products', component: () => import('@/views/Products.vue') },
          { path: 'clients', component: () => import('@/views/Clients.vue')},
          { path: 'users', component: () => import('@/views/Users.vue') }
     ],
     meta: { requiresAuth: true }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  }

]

const router = new VueRouter({
  mode: 'history',
  routes
})

function tokenExpiredPolicies (expired) {
    if (expired !== undefined) {
        return expired > Math.floor(Date.now() / 1000)
    } else { return false }
}

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        let passport = JSON.parse(localStorage.getItem('commerce'))
        if (passport !== null && tokenExpiredPolicies(passport.expired)) {
            next()
        } else {
            localStorage.removeItem('commerce')
            router.replace({ name: 'Login' })
        }
    } else {
        next()
    }
    next()
})

export default router
