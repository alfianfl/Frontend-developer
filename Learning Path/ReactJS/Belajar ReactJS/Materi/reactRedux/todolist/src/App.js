import React, { Component } from 'react';
import './App.css';
import { Provider } from 'react-redux'
import Form from './components/Form/Form'
import List from './components/List/List'
import store from './store'
import NoteList from './components/Note/Note'

class App extends Component {
  render() {
    return (
      <Provider store={store}>
        <div className="App container">
          <Form/>
          <List/>
          <NoteList/>
        </div>
      </Provider>
    );
  }
}

export default App;
