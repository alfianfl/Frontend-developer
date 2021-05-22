
import './App.css';
import React, {useReducer} from 'react';
// contoh 1-3
import CounterOne from './components/contoh 1-3/CounterOne'
import CounterTwo from './components/contoh 1-3/CounterTwo'
import CounterThree from './components/contoh 1-3/CounterThree'
// contoh 4
import ComponentA from './components/ComponentA'
import ComponentB from './components/ComponentB'
import ComponentC from './components/ComponentC'
//contoh 5
import FetchDataUseState from './components/contoh 5/FetchDataUseState'
import FetchDataUseReducer from './components/contoh 5/FetchDataUseReducer'

// Pendukung untuk contoh 4 : jadi pada contoh 4 dipraktekan bagaimana mengimplementasikan useContext dan useReducer agar bisa dipakai secara global
export const CountContext = React.createContext()

const initialState = 0;
const reducer = (currentState, action) => {
    switch(action){
        case 'increment':
            return currentState + 1
        case 'decrement': 
            return currentState - 1
        case 'reset':
            return initialState
        default:
            return currentState
    }
}
function App() {
  const [count, dispatch] = useReducer(reducer,initialState)
  return (
    <div className="App">
      {/* contoh 1 simple action useReducer
      <h1>contoh 1 simple action useReducer </h1>
      <CounterOne/> */}

      {/* contoh 2 complex action useReducer
      <h1>contoh 2 complex action useReducer</h1>
      <CounterTwo/> */}

      {/* contoh 3 multiple useReducer
      <h1>contoh 3 multiple useReducer</h1>
      <CounterThree/> */}

      {/* contoh 4 implementasi useReducer dan useContext*/}
      {/* <h1>contoh 4 implementasi useReducer dan useContext</h1>
      <CountContext.Provider 
        value={{countState:count,countdispatch:dispatch}}
      >
        <ComponentA/>
        <ComponentB/>
        <ComponentC/>
      </CountContext.Provider> */}

      {/* contoh 5 fetch data dengan useState */}
      {/* <FetchDataUseState/> */}
      {/* contoh 6 fetch data dengan useReducer */}
      <FetchDataUseReducer/>
    </div>
  );
}

export default App;
