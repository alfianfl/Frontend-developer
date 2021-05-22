<template>
  <div>
    <Navbar />
    <div>
      <v-container>
        <v-card color="#a6cb26">
          <v-container>
            <span class="white--text text-h6 font-weight-medium"
              >Kantong Belanja</span
            >
          </v-container>
        </v-card>
        <!-- Form Data User -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
          v-if="!isLoggedin"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Informasi Pembeli</span
            >
            <div class="mx-md-16 mt-md-10 mt-2">
              <v-form>
                <div>
                  <span class="label font-weight-bold">Nama</span>
                  <v-text-field
                    placeholder="Masukan Nama Anda"
                    single-line
                    outlined
                    dense
                    v-model="nama"
                  ></v-text-field>
                </div>
                <div>
                  <span class="label font-weight-bold">Nomor Telepon</span>
                  <v-text-field
                    placeholder="Masukan Nomor Telepon Anda"
                    outlined
                    single-line
                    dense
                    v-model="telepon"
                  ></v-text-field>
                </div>
                <div>
                  <span class="label font-weight-bold">Alamat Pengiriman</span>
                  <v-textarea
                    placeholder="Masukan Alamat Anda"
                    outlined
                    rows="2"
                    auto-grow
                    v-model="alamat"
                  ></v-textarea>
                </div>
              </v-form>
            </div>
          </v-container>
        </v-alert>
        <!-- Data User (Logged In) -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
          v-else
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Informasi Pembeli</span
            >
            <div class="mx-md-16 mt-md-10 mt-2">
              <div>
                <div class="label font-weight-regular">Nama</div>
                <div>
                  <v-divider></v-divider>
                </div>
              </div>
              <div class="mt-md-3 mt-1 text-subtitle-1">
                {{ user.name }}
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
                {{ user.telepon }}
              </div>
              <div class="mt-md-4 mt-2">
                <div class="label font-weight-regular">Alamat</div>
                <div>
                  <v-divider></v-divider>
                </div>
              </div>
              <div class="mt-md-3 mt-1 text-subtitle-1">
                {{ user.alamat }}
              </div>
            </div>
          </v-container>
        </v-alert>
        <!-- Voucher -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Voucher</span
            >
            <v-row class="pt-3" v-if="!Object.keys(voucherInUse).length">
              <v-col cols="8" md="6">
                <v-text-field
                  placeholder="Kode Voucher"
                  outlined
                  single-line
                  dense
                  v-model="voucher"
                ></v-text-field>
              </v-col>
              <v-col cols="4" md="6">
                <v-btn color="#a6cb26" dark @click="cekVoucher">
                  Pakai
                </v-btn>
              </v-col>
            </v-row>
            <v-row v-else>
              <v-col cols="12" md="6" class="mt-5">
                <v-sheet color="white" elevation="1" rounded>
                  <v-row align="center" justify="center">
                    <v-col cols="2">
                      <v-icon class="ml-5" color="#a6cb26">
                        mdi-sale
                      </v-icon>
                    </v-col>
                    <v-col cols="8" class="text-body2 font-weight-medium">
                      <div>
                        Anda Mendapat Potongan Sebesar
                        <span class="mr-2">{{
                          parseRupiah(voucherInUse.disc)
                        }}</span>
                      </div>
                      <div class="text-caption">
                        Voucher " <span>{{ voucherInUse.name }}</span> " aktif
                      </div>
                    </v-col>
                    <v-col cols="2 px-0 px-md-8">
                      <v-btn depressed fab small @click="cancelVoucher">
                        <v-icon color="#54595f">
                          mdi-close
                        </v-icon>
                      </v-btn>
                    </v-col>
                  </v-row>
                </v-sheet>
              </v-col>
            </v-row>
          </v-container>
        </v-alert>
        <!-- List Cart -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Produk</span
            >
            <div class="mx-md-16">
              <div>
                <v-row>
                  <v-col cols="2" md="1">
                    <v-checkbox
                      color="#a6cb26"
                      v-model="selectAll"
                    ></v-checkbox>
                  </v-col>
                  <v-col>
                    <div>
                      <v-row class="mt-5">
                        <span class="label font-weight-medium pl-1">
                          Pilih Semua Produk</span
                        >
                      </v-row>
                    </div>
                  </v-col>
                </v-row>
              </div>
              <div v-for="(product, i) in listCart" :key="i">
                <v-row>
                  <v-col cols="2" md="1">
                    <v-checkbox
                      v-model="checkedVal"
                      color="#a6cb26"
                      :value="product.id"
                      @change="getCheckedValue()"
                    ></v-checkbox>
                  </v-col>
                  <v-col>
                    <product-cart-list
                      @getTotalPrice="getTotalPrice(product.id)"
                      :listCart="product"
                    />
                  </v-col>
                </v-row>
                <v-divider class="mt-3"></v-divider>
              </div>
            </div>
            <div class="mt-6 mx-md-16">
              <v-row class="mx-1" v-if="Object.keys(voucherInUse).length">
                <div class="label text-subtitle-1">Potongan Harga</div>
                <v-spacer></v-spacer>
                <div class="totalPrice text-subtitle-1">
                  {{ parseRupiah(voucherInUse.disc) }}
                </div>
              </v-row>
              <v-row class="mx-1">
                <div class="label text-h6">Total Belanja</div>
                <v-spacer></v-spacer>
                <div class="totalPrice text-h6">
                  {{ parseRupiah(totalPrice) }}
                </div>
              </v-row>
            </div>
          </v-container>
        </v-alert>
        <div class="text-center">
          <v-btn color="#a6cb26" dark @click="addBuyerInfo">
            Lanjut Pembayaran
          </v-btn>
        </div>
      </v-container>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import ProductCartList from "../components/productCartList";
