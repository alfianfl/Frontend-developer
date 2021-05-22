import React,{useReducer} from 'react'

const initialState = {
    firstCount: 0,
    secondCount: 10
};
const reducer = (currentState, action) => {
    switch(action.type){
        case 'increment1':
            return {...currentState,firstCount: currentState.firstCount + action.value}
        case 'decrement1': 
            return {...currentState,firstCount: currentState.firstCount -action.value}
        case 'increment2':
            return {...currentState,secondCount: currentState.secondCount + action.value}
        case 'decrement2': 
            return {...currentState,secondCount: currentState.secondCount -action.value}
        case 'reset':
            return initialState
        default:
            return currentState
    }
}

function CounterTwo() {
    
    const [count, dispatch] = useReducer(reducer,initialState)
    return (
        <div>
            <div>Count1 : {count.firstCount}</div>
            {/* first Counter */}
            <button onClick={() => dispatch({type:'increment1',value:5})}>Increment1 + 5</button>
            <button onClick={() => dispatch({type:'decrement1',value:5})}>Decrement1 + 5</button>
            <button onClick={() => dispatch({type:'increment1',value:1})}>Increment1 + 1</button>
            <button onClick={() => dispatch({type:'decrement1',value:1})}>Decrement1 + 1</button>

            {/* Second Counter */}
            <div>Count2 : {count.secondCount}</div>
            <div>
                <button onClick={() => dispatch({type:'increment2',value:5})}>Increment2 + 5</button>
                <button onClick={() => dispatch({type:'decrement2',value:5})}>Decrement2 + 5</button>
                <button onClick={() => dispatch({type:'increment2',value:1})}>Increment2 + 1</button>
                <button onClick={() => dispatch({type:'decrement2',value:1})}>Decrement2 + 1</button>
            </div>
            <button onClick={() => dispatch({type:'reset'})}>Reset</button>
        </div>
    )
}

export default CounterTwo
