import axios from "axios";

const axiosClient = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
});
axiosClient.interceptors.request.use((config) => {
  const token = window.sessionStorage.getItem("jwt");
  config.headers.Authorization = `Bearer ${token}`;
  return config;
});
axiosClient.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    try {
      const { response } = error.request;
      if (response.status === 401) {
        window.sessionStorage.removeItem("jwt");
      }
    } catch (er) {
      console.log(er);
    }
    throw error;
  },
);
export default axiosClient;
