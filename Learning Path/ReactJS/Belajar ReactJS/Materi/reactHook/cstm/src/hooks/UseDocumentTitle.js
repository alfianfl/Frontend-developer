import {useEffect} from 'react'

function UseDocumentTitle(count) {
    useEffect(()=>{
        document.title = `count ${count} times`
    },[count])
}

export default UseDocumentTitle
