<template>
  <div class="product card">
    <v-card elevation="1" max-width="200" max-height="300">
      <v-img :src="product.image" height="150" max-width="200"></v-img>
      <v-card-title class="text-subtitle-2 font-weight-medium">{{
        product.productName
      }}</v-card-title>
      <v-card-subtitle class="text-caption pb-1">{{
        product.description
      }}</v-card-subtitle>
      <v-card-text class="pb-0">
        <div class="amber--text font-weight-medium">
          {{ parseRupiah(product.hargaBaru) }}
        </div>
        <div class="grey--text text-decoration-line-through text-caption">
          {{ parseRupiah(product.hargaCoret) }}
        </div>
      </v-card-text>
      <div class="px-4 pt-1 pb-4">
        <div
          v-if="getClickedBtn(product.id)"
          class="d-flex justify-center text-center"
        >
          <v-btn
            elevation="0"
            fab
            x-small
            dark
            color="#A6CB26"
            @click="minQty(product.id, product.hargaBaru)"
          >
            <v-icon>mdi-minus</v-icon>
          </v-btn>
          <div class="itemQty d-flex justify-center align-center">
            {{ getQtyById(product.id) }}
          </div>
          <v-btn
            elevation="0"
            fab
            x-small
            dark
            color="#A6CB26"
            @click="addQty(product.id, product.stock, product.hargaBaru)"
          >
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </div>
        <v-btn
          v-else
          small
          color="#A6CB26"
          dark
          block
          @click="showItemQty(product.id)"
          >Beli</v-btn
        >
      </div>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "ProductCard",
  props: ["product"],
  data() {
    return {
      // isBtnBeliClicked: false
    };
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    showItemQty(idx) {
      // this.isBtnBeliClicked = true;
      const item = {
        id: idx,
        qty: 1
      };
      // const newItem = JSON.parse(localStorage.getItem("cart"));
      // this.itemQty = newItem ? newItem : [];
      // this.itemQty.push(item);
      this.$store.commit("cart/ADD", item);
      // localStorage.setItem("cart", JSON.stringify(this.itemQty));

      // const state = this.$store.state.cart.listCarts;
      // console.log(`itemQty: ${JSON.stringify(state)}`);
      this.calculatePrice(this.product.hargaBaru);
    },
    addQty(idx, stock, harga) {
      const state = this.$store.state.cart.listCarts;
      state.forEach(item => {
        if (item.id == idx) {
          console.log(item);
          if (item.qty < stock) {
            const newQty = item.qty + 1;
            this.$set(item, "qty", newQty);
          }
        }
      });
      this.$store.commit("cart/REPLACE", state);
      this.calculatePrice(harga);
    },
    minQty(idx, harga) {
      let state = this.$store.state.cart.listCarts;
      state.forEach(item => {
        if (item.id == idx) {
          if (item.qty > 1) {
            const newQty = item.qty - 1;
            this.$set(item, "qty", newQty);
          } else {
            this.$set(item, "qty", 0);

            this.isBtnBeliClicked = false;
          }
        }
      });

      const existingItem = state.find(item => {
        return item.id == idx && item.qty == 0;
      });

      if (existingItem) {
        const newItemQty = state.filter(item => {
          return item.id !== idx;
        });
        state = newItemQty;
      }

      this.$store.commit("cart/REPLACE", state);
      this.calculatePrice(harga);
    },
    calculatePrice(harga) {
      let totalPrice = 0;
      const state = this.$store.state.cart.listCarts;
      state.forEach(item => {
        totalPrice += item.qty * harga;
      });

      this.$store.commit("cart/SET_TOTAL_PRICE", totalPrice);

      // console.log(`@price-itemQty: ${JSON.stringify(state)}`);
      // console.log(`total: ${totalPrice}`);

      this.$emit("getTotalPrice", this.$store.state.cart.totalPrice);
    },
    getQtyById(idx) {
      const state = this.$store.state.cart.listCarts;
      const item = state.find(item => {
        return item.id == idx;
      });
      if (item) return item.qty;
    },
    getClickedBtn(idx) {
      const state = this.$store.state.cart.listCarts;
      const item = state.find(item => {
        return item.id == idx;
      });
      return !!item;
    }
  }
};
</script>

<style scoped>
.itemQty {
  width: 45px;
}

@media only screen and (max-width: 400px) {
  .product.card {
    width: 96%;
  }
}
</style>
