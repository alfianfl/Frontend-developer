<template>
  <div>
    <v-card class="ma-2">
      <v-row class="px-8 py-5">
        <div>
          <v-card-title class="font-weight-medium text-subtitle-1 pt-0">
            {{ `Transaction ${num + 1}` }}
          </v-card-title>
          <v-card-subtitle class="text-subtitle-2 py-0">
            {{ parseRupiah(transaction.totalPrice) }}
          </v-card-subtitle>
        </div>
        <v-spacer></v-spacer>
        <div class="d-flex align-center">
          <v-dialog v-model="dialog" max-width="800">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="#a6cb26" dark v-bind="attrs" v-on="on">
                Detail Transaksi
              </v-btn>
            </template>
            <v-card>
              <v-card color="#a6cb26" tile elevation="0">
                <v-container>
                  <span class="white--text text-h6 font-weight-medium">
                    Detail Transaksi
                  </span>
                </v-container>
              </v-card>
              <v-alert
                class="mx-16 mt-5"
                border="top"
                colored-border
                color="#F99F39"
                elevation="2"
              >
                <v-container>
                  <span
                    class="text-h6 font-weight-medium"
                    style="color: #54595f"
                    >Daftar Produk</span
                  >
                  <div>
                    <v-card
                      elevation="0"
                      tile
                      v-for="(item, i) in transaction.dataProduct"
                      :key="i"
                    >
                      <v-row class="mx-1 mt-5">
                        <div>
                          <v-img
                            height="80"
                            max-width="120"
                            src="../assets/sayuran.jpg"
                          ></v-img>
                        </div>
                        <div>
                          <v-card-title
                            class="font-weight-medium text-subtitle-1 pt-0"
                          >
                            {{ item.productName }}
                          </v-card-title>
                          <v-card-subtitle class="text-subtitle-2 py-0">
                            {{ item.description }}
                          </v-card-subtitle>
                          <v-card-subtitle class="text-subtitle-2 py-0">
                            {{ parseRupiah(item.hargaBaru) }}
                          </v-card-subtitle>
                        </div>
                        <v-spacer></v-spacer>
                        <div>{{ item.qty }}</div>
                      </v-row>
                    </v-card>
                  </div>
                </v-container>
              </v-alert>
              <v-alert
                class="mx-16 mt-5"
                border="top"
                colored-border
                color="#F99F39"
                elevation="2"
              >
                <v-container>
                  <span
                    class="label text-h6 font-weight-medium"
                    style="color: #54595f"
                    >Informasi Pembeli</span
                  >
                  <div class="mt-2">
                    <div>
                      <div class="label font-weight-regular">Nama</div>
                      <div>
                        <v-divider></v-divider>
                      </div>
                    </div>
                    <div class="mt-md-3 mt-1 text-subtitle-1">
                      {{ userData.nama }}
                    </div>
                    <div class="mt-md-4 mt-2">
                      <div class="label font-weight-regular">
                        Nomor Telepon
                      </div>
                      <div>
                        <v-divider></v-divider>
                      </div>
                    </div>
                    <div class="mt-md-3 mt-1 text-subtitle-1">
                      {{ userData.Telepon }}
                    </div>
                    <div class="mt-md-4 mt-2">
                      <div class="label font-weight-regular">Alamat</div>
                      <div>
                        <v-divider></v-divider>
                      </div>
                    </div>
                    <div class="mt-md-3 mt-1 text-subtitle-1">
                      {{ userData.alamat }}
                    </div>
                  </div>
                </v-container>
              </v-alert>
              <div class="text-center pa-3" @click="dialog = false">
                <v-btn color="#a6cb26" dark>Close</v-btn>
              </div>
            </v-card>
          </v-dialog>
        </div>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  props: ["transaction", "num"],
  data() {
    return {
      dialog: false,
      userData: {}
    };
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    getUserData() {
      this.userData = this.$store.state.user.userInfo;
    }
  },
  mounted() {
    this.getUserData();
  }
};
</script>

<style scoped>
.title {
  background-color: #a6cb26;
}
</style>
