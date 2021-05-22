import React,{useReducer,useEffect} from 'react'
import axios from 'axios'

const initialState = {
    loading: true,
    data:[],
    error:null
}

const reducer = (currentState, action) =>{
    switch(action.type){
        case 'FETCH_SUCCESS' :
            return{
                ...currentState,
                loading: false,
                data:action.payload,
                error:null
            }
        case 'FETCH_ERROR' :
            return{
                ...currentState,
                loading: false,
                data:[],
                error:'something wrong!'
            }
        default :
            return currentState
    }
}
function FetchDataUseReducer() {
    const [stateData, dispatch] = useReducer(reducer,initialState)
    useEffect(()=> {
        axios.get('https://jsonplaceholder.typicode.com/posts/1')
         .then(response => {
            dispatch({
                type:'FETCH_SUCCESS',
                payload: response.data
            })
         })
         .catch(err => {
            dispatch({
                type:'FETCH_ERROR'
            })
         })
    }, [])
    return (
        <div>
            {stateData.loading ? 'loading...' : stateData.data.title}
            {stateData.error ? stateData.error  : null}
            
        </div>
    )
}

export default FetchDataUseReducer
