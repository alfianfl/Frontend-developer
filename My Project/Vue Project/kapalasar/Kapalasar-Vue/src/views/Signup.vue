<template>
  <div>
    <navbar />
    <div class="my-3">
      <v-container>
        <v-card>
          <v-img src="../assets/pasar.svg" height="100%" width="100%">
            <v-container fluid class="fill-height pa-0">
              <v-row class="fill-height">
                <v-col cols="5" class="bg-msg d-none d-md-block">
                  <v-container class="fill-height">
                    <div class="px-14">
                      <h4 class="text-h4 white--text ">
                        Memenuhi Kebutuhan Memasak Harianmu!
                      </h4>
                      <v-divider class="mt-2"></v-divider>
                      <p class="white--text text-body-1 mt-2">
                        Memberikan produk pilihan terbaik dan segar yang kami
                        ambil dari pasar tradisional. Pesan hari ini, besok pagi
                        kami antar langsung ke rumah.
                      </p>
                    </div>
                    <div class="d-flex align-self-end mx-auto py-3">
                      <v-img
                        src="../assets/kapalasar-1024x250.png"
                        max-width="200px"
                        class="mx-auto"
                      ></v-img>
                    </div>
                  </v-container>
                </v-col>
                <v-col cols="12" md="7" class="bg-form">
                  <v-container class="">
                    <div class="px-md-16 py-5">
                      <h3 class="title text-md-h3 text-h4 text-center">
                        Daftar Di Kapalasar
                      </h3>
                      <div class="pt-5">
                        <v-form>
                          <div>
                            <span class="label font-weight-medium"
                              >Nama Lengkap</span
                            >
                            <v-text-field
                              v-model="name"
                              :rules="[rules.required]"
                              placeholder="Nama Lengkap"
                              outlined
                              dense
                            ></v-text-field>
                            <span class="label font-weight-medium">Email</span>
                            <v-text-field
                              v-model="email"
                              :rules="[rules.required, rules.email]"
                              placeholder="Email"
                              outlined
                              dense
                            ></v-text-field>
                            <span class="label font-weight-medium"
                              >Nomor Telepon</span
                            >
                            <v-text-field
                              v-model="telepon"
                              :rules="[rules.required, rules.onlyNum]"
                              placeholder="Nomor Telepon"
                              outlined
                              dense
                            ></v-text-field>
                            <v-row>
                              <v-col class="">
                                <span class="label font-weight-medium"
                                  >Usia</span
                                >
                                <v-text-field
                                  v-model="usia"
                                  :rules="[rules.required, rules.onlyNum]"
                                  placeholder="Usia"
                                  outlined
                                  dense
                                ></v-text-field>
                              </v-col>
                              <v-col class="">
                                <span class="label font-weight-medium"
                                  >Pekerjaan</span
                                >
                                <v-text-field
                                  v-model="pekerjaan"
                                  :rules="[rules.required]"
                                  placeholder="Pekerjaan"
                                  outlined
                                  dense
                                ></v-text-field>
                              </v-col>
                            </v-row>
                            <span class="label font-weight-medium">Alamat</span>
                            <v-text-field
                              v-model="alamat"
                              :rules="[rules.required]"
                              placeholder="Alamat"
                              outlined
                              dense
                            ></v-text-field>
                            <v-row>
                              <v-col class="">
                                <span class="label font-weight-medium"
                                  >Kelurahan</span
                                >
                                <v-select
                                  :items="kelurahan"
                                  v-model="kelurahan"
                                  placeholder="Kelurahan"
                                  dense
                                  outlined
                                  menu-props="auto"
                                  :rules="[rules.required]"
                                ></v-select>
                              </v-col>
                              <v-col class="">
                                <span class="label font-weight-medium"
                                  >Kecamatan</span
                                >
                                <v-select
                                  :items="kecamatan"
                                  v-model="kecamatan"
                                  placeholder="Kecamatan"
                                  dense
                                  outlined
                                  menu-props="auto"
                                  :rules="[rules.required]"
                                ></v-select>
                              </v-col>
                            </v-row>
                            <span class="label font-weight-medium"
                              >Password</span
                            >
                            <v-text-field
                              v-model="password"
                              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                              :rules="[rules.required, rules.min]"
                              :type="show ? 'text' : 'password'"
                              hint="At least 8 characters"
                              @click:append="show = !show"
                              outlined
                              dense
                              placeholder="Password"
                            ></v-text-field>
                          </div>
                          <div class="pb-3 text-center">
                            <v-btn color="#a6cb26" dark>Daftar</v-btn>
                          </div>
                        </v-form>
                        <div class="d-flex justify-center">
                          <div>
                            Punya akun?
                            <router-link to="Signin">
                              <span class="label font-weight-medium"
                                >Masuk</span
                              >
                            </router-link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </v-container>
                </v-col>
              </v-row>
            </v-container>
          </v-img>
        </v-card>
      </v-container>
    </div>
    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar from "../components/Navbar.vue";

export default {
  components: { Navbar, Footer },
  data() {
    return {
      show: false,
      name: "",
      email: "",
      telepon: "",
      usia: "",
      pekerjaan: "",
      alamat: "",
      kelurahan: "",
      kecamatan: "",
      password: "",
      rules: {
        required: value => !!value || "Harus diisi",
        min: v => v.length >= 8 || "Minimal 8 karakter",
        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value) || "Penulisan email tidak sesuai";
        },
        onlyNum: value => {
          const pattern = /^[0-9]*$/;
          return pattern.test(value) || "Harus Angka";
        }
      }
    };
  }
};
</script>

<style scoped>
.title {
  color: #a6cb26;
}
.label {
  color: #a6cb26;
}
.v-text-field--outlined >>> fieldset {
  border-color: #a6cb26;
}
.bg-form {
  background: white;
}
.bg-msg {
  background: rgba(0, 0, 0, 0.7);
}
.v-divider {
  border-color: #a6cb26;
  border-width: 3px 0 0 0;
  max-width: 50%;
}
</style>
