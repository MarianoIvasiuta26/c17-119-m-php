import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home1 from "./pages/Home/Home"


export default function Router() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />} />
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
