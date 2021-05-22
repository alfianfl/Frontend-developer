import React from 'react'
import UserCountValue from '../hooks/UseCountValue'

function Counter3() {
    const[count,increment,decrement,reset] = UserCountValue(0,1)
    return (
        <div>
            <span>{count}</span><br/>
            <button onClick={increment}>Increment</button>
            <button onClick={decrement}>Decrement : </button>
            <button onClick={reset}>Reset : </button>
        </div>
    )
}

export default Counter3
