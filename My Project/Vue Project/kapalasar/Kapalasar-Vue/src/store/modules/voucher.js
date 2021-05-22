export default {
  namespaced: true,
  state: {
    voucher: {}
  },
  mutations: {
    ADD(state, voucher) {
      state.voucher = voucher;
    }
  }
};
