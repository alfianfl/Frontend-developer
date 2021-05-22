import {createStore, combineReducers} from 'redux';
import * as actionsType from './actions/actionsType'

const initialStateTodos = {
  todos: []
}

const initialStateNotes = {
  notes: []
}
const todoReducer = (state = initialStateTodos, action) => {
  switch(action.type) {
    case actionsType.ADD_TODO: 
      return {
        ...state,
        todos: [...state.todos, action.payload]
      } 
    case actionsType.DELETE_TODO:
      //dengan splice

      const newtodos = [...state.todos]
      newtodos.splice(action.payload,1)

      return{
        ...state,
        todos:newtodos
      }
      //dengan metode filter , pada metode ini tidak membutuhkan mengcopy state baru karena di method ini kita sudah membuat array baru 
      // let newTodos = state.todos.filter((element, index) => index !== action.payload)

      // // return state baru
      // return {
      //     ...state,
      //     todos: newTodos
      // }
      case actionsType.EDIT_TODO:
        // edit state 
        // copy state todos 
        let todos = [...state.todos]
        // ganti data todo
        let index = action.payload.index
        let todo = action.payload.todo
        todos[index] = todo
      
        // return state baru
        return {
          ...state,
          todos
        }
        default:
          return state;
  }
}
const noteReducer = (state = initialStateNotes, action) => {
    switch(action.type) {
        case actionsType.ADD_NOTE:
          return {
            ...state,
            notes: [...state.notes, action.payload]
          }
        default:
          return state;
    }
  }

const rootReducer = combineReducers({
  todo : todoReducer,
  note : noteReducer
})// untuk menggabungkan state dan ini menerima parameter object
const store = createStore(rootReducer, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());

export default store;