import { products, vouchers, user } from "../dummyData/dummy.js";

export default {
  components: {
    Navbar,
    Footer,
    ProductCartList
  },
  data() {
    return {
      products,
      vouchers,
      user,
      isLoggedin: true,
      voucher: "",
      voucherInUse: {},
      nama: "",
      telepon: "",
      alamat: "",
      checkedVal: [],
      listCart: [],
      fixedListCart: [],
      totalPrice: 0
    };
  },
  computed: {
    selectAll: {
      get() {
        return this.listCart
          ? this.checkedVal.length == this.listCart.length
          : false;
      },
      set(value) {
        let selected = [];

        if (value) {
          this.listCart.forEach(cart => {
            selected.push(cart.id);
          });
        }

        this.checkedVal = selected;
      }
    }
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    },
    addBuyerInfo() {
      if (!this.isLoggedin) {
        const data = {
          nama: this.nama,
          telepon: this.telepon,
          alamat: this.alamat
        };
        this.$store.commit("user/ADD", data);
        console.log(this.$store.state.user.userInfo);

        this.$router.push("/payment");
      } else {
        const data = {
          nama: user.name,
          telepon: user.telepon,
          alamat: user.alamat
        };
        this.$store.commit("user/ADD", data);
        console.log(this.$store.state.user.userInfo);

        this.$router.push("/payment");
      }
    },
    getProductList() {
      const state = this.$store.state.cart.listCarts;
      products.forEach(product => {
        state.forEach(item => {
          if (item.id == product.id) {
            const cart = {
              qty: item.qty,
              ...product
            };
            this.listCart.push(cart);
          }
        });
      });
    },
    getTotalPrice(id) {
      if (this.checkedVal.includes(id))
        this.totalPrice = this.$store.state.cart.totalPrice;
    },
    getCheckedValue() {
      this.$store.commit("cart/REPLACE_TEMP", this.checkedVal);

      this.changeListCartState();
    },
    changeListCartState() {
      const temp = this.$store.state.cart.tempCart;

      const state = this.$store.state.cart.listCarts;

      let newFullList = products.filter(item => {
        return temp.includes(item.id);
      });

      this.fixedListCart = newFullList.map((item, index) => {
        return {
          qty: state[index].qty,
          ...item
        };
      });

      let totalPrice = 0;

      this.fixedListCart.forEach(item => {
        totalPrice += item.qty * item.hargaBaru;
      });

      this.$store.commit("cart/SET_TOTAL_PRICE", totalPrice);

      this.totalPrice = this.$store.state.cart.totalPrice;
      this.useVoucher();
    },
    cekVoucher() {
      vouchers.forEach(voucher => {
        if (voucher.name == this.voucher) {
          const useVoucher = {
            name: this.voucher,
            disc: voucher.discount
          };
          this.voucherInUse = useVoucher;
          this.$store.commit("voucher/ADD", this.voucherInUse);
          this.useVoucher();
        } else {
          console.log("voucher tidak ada");
        }
      });
    },
    useVoucher() {
      const voucher = this.$store.state.voucher.voucher;
      if (Object.keys(voucher).length) {
        this.totalPrice -= voucher.disc;
        this.$store.commit("cart/SET_TOTAL_PRICE", this.totalPrice);
        this.totalPrice = this.$store.state.cart.totalPrice;
      }
    },
    cancelVoucher() {
      const voucher = this.$store.state.voucher.voucher;
      this.totalPrice += voucher.disc;
      this.$store.commit("cart/SET_TOTAL_PRICE", this.totalPrice);

      this.voucherInUse = {};
      this.$store.commit("voucher/ADD", this.voucherInUse);
    }
  },
  mounted() {
    this.scrollToTop();
    this.getProductList();
  },
  watch: {
    checkedVal() {
      this.getCheckedValue();
    }
  }
};

Navbar;
</script>

<style scoped>
.label {
  color: #54595f;
}
.totalPrice {
  color: #f99f39;
}
</style>
