import React from "react";
import { AuthData } from "../../Utilities/Protected";

const Home = () => {
  const { logoutFunction } = AuthData();
  return (
    <div>
      Home
      <button onClick={() => logoutFunction()}>Logout</button>
    </div>
  );
};

export default Home;
