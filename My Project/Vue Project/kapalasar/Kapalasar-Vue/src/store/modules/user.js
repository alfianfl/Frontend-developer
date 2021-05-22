export default {
  namespaced: true,
  state: {
    userInfo: {}
  },
  mutations: {
    ADD(state, info) {
      state.userInfo = info;
    }
  }
};
