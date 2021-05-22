<template>
  <div>
    <v-card elevation="0">
      <v-row class="mt-3">
        <div>
          <v-card-title class="title font-weight-medium text-subtitle-1 pa-1">
            {{ listCart.productName }}
          </v-card-title>
          <v-card-subtitle class="black--text text-subtitle-2 py-2 px-1">
            {{ parseRupiah(listCart.hargaBaru) }}
          </v-card-subtitle>
        </div>
        <v-spacer></v-spacer>
        <div class="d-flex justify-center text-center align-center mr-3">
          <v-btn
            elevation="0"
            fab
            x-small
            color="#A6CB26"
            :disabled="disabledMin"
            @click="minQty(listCart.id, listCart.hargaBaru)"
          >
            <v-icon color="white">mdi-minus</v-icon>
          </v-btn>
          <div class="itemQty d-flex justify-center align-center">
            {{ getQtyById(listCart.id) }}
          </div>
          <v-btn
            elevation="0"
            fab
            x-small
            color="#A6CB26"
            :disabled="disabledPlus"
            @click="addQty(listCart.id, 10, listCart.hargaBaru)"
          >
            <v-icon color="white">mdi-plus</v-icon>
          </v-btn>
        </div>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  props: ["listCart"],
  data() {
    return {
      checkedVal: "",
      disabledMin: false,
      disablePlus: false
    };
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    addQty(idx, stock, harga) {
      const state = this.$store.state.cart.listCarts;
      state.forEach(item => {
        if (item.id == idx) {
          console.log(item);
          if (item.qty < stock) {
            const newQty = item.qty + 1;
            this.$set(item, "qty", newQty);
            this.disabledMin = false;
          } else {
            this.DisablePlus = true;
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
            // this.$set(item, "qty", 0);
            this.disabledMin = true;
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

      const voucher = this.$store.state.voucher.voucher;
      if (Object.keys(voucher).length) {
        totalPrice -= voucher.disc;
      }

      this.$store.commit("cart/SET_TOTAL_PRICE", totalPrice);

      this.$emit("getTotalPrice", this.$store.state.cart.totalPrice);
    },
    getQtyById(idx) {
      const state = this.$store.state.cart.listCarts;
      const item = state.find(item => {
        return item.id == idx;
      });
      if (item) return item.qty;
    }
  }
};
</script>

<style scoped>
.itemQty {
  width: 45px;
}
.title {
  color: #54595f;
}
</style>
