  
import React from 'react'
import './App.css'
import ParentComponent from './components/ParentComponent'
import Counter from './components/Counter'
import FocusInput from './components/FocusInput'
import HookTimer from './components/HookTimer'

function App() {
	return (
		<div className="App">
			{/* useCallback */}
			<h1>useCallback</h1>
			<ParentComponent />

			{/* useMemo */}
			<h1>useMemo</h1>
			{/* <Counter/> */}

			{/* useRef */}
			<h1>useRef</h1>
			<FocusInput />

			{/* useRef Contoh 2 */}
			<h1>useRef Contoh 2</h1>
			<HookTimer/>
		</div>
	)
}

export default App