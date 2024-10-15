import React, { createContext, useContext, useState } from "react";
import axiosClient from "../axiosClient";
import RenderRoutes from "./RenderRoutes";
import { useNavigate } from "react-router-dom";
const AuthProvider = createContext();
export const AuthData = () => useContext(AuthProvider);
const Protected = (props) => {
  const navigate = useNavigate();
  console.log(props);
  const [loggedUser, setLoggedUser] = useState({
    user: props.user.appUser || null,
    // isAuth: props.user.appUser ? true || false,
    isAuth: Object.keys(props.user.appUser).length > 0,
  });
  const loginFunction = (user) => {
    axiosClient
      .post("/login", user)
      .then((res) => {
        if (res.statusText === "OK") {
          const token = res.data.token;
          window.sessionStorage.setItem("jwt", token);
          setLoggedUser({ user: res.data.user, isAuth: true });
          props.user.getUser();
        }
      })
      .catch((err) => console.log(err));
  };
  const logoutFunction = () => {
    const token = window.sessionStorage.getItem("jwt");
    axiosClient
      .get(`/logout`, {
        headers: { Authorization: `Bearer ${token}` },
      })
      .then((res) => {
        if (res.statusText === "OK") {
          setLoggedUser({ user: {}, isAuth: false });
          window.sessionStorage.removeItem("jwt");
          navigate("/");
        }
      })
      .catch((err) => console.log(err));
  };
  return (
    <AuthProvider.Provider value={{ loggedUser, loginFunction, logoutFunction }}>
      <RenderRoutes />
    </AuthProvider.Provider>
  );
};

export default Protected;
