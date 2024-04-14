import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home1 from "./pages/Home/Home"
import Quehacemos from "./pages/Home/Quehacemos";
import SomosSuramigo from "./pages/Home/SomosSuramigo";




export default function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />} />
        <Route path="/Quehacemos" element={<Quehacemos />} />
        <Route path="/Nosotros" element={<SomosSuramigo />} />
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
