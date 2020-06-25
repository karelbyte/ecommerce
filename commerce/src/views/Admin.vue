<template>
 <v-container class="fill-height">
 <AppBarAdmin></AppBarAdmin>
            <v-row
                align="center"
                justify="center"

            >
                <router-view></router-view>
            </v-row>
            <v-navigation-drawer
                v-model="drawer"
                absolute
            >
                <v-divider></v-divider>
                <v-list>
                    <v-list-item-group color="primary">
                        <v-list-item @click="goUrl('/admin/products')">
                            <v-list-item-icon>
                                <v-icon>mdi-shopping</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Productos</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item @click="goUrl('/admin/clients')">
                            <v-list-item-icon>
                                <v-icon>mdi-account-multiple</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Clientes</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item @click="goUrl('/admin/users')">
                            <v-list-item-icon>
                                <v-icon>mdi-account-circle</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Usuarios</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </v-navigation-drawer>
        </v-container>
</template>

<script>
    import AppBarAdmin from "../components/AppBarAdmin";
    export default {
        name: 'Admin',
        components: {
            AppBarAdmin
        },
        data: () => ({
          drawer: true
        }),
        methods: {
            goUrl(url) {
                this.$router.push({path: url})
            }
        }
    }
</script>
