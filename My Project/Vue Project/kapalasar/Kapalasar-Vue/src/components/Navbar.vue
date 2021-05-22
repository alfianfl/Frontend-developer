<template>
  <div class="navbar">
    <v-app-bar color="FAFAFA" flat max-height="120" height="120">
      <v-row justify="center">
        <v-col md="2" lg="3" to="/">
          <div>
            <router-link to="/">
              <v-img
                src="../assets/kapalasar-1024x250.png"
                max-width="180"
                class="mx-auto img-nav"
              ></v-img>
            </router-link>
          </div>
        </v-col>
        <v-col
          md="5"
          lg="6"
          class="text-center "
          v-if="$route.name == 'Homepage'"
        >
          <div class="align-center">
            <v-text-field
              outlined
              label="Search"
              single-line
              dense
              color="#a6cb26"
              hide-details="auto"
              width="570"
              append-icon="mdi-card-search"
              ma-1
            >
            </v-text-field>
          </div>
        </v-col>
        <v-col class="display-none" md="6" v-else></v-col>
        <v-col md="5" lg="3">
          <div v-if="isLoggedin">
            <v-menu offset-y>
              <template v-slot:activator="{ on, attrs }">
                <v-card
                  max-width="210"
                  class="mx-auto card-profile"
                  color="#A6CB26"
                  v-bind="attrs"
                  v-on="on"
                  dark
                >
                  <div class="name-profile">
                    <v-list-item-avatar
                      tile
                      size="35"
                      color="grey"
                      class="mx-2"
                    ></v-list-item-avatar>
                    <v-card-subtitle
                      class="d-inline name-size v-card-subtitle  px-1"
                      dark
                    >
                      <span>{{ nama }}</span></v-card-subtitle
                    >
                    <v-card-actions class="d-inline  pa-1">
                      <v-btn icon small>
                        <v-icon>
                          mdi-chevron-down
                        </v-icon>
                      </v-btn>
                    </v-card-actions>
                  </div>
                </v-card>
              </template>
              <v-list>
                <v-list-item
                  v-for="menu in menus"
                  :key="menu.title"
                  link
                  :to="menu.router"
                >
                  <v-list-item-icon>
                    <v-icon>{{ menu.icon }}</v-icon>
                  </v-list-item-icon>
                  <v-list-item-title>{{ menu.title }}</v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
          </div>
          <div v-else class="button text-center ma-1">
            <v-btn class="mr-2" outlined color="#A6CB26" pa-1 to="Signin"
              >Masuk</v-btn
            >
            <v-btn color="#A6CB26" dark depressed pa-1 to="Signup"
              >Daftar</v-btn
            >
          </div>
        </v-col>
      </v-row>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLoggedin: true,
      nama: "Naufal Bimantara",
      menus: [
        { icon: "mdi-account", title: "Account", router: "Account" },
        { icon: "mdi-logout", title: "Keluar" }
      ]
    };
  }
};
</script>

<style>
.mdi-card-search::before {
  color: #a6cb26;
}
@media only screen and (max-width: 700px) {
  .img-nav {
    width: 150px;
  }

  .name-profile {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }
  .display-none {
    display: none;
  }
}
@media only screen and (max-width: 966px) {
  .nav-search {
    width: 100px;
  }
}
</style>
