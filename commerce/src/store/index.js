import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const Users = {
    state: () => ({
        user: {
            name: '',
            email:''
        },
    }),
    mutations: {
        SET_USER (state, obj) {
            state.user = obj
        }
    },
    actions: {
        setUser ({ commit }, user) {
            commit('SET_USER', user)
        },

    },
    getters: {}
}

const Shop = {
    state: () => ({
        products: [],
    }),
    mutations: {
        SET_SHOP (state, obj) {
            const product = state.products.find(it => it.id === obj.id)
            if (product === undefined) {
                state.products.push({...obj})
            } else {
               obj.cant += product.cant
               state.products = state.products.filter(itm => itm.id !== obj.id)
               state.products.push({...obj})
            }
        }},
    actions: {
        setShop ({ commit }, product) {
            commit('SET_SHOP', product)
        }
    },
    getters: {
        cant: (state) => {
            return state.products.reduce((a,b) => {
                return a + b.cant
            },0)
        }
    }
}

export default new Vuex.Store({

  modules: {
     Users, Shop
  }
})
