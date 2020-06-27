<template>
    <div>
        <AppBar></AppBar>
        <Slides></Slides>
        <v-container>
            <v-row class="text-center">
                <v-col cols="3" v-for="item in products" :key="item.id">
                    <v-card
                        class="mx-auto"
                        max-width="300"
                        shaped
                    >
                        <v-img
                            class="white--text align-end"
                            :src="item.media"
                            width="300"
                        >
                        </v-img>
                        <v-divider></v-divider>
                        <v-card-text class="text--primary">
                            <div>{{item.price}}</div>
                            <div>{{item.name}}</div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                color="blue"
                                text
                                @click="setStok(item)"
                            >
                                Comprar
                            </v-btn>

                            <v-btn
                                color="blue"
                                text
                                @click="goProductDetail(item.name)"
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
import {urlCoreWeb} from "../tools";
export default {
  name: 'Products',
  components :{
        AppBar, Slides
  },
  data () {
      return {
          products: []
      }
  },
  mounted() {
      this.getProductList()
  },
  methods: {
      getProductList() {
          this.axios.get(urlCoreWeb + 'products').then(res => {
              this.products = res.data.data
          }).catch(err => {
              console.log(err)
          })
      },
      goProductDetail(product){
          this.$router.push({ name: 'Details', params: { product_name: product } })
      },
      setStok(item) {
          item.cant = 1
          this.$store.dispatch('setShop', item)
      }
  }
}
</script>
