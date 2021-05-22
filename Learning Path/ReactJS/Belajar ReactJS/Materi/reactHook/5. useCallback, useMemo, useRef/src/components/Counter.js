import React,{useState, useMemo} from 'react'

function Counter() {
    const [count,setCount] = useState(0)
    const [countTwo,setCountTwo] = useState(0)
    const incrementOne = () => {
        setCount(count+1)
    
    }
    const incrementTwo = () => {
        
        setCountTwo(countTwo+1)
    }
    const isEven = useMemo( () =>{
        let i =0
        while(i<2000000000)i++
        return count % 2===0  
    },[count])
    return (
        <div>
            <div>
                <button onClick={incrementOne}>count one - {count}</button>
                <span>{isEven ? 'even' : 'odd'}</span>
            </div>
            <div>
                <button onClick={incrementTwo}>count two -{countTwo}</button>
            </div>
        </div>
    )
}

export default Counter
