<template>
 <div>
     <AppBarAdmin></AppBarAdmin>
     <v-navigation-drawer
         app
         class="indigo darken-4"
         dark
     >
         <v-list>
             <v-list-item two-line>
                 <v-list-item-avatar>
                     <img :src="require('../assets/logo.png')" alt="Admin">
                 </v-list-item-avatar>
                 <v-list-item-content>
                     <v-list-item-title>{{user.name}}</v-list-item-title>
                     <v-list-item-subtitle>{{user.email}}</v-list-item-subtitle>
                 </v-list-item-content>
             </v-list-item>
             <v-divider></v-divider>
             <v-list-item-group color="primary">
                 <v-list-item @click="goUrl('/admin/products')">
                     <v-list-item-icon>
                         <v-icon>mdi-shopping</v-icon>
                     </v-list-item-icon>
                     <v-list-item-content>
                         <v-list-item-title>Products</v-list-item-title>
                     </v-list-item-content>
                 </v-list-item>
                 <v-list-item @click="goUrl('/admin/clients')">
                     <v-list-item-icon>
                         <v-icon>mdi-account-multiple</v-icon>
                     </v-list-item-icon>
                     <v-list-item-content>
                         <v-list-item-title>Clients</v-list-item-title>
                     </v-list-item-content>
                 </v-list-item>
                 <v-list-item @click="goUrl('/admin/users')">
                     <v-list-item-icon>
                         <v-icon>mdi-account-circle</v-icon>
                     </v-list-item-icon>
                     <v-list-item-content>
                         <v-list-item-title>Users</v-list-item-title>
                     </v-list-item-content>
                 </v-list-item>
             </v-list-item-group>
         </v-list>
     </v-navigation-drawer>
     <v-content>
         <v-container class="pa-4  fill-height" fluid>
             <v-row class="fill-height">
                  <router-view></router-view>
             </v-row>
         </v-container>
     </v-content>
</div>
</template>

<script>
    import AppBarAdmin from "../components/AppBarAdmin";
    import {urlCoreWeb} from "../tools";
    export default {
        name: 'Admin',
        components: {
            AppBarAdmin
        },
        data: () => ({
          drawer: true,
          user: {}
        }),
        methods: {
            goUrl(url) {
               this.$router.push({path: url})
            }
        },
        mounted() {
            this.axios.get(urlCoreWeb + 'api/user').then(res => {
                this.user = res.data
                this.$store.dispatch('setUser', res.data)
            }).catch((er) => {
                console.log(er)
            })
        }
    }
</script>
