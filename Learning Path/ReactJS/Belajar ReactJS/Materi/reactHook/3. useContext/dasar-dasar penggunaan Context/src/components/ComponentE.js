import React,{useContext} from 'react'
import {UserContext,ChannelContext} from '../App'

function ComponentE() {

    // penulisan lebih simple daripada yang dilakukan di componentF
    const user = useContext(UserContext)
    const channel = useContext(ChannelContext)
    return (
        // Usecontext ke componentC
        <div>
            this is {user} channel {channel} from ComponentE
            
        </div>
    )
}

export default ComponentE
