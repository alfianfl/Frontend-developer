import React,{useReducer} from 'react'

const initialState = {
    firstCount: 0,
};
const reducer = (currentState, action) => {
    switch(action.type){
        case 'increment':
            return {firstCount: currentState.firstCount + action.value}
        case 'decrement': 
            return {firstCount: currentState.firstCount -action.value}
        case 'reset':
            return initialState
        default:
            return currentState
    }
}

function CounterThree() {
    
    const [count, dispatch] = useReducer(reducer,initialState)
    const [countTwo, dispatchTwo] = useReducer(reducer,initialState)
    return (
        <div>
            <div>Count1 : {count.firstCount}</div>
            {/* first Counter */}
            <button onClick={() => dispatch({type:'increment',value:5})}>Increment1 + 5</button>
            <button onClick={() => dispatch({type:'decrement',value:5})}>Decrement1 + 5</button>
            <button onClick={() => dispatch({type:'increment',value:1})}>Increment1 + 1</button>
            <button onClick={() => dispatch({type:'decrement',value:1})}>Decrement1 + 1</button>
            <button onClick={() => dispatch({type:'reset'})}>Reset</button>
            {/* Second Counter */}
            <div>Count2 : {countTwo.firstCount}</div>
            <div>
                <button onClick={() => dispatchTwo({type:'increment',value:5})}>Increment2 + 5</button>
                <button onClick={() => dispatchTwo({type:'decrement',value:5})}>Decrement2 + 5</button>
                <button onClick={() => dispatchTwo({type:'increment',value:1})}>Increment2 + 1</button>
                <button onClick={() => dispatchTwo({type:'decrement',value:1})}>Decrement2 + 1</button>
                <button onClick={() => dispatchTwo({type:'reset'})}>Reset</button>
            </div>
            
        </div>
    )
}

export default CounterThree
