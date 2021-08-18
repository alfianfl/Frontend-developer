import axios from "axios";
export const fetchUsers = () => {
  return (dispatch) => {
    dispatch(fetchUsersRequest());
    axios
      .get("https://jsonplaceholder.typicode.com/users")
      .then((response) => {
        const users = response.data;
        dispatch(fetchUsersSuccess(users));
      })
      .catch((err) => {
        const errMsg = err.message;
        dispatch(fetchUsersFailure(errMsg));
      });
  };
};
export const fetchUsersRequest = () => {
  return {
    type: "FETCH_USERS_REQUEST",
  };
};

export const fetchUsersSuccess = (users) => {
  return {
    type: "FETCH_USERS_SUCCESS",
    payload: users,
  };
};
export const fetchUsersFailure = (errMsg) => {
  return {
    type: "FETCH_USERS_FAILURE",
    payload: errMsg,
  };
};
