<template>
  <v-app>
      <router-view></router-view>
  </v-app>
</template>

<script>

export default {
  name: 'App',
    created () {
        let passport =  JSON.parse(localStorage.getItem('commerce'))
        if (passport !== null && this.tokenExpiredPolicies(passport.expired)) {
            // CONFIGURACION DE LA LLAMADAS
            this.axios.interceptors.request.use((config) => {
                config.headers.Accept = 'application/json'
                config.headers.Authorization = 'Bearer ' + passport.token
                return config
            }, function (error) {
                return Promise.reject(error)
            })
        }
    },
    methods: {
        tokenExpiredPolicies (expired) {
            return expired > Math.floor(Date.now() / 1000)
        }
    }
};
</script>
