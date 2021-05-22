import React,{useState,useRef,useEffect} from 'react'

function HookTimer() {
    const [time,setTime] = useState(0)
    const intervalRef = useRef();
    useEffect(() => {
       intervalRef.current = setInterval(() => {
            setTime(prevTime => prevTime + 1)
        },1000)
        return () => {
            clearInterval(intervalRef.current)
        }
    },[])
    return (
        <div>
            <span>Time - {time}</span>
            <button onClick={() => clearInterval(intervalRef.current)}>Clear Timer</button>            
        </div>
    )
}

export default HookTimer
