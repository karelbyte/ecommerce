<template>
    <div>
        <AppBar></AppBar>
        <Slides></Slides>
        <v-container>
            <v-row class="text-center">
                <v-col cols="4" v-for="item in products" :key="item">
                    <v-card
                        class="mx-auto"
                        max-width="400"
                        shaped
                    >
                        <v-img
                            class="white--text align-end"
                            height="200px"
                            src="https://laopinion.com/wp-content/uploads/sites/3/2019/01/shutterstock_1123734482.jpg?quality=80&strip=all&w=940"
                        >
                        </v-img>
                        <v-card-text class="text--primary">
                            <div>Precio</div>
                            <div>Nombre</div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                color="blue"
                                text
                            >
                                Comprar
                            </v-btn>

                            <v-btn
                                color="blue"
                                text
                            >
                                Detalles
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>

</template>

<script>
import AppBar from "../components/AppBar";
import Slides from "../components/Slides";
export default {
  name: 'Products',
  components :{
        AppBar, Slides
  },
  data () {
      return {
          products: [1,2,3,4]
      }
  }
}
</script>
