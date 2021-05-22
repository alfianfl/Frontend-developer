<template>
  <div>
    <v-card elevation="0" tile>
      <v-row class="mx-1 mt-5">
        <div>
          <v-img height="80" max-width="120" :src="listFinalCart.image"></v-img>
        </div>
        <div>
          <v-card-title class="font-weight-medium text-subtitle-1 pt-0">
            {{ listFinalCart.productName }}
          </v-card-title>
          <v-card-subtitle class="text-subtitle-2 py-0">
            {{ listFinalCart.description }}
          </v-card-subtitle>
          <v-card-subtitle class="text-subtitle-2 py-0">
            {{ parseRupiah(listFinalCart.hargaBaru) }}
          </v-card-subtitle>
        </div>
        <v-spacer></v-spacer>
        <div>{{ listFinalCart.qty }}</div>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  props: ["listFinalCart"],
  data() {
    return {};
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    }
  }
};
</script>

<style></style>
