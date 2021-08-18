import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { buyCake } from "../redux";

function HookCakeContainer() {
  const numberOfCake = useSelector((state) => state.cake.numberOfCake);
  const dispatch = useDispatch();
  return (
    <div>
      <h1>Number Of Cake by hook - {numberOfCake} </h1>
      <button onClick={() => dispatch(buyCake())}>Buy Cake</button>
    </div>
  );
}

export default HookCakeContainer;
