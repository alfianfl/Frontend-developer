import { combineReducers } from "redux";
import cakeReducer from "./cakeReducers";
import iceCreamReducer from "./iceCreamReducers";
import userReducer from "./userReducers";

const rootReducer = combineReducers({
  iceCream: iceCreamReducer,
  cake: cakeReducer,
  user: userReducer,
});

export default rootReducer;
