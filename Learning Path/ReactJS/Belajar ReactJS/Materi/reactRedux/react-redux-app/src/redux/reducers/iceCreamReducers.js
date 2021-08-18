const initialState = {
  numberOfIce: 20,
};

const iceCreamReducer = (state = initialState, action) => {
  switch (action.type) {
    case "BUY_ICECREAM":
      return {
        ...state,
        numberOfIce: state.numberOfIce - 1,
      };
    default:
      return state;
  }
};

export default iceCreamReducer;
