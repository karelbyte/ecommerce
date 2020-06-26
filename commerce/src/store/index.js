import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    user: {
      name: '',
      email:''
    }
  },
  mutations: {
     SET_USER (state, obj) {
       state.user = obj
     }
  },
  actions: {
      setUser ({ commit }, user) {
          commit('SET_USER', user)
      }
  },
  modules: {
  }
})
