import React from "react";
import { buyCake } from "../redux";
import { connect } from "react-redux";
import { buyIceCream } from "../redux/actions/iceCreamActions";
function CakeContainer({ item, itemBuy }) {
  const [number, setNumber] = React.useState(1);
  return (
    <div>
      <h1>Item - {item}</h1>
      <input onChange={(e) => setNumber(e.target.value)} value={number} />
      <button onClick={() => itemBuy(number)}>Buy Cake {number}</button>
    </div>
  );
}

// akses ke state
const mapStateToProps = (state, ownProps) => {
  // ownProps.cake = "cake" diambil dari props yang dikirim di app
  const itemState = ownProps.cake
    ? state.cake.numberOfCake
    : state.iceCream.numberOfIce;
  return {
    item: itemState,
  };
};

// dispatch action
const mapDispatchToProps = (dispatch, ownProps) => {
  const itemDispatch = ownProps.cake
    ? (number) => dispatch(buyCake(number))
    : (number) => dispatch(buyIceCream(number));
  return {
    itemBuy: itemDispatch,
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(CakeContainer);
