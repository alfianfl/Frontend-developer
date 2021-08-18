
import './App.css';
import React from 'react'
import ComponentC from './components/ComponentC'

export const UserContext = React.createContext();
export const ChannelContext = React.createContext();
function App() {

  return (
    <div className="App">
      <UserContext.Provider value={'Alfian'} >
        <ChannelContext.Provider value={'React'}>
          <ComponentC/>
        </ChannelContext.Provider>
      </UserContext.Provider>
      
    </div>
  );
}

export default App;
