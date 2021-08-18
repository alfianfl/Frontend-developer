import React from "react";
import { buyCake } from "../redux";
import { connect } from "react-redux";
function CakeContainer({ numbOfCake, buyCake }) {
  const [number, setNumber] = React.useState(1);
  return (
    <div>
      <h1>Number Of Cake - {numbOfCake}</h1>
      <input onChange={(e) => setNumber(e.target.value)} value={number} />
      <button onClick={() => buyCake(number)}>Buy Cake {number}</button>
    </div>
  );
}

// akses ke state
const mapStateToProps = (state) => {
  return {
    numbOfCake: state.cake.numberOfCake,
  };
};

// dispatch action
const mapDispatchToProps = (dispatch) => {
  return {
    buyCake: (number) => dispatch(buyCake(number)),
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(CakeContainer);
