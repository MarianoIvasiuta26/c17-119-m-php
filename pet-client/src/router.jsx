import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home1 from "./pages/Home/Home"
import Quehacemos from "./pages/Home/Quehacemos";
import Nosotros from "./pages/Home/Nosotros";
Nosotros



export default function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />} />
        <Route path="/Quehacemos" element={<Quehacemos />} />
        <Route path="/Nosotros" element={<Nosotros />} />
      </Routes>
    </BrowserRouter>
  );
}

function Layout() {
  return (
    <div>
      <Home1/>     
    </div>
  );
}
