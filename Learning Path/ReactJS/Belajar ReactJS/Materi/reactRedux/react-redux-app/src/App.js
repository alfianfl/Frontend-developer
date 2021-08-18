import { Provider } from "react-redux";
import store from "./redux/store";

import CakeContainer from "./components/CakeContainer";
import HookCakeContainer from "./components/HookCakeContainer";
import IceCreamContainer from "./components/IceCreamContainer";
import ItemContainer from "./components/ItemContainer";
import UsersContainer from "./components/UsersContainer";

function App() {
  return (
    <Provider store={store}>
      <ItemContainer cake /> {/* "cake" sebagai ownProps */}
      <CakeContainer />
      <HookCakeContainer />
      <IceCreamContainer />
      <h1>User Container</h1>
      <UsersContainer />
    </Provider>
  );
}

export default App;
