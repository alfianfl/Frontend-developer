import React from "react";
import { connect } from "react-redux";
import { buyIceCream } from "../redux/actions/iceCreamActions";
function IceCreamContainer({ numbOfIce, buyIce }) {
  return (
    <div>
      <h1>Number Of Ice - {numbOfIce} </h1>
      <button onClick={buyIce}>Buy Ice</button>
    </div>
  );
}

// akses ke state
const mapStateToProps = (state) => {
  return {
    numbOfIce: state.iceCream.numberOfIce,
  };
};

// dispatch action
const mapDispatchToProps = (dispatch) => {
  return {
    buyIce: () => dispatch(buyIceCream()),
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(IceCreamContainer);
