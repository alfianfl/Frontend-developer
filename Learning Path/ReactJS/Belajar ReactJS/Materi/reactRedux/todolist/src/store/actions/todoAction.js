import * as actionsType from './actionsType.js'

export const addTodos = (todo) => ({ type: actionsType.ADD_TODO , payload: todo})
export const editTodo = (index,todo) => ({ type:actionsType.EDIT_TODO , payload: { index, todo } })
export const deleteTodo =(index) => ({ type:actionsType.DELETE_TODO , payload: index })