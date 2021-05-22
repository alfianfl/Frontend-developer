import React,{useState} from 'react'
import useDocumentTitle from '../hooks/UseDocumentTitle' 

function CountTwo() {
    const [count,setCount] = useState(0)

    useDocumentTitle(count)
    return (
        <div>
            <span>Count - {count}</span>
            <button onClick={ () => setCount(prevCount => prevCount+1)}>Increment</button>
        </div>
    )
}

export default CountTwo
