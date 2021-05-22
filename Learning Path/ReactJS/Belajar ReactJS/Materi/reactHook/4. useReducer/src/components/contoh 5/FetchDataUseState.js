import React,{useState,useEffect} from 'react'
import axios from 'axios'


function FetchDataUseState() {
    const [loading,setLoading] = useState(true)
    const [post,setPost] = useState({})
    const [error,setError]= useState(false)

    useEffect(()=> {
        axios.get('https://jsonplaceholder.typicode.com/posts/1')
         .then(response => {
             console.log(response)
             setLoading(false)
             setPost(response.data)
         })
         .catch(err => {
            setLoading(false)
            setPost({})
            setError('Something wrong!')
         })
    }, [])
    return (
        <div>
            {loading ? 'loading...' : post.title}
            {error ? error : null}         
        </div>
    )
}

export default FetchDataUseState
