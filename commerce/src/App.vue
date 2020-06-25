<template>
  <v-app>
    <v-app-bar
      app
      color="blue lighten-4"
    >
        <v-img
            alt="Vuetify Logo"
            class="shrink mr-2"
            contain
            :src="require('./assets/logo.png')"
            transition="scale-transition"
            width="40"
        />
        <span>Vuetify e-commerce</span>
        <v-spacer></v-spacer>
        <v-btn color="black" text class="mr-16">
           Catalogo
        </v-btn>

        <v-btn icon color="black">
            <v-icon>fab fa-shopify</v-icon>
        </v-btn>
    </v-app-bar>

    <v-main>
        <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',
  data: () => ({
    //
  }),
};
</script>
