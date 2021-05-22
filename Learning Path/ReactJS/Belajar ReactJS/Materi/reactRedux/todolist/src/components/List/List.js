import React, { Component } from 'react'
import {connect} from 'react-redux'
import TextAndForm from './TextAndForm.js'

class List extends Component {


  render (){
    return (
      <ul className="list-group">
        {this.props.todos.map((todo,index) => (
          <li key={index} className="list-group-item">
              <TextAndForm 
                todo={todo}
                index={index}
              />
          </li>
        ))}
      </ul>
    )    
  }
}

//mapStateToProps ini kita gunakan untuk memasukan state yang ada di store ke dalam props component List kita.
//Jadi kita dapat mengakses nya dengan cara this.props.todos
const mapStateToProps = state => {
  return {
    todos: state.todo.todos
  }
}
//connect(mapStateToProps, mapDispatchToProps)(NamaComponent)
export default connect(mapStateToProps, null)(List)
