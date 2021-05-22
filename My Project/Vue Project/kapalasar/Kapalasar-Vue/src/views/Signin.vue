<template>
  <div>
    <navbar />
    <div class="my-3">
      <v-container>
        <v-card>
          <v-img src="../assets/pasar.svg" max-height="721" width="100%">
            <v-container fluid class="fill-height pa-0">
              <v-row class="fill-height">
                <v-col cols="12" md="7" class="bg-form">
                  <v-container class="py-md-16">
                    <div class="pa-md-16 py-5">
                      <h3 class="title text-md-h3 text-h4 text-center">
                        Masuk ke akunmu
                      </h3>
                      <div class="pt-md-16 pt-8 px-md-16 px-10">
                        <v-form>
                          <div>
                            <span class="label font-weight-medium">Email</span>
                            <v-text-field
                              v-model="email"
                              :rules="[rules.required, rules.email]"
                              placeholder="Email"
                              outlined
                              dense
                            ></v-text-field>
                          </div>
                          <div>
                            <span class="label font-weight-medium"
                              >Password</span
                            >
                            <v-text-field
                              v-model="password"
                              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                              :rules="[rules.required, rules.min]"
                              :type="show ? 'text' : 'password'"
                              name="input-10-1"
                              hint="At least 8 characters"
                              @click:append="show = !show"
                              outlined
                              dense
                              placeholder="Password"
                            ></v-text-field>
                          </div>
                          <div class="font-weight-medium grey--text">
                            Lupa Password?
                          </div>
                          <div class="pt-5 text-center">
                            <v-btn color="#a6cb26" dark>Masuk</v-btn>
                          </div>
                        </v-form>
                        <div class="pt-5 d-flex justify-center ">
                          <div>
                            Tidak punya akun?
                            <router-link to="Signup">
                              <span class="label font-weight-medium"
                                >Daftar</span
                              >
                            </router-link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </v-container>
                </v-col>
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
      email: "",
      password: "",
      rules: {
        required: value => !!value || "Required.",
        min: v => v.length >= 8 || "Min 8 characters",
        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value) || "Invalid e-mail.";
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
