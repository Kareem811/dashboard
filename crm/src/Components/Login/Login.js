import React, { useState } from "react";
import formStyles from "../Styles/form.module.css";
import formBg from "../../Images/formbg.jpg";
import { AuthData } from "../../Utilities/Protected";
const Login = () => {
  const { loginFunction } = AuthData();
  const [user, setUser] = useState({
    email: ``,
    password: ``,
  });
  const handleLogin = (e) => {
    e.preventDefault();
    loginFunction(user);
  };
  return (
    <section className={formStyles.container}>
      <img src={formBg} alt="" />
      <div className={formStyles.containerLayer}>
        <form onSubmit={(e) => handleLogin(e)}>
          <h1>Login</h1>
          <input type="text" placeholder="Email" value={user.email} onChange={(e) => setUser({ ...user, email: e.target.value })} />
          <input type="text" placeholder="Password" value={user.password} onChange={(e) => setUser({ ...user, password: e.target.value })} />
          <button>Login</button>
        </form>
      </div>
    </section>
  );
};

export default Login;
