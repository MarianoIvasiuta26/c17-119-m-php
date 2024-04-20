import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./pages/Home/Home";
import LoginPage from "./pages/Login/LoginPage";

export default function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} index />
        <Route path="/LoginPage" element={<LoginPage />} />
       
        {/* Add this route */}
      </Routes>
    </BrowserRouter>
  );
}
