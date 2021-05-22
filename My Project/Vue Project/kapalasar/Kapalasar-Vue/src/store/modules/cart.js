const getListCarts = () => {
  try {
    const localData = JSON.parse(localStorage.getItem("listCarts"));
    if (localData) return localData;
    return [];
  } catch (err) {
    return [];
  }
};

export default {
  namespaced: true,
  state: {
    listCarts: getListCarts(),
    totalPrice: localStorage.getItem("totalPrice") || 0,
    tempCart: []
  },
  mutations: {
    ADD(state, item) {
      state.listCarts.push(item);

      localStorage.setItem("listCarts", JSON.stringify(state.listCarts));
    },
    REPLACE(state, newList) {
      state.listCarts = newList;

      localStorage.setItem("listCarts", JSON.stringify(state.listCarts));
    },
    SET_TOTAL_PRICE(state, price) {
      state.totalPrice = price;

      localStorage.setItem("totalPrice", state.totalPrice);
    },
    ADD_TEMP(state, item) {
      state.tempCart.push(item);
    },
    REPLACE_TEMP(state, newList) {
      state.tempCart = newList;
    }
  }
};
