import './App.css';
import CountOne from './components/CountOne'
import CountTwo from './components/CountTwo'
import Counter3 from './components/Counter3'
import Counter4 from './components/Counter4'

function App() {
  return (
    <div className="App">
      {/* useCostum exam 1*/}

      <h1>useCostum</h1>
      <CountOne/>
      <CountTwo/>

      {/* useCostum exam 2*/}

      <h1>useCostum 2</h1>
      <Counter3/>
      <Counter4/>
    </div>
  );
}

export default App;
