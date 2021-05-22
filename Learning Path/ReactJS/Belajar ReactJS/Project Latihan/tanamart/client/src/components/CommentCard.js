import React, { useState, useEffect } from 'react'
import axios from "axios"


function CommentCard(props) {
    const [nama, setNama] = useState()

    useEffect(() => {
        axios
            .get(`http://localhost:5000/biodataByUser/${props.idUser}`)
            .then((response) => {
                setNama(response.data.nama)
            })
            .catch((err) => {
                console.log(err)
            })
    })

    return (
        <div className="komentar-body">
            <h5>{nama}</h5>
            <h6>{props.isiComment}</h6>
        </div>
    )
}

export default CommentCard
