import React, { Component } from 'react'
import { connect } from 'react-redux'

class NotesList extends Component {
  render (){
    return (
      <div className="mt-3">
        <h1>Notes</h1>
        <ul className="list-group">
          {this.props.notes.map((note, index) => (
            <li key={index} className="list-group-item container">
              {note}
            </li>
          ))}
        </ul>
      </div>
    )    
  }
}

const mapStateToProps = state =>({
    notes : state.note.notes
})

export default connect(mapStateToProps,null)(NotesList)