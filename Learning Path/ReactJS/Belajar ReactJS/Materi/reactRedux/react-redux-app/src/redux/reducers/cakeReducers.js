const initialState = {
  numberOfCake: 10,
};

const cakeReducer = (state = initialState, action) => {
  switch (action.type) {
    case "BUY_CAKE":
      return {
        ...state,
        numberOfCake: state.numberOfCake - action.payload,
      };
    default:
      return state;
  }
};

export default cakeReducer;
