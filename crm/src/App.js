import React, { useEffect, useState } from "react";
import axiosClient from "./axiosClient";
import Protected from "./Utilities/Protected";

const App = () => {
  const [appUser, setAppUser] = useState({});
  const [loading, setLoading] = useState(true);
  const getUser = async () => {
    const token = window.sessionStorage.getItem("jwt");
    await axiosClient
      .get("/user", { headers: { Authorization: `Bearer ${token}` } })
      .then((res) => {
        setAppUser(res.data);
        setLoading(false);
      })
      .catch((err) => {
        console.log(err);
        setLoading(false);
      });
  };
  useEffect(() => {
    getUser();
  } , []);
  return <>{loading ? <span>Loading ..... </span> : <Protected user={{ appUser, getUser }} />}</>;
};

export default App;
