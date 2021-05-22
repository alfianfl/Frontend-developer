export default {
  namespaced: true,
  state: {
    listSuccessTransactions: [],
    totalPrice: 0
  },
  mutations: {
    ADD(state, transaction) {
      state.listSuccessTransactions.push(transaction);
    },
    SET_TOTAL_PRICE(state, price) {
      state.totalPrice = price;
    }
  }
};
