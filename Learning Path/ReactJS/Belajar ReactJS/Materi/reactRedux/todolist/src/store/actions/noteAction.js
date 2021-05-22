import * as actionsType from './actionsType'

export const addNote = (note) => ({
    type : actionsType.ADD_NOTE,
    payload: note
})