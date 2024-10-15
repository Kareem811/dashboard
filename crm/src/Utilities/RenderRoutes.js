import React from "react";
import { AuthData } from "./Protected";
import { Route, Routes } from "react-router-dom";
import Home from "../Components/Home/Home";
import Login from "../Components/Login/Login";

const RenderRoutes = () => {
    const { loggedUser } = AuthData();
    console.log(loggedUser)
  return loggedUser.isAuth ? (
    <Routes>
      <Route path="/" element={<Home />} />
    </Routes>
  ) : (
    <Routes>
      <Route path="*" element={<Login />} />
    </Routes>
  );
};

export default RenderRoutes;
