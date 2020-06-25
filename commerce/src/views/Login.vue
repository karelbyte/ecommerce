<template>
            <v-container>
                <v-row class="d-flex justify-center">
                    <v-card
                        max-width="400"
                        class="mt-16"
                    >
                        <v-img
                            class="white--text align-end"
                            height="80px"
                            :src="require('../assets/logo.png')"
                        >
                        </v-img>

                        <v-card-subtitle class="pb-0">ECOMMERCE ADMIN </v-card-subtitle>
                        <v-col>
                            <v-form
                                ref="form"
                                v-model="valid"
                            >
                                <v-text-field
                                    v-model="user.username"
                                    :rules="emailRules"
                                    label="E-mail"
                                    required
                                ></v-text-field>
                                <v-text-field
                                    v-model="user.password"
                                    type="password"
                                    :rules="passwordRules"
                                    label="Password"
                                    required
                                ></v-text-field>
                                <v-btn
                                    :disabled="!valid"
                                    color="blue"
                                    @click="login"
                                >
                                    Login
                                </v-btn>
                            </v-form>
                        </v-col>
                    </v-card>
                </v-row>
            </v-container>
</template>
<script>
import {apiCoreKey, urlCoreWeb} from "../tools";

export default {
   name: "Login",
     data () {
       return  {
          valid: false,
          user: {
              username: 'admin@ecommerce.com',
              password: 'password'
          },
           passwordRules: [
               v => !!v || 'Password es requerido',
           ],
           email: '',
           emailRules: [
               v => !!v || 'E-mail es requerido',
               v => /.+@.+\..+/.test(v) || 'El email no es valido',
           ]
       }
   },
   methods: {
       login() {
           let data = {
               grant_type: 'password',
               client_id: 2,
               client_secret: apiCoreKey,
               username: this.user.username,
               password: this.user.password,
               scope: ''
           }
          this.axios.post(urlCoreWeb + 'oauth/token', data).then(res => {
               let passport = {
                   token: res.data.access_token,
                   expired: Math.floor(Date.now() / 1000) + res.data.expires_in
               }
               localStorage.setItem('commerce', JSON.stringify(passport))
               /* this.axios.get('/api/user').then( () => {
                   this.$router.replace({ name: 'Admin' })
               }).catch((er) => {
                   console.log(er)
               }) */
              this.$router.replace({ name: 'Admin' })
           }).catch(er => {
               console.log(er)
           })
       }
   }
 }
</script>
