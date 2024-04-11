import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./pages/Home/Navbar";
import Header from "./pages/Home/Header"
import Footer from "./pages/Home/Footer";

export default function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} />
      </Routes>
    </BrowserRouter>
  );
}

function Home() {
  return (
    <div>
      <Header />
      <Navbar />
      <Footer />
    </div>
  );
}
