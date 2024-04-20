import axios from "axios";

const Logout = () => {
  const handleLogout = async () => {
    try {
      await axios.post("/api/logout");
      // Clear token from local storage
      localStorage.removeItem("token");
      // Redirect or navigate to the login page
      window.location.href = "/login";
    } catch (error) {
      console.error("Logout failed:", error);
    }
  };

  return <button onClick={handleLogout}>Logout</button>;
};

export default Logout;
