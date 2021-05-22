<template>
  <div class="home">
    <navbar />
    <v-container class="mt-5">
      <div class="img-thumbnail">
        <img
          src="https://media.istockphoto.com/photos/collage-of-healthy-fresh-fruits-and-vegetables-picture-id1222004542"
        />
      </div>
    </v-container>
    <!-- Flashsale -->
    <div>
      <v-container>
        <div class="d-flex flex-wrap justify-center">
          <v-btn
            v-for="(filter, i) in filters"
            :key="i"
            x-large
            :large="$vuetify.breakpoint.sm ? true : false"
            class="mr-2 px-1 my-2"
            @click="filterByKategori(filter.name)"
            :color="filter.name == current ? '#a6cb26' : ''"
            :dark="filter.name == current ? true : false"
          >
            <v-img :src="filter.src"></v-img>
            <span class="mx-2">{{ filter.name }}</span>
          </v-btn>
        </div>
      </v-container>
    </div>
    <!-- Product -->
    <v-lazy>
      <v-container>
        <v-row justify="center">
          <v-col
            cols="6"
            md="2"
            v-for="(product, i) in filteredProducts"
            :key="i"
            class="ma-md-2 v-lazy  my-3"
          >
            <v-row justify="center">
              <product-card @getTotalPrice="getTotalPrice" :product="product" />
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-lazy>
    <!-- Compliance Cookie GDPR edited by Fauzi -->
    <client-only>
      <cookie />
    </client-only>
    <!-- End of Compliance Cookie GDPR edited by Fauzi -->
    <Footer />
    <div v-if="showCart" class="cart" style="z-index:999">
      <v-container>
        <v-row class="pa-3">
          <div>
            <div class="font-weight-medium">Total Harga</div>
            <div class="totalHarga font-weight-medium text-h5 align-center">
              {{ parseRupiah(totalPrice) }}
            </div>
          </div>
          <v-spacer></v-spacer>
          <div class="d-flex align-center">
            <v-btn to="/checkout" class="checkout" color="#A6CB26"
              >Checkout</v-btn
            >
          </div>
        </v-row>
      </v-container>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Navbar from "../components/Navbar.vue";
import ProductCard from "../components/ProductCard.vue";
import Footer from "../components/Footer.vue";
import { products, filters, slides } from "../dummyData/dummy.js";
import cookie from "../components/cookie";
export default {
  name: "Home",
  components: {
    Navbar,
    ProductCard,
    Footer,
    cookie
  },
  data() {
    return {
      optionsCarousel: {
        type: "slide",
        rewind: true,
        width: "100%",
        fixedHeight: this.$vuetify.breakpoint.xs ? 200 : 300,
        perPage: 1,
        gap: "1rem",
        autoplay: true,
        padding: {
          right: this.$vuetify.breakpoint.xs ? "" : "20rem",
          left: this.$vuetify.breakpoint.xs ? "" : "20rem"
        },
        cover: true,
        start: 2,
        autoWidth: true,
        heightRatio: 0.3
      },
      optionsFlashsale: {
        width: "90%",
        gap: "1rem",
        height: 300,
        perPage: this.$vuetify.breakpoint.xs ? 1 : 4,
        perMove: 1,
        pagination: false,
        autoWidth: true,
        heightRatio: 0.3
      },
      slides,
      filters,
      products,
      totalPrice: 0,
      showCart: false,
      notFlashsaleProducts: [],
      flashSaleProducts: [],
      filteredProducts: [],
      current: "semua"
    };
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    changeShowCart() {
      const price = this.$store.state.cart.totalPrice;
      if (price != 0) {
        this.totalPrice = price;
        this.showCart = true;
      } else {
        this.showCart = false;
      }
    },
    getTotalPrice(totalHarga) {
      this.totalPrice = totalHarga;
      if (this.totalPrice !== 0) {
        this.showCart = true;
      } else {
        this.showCart = false;
      }
    },
    filterFlashSale() {
      this.flashSaleProducts = products.filter(product => product.flashSale);
    },
    filterNotFlashSale() {
      this.notFlashsaleProducts = products.filter(
        product => !product.flashSale
      );
      this.filteredProducts = this.notFlashsaleProducts;
    },
    filterByKategori(by) {
      this.current = by;
      if (this.current === "sayur") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.kategori === "sayuran"
        );
      } else if (this.current === "buah") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.kategori === "buah"
        );
      } else if (this.current === "daging") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.kategori === "daging"
        );
      } else if (this.current === "bumbu") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.kategori === "bumbu"
        );
      } else if (this.current === "promo") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.hargaCoret
        );
      } else {
        this.filteredProducts = this.notFlashsaleProducts;
      }
    }
  },
  created() {
    this.filterFlashSale();
    this.filterNotFlashSale();
  },
  mounted() {
    this.changeShowCart();
  }
};
</script>

<style scoped>
.carousel {
  background: #a6cb26;
  padding: 1.25rem 0;
}
.flashSale {
  margin-top: 0.625rem;
  padding: 0.625rem 0;
  background: #f99f39;
}
.totalHarga {
  color: #f99f39;
}
.checkout {
  color: white;
}
.cart {
  background-color: white;
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}
.img-thumbnail {
  width: 100%;
  cursor: pointer;
}
.img-thumbnail img {
  width: 100%;
  max-height: 256px;
}
</style>
