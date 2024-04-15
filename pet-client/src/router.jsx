
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import AppLayout from './layouts/AppLayout';
import HomeView from './views/HomeView';
import LoginView from './views/auth/LoginView';
import RegisterView from './views/auth/RegisterView';

export default function Router() {
    return (
        <BrowserRouter>
            <Routes>
                <Route element={<AppLayout />}>
                    <Route path='/' element={<HomeView />} index />
                    <Route path='/auth/login' element={<LoginView />} />
                    <Route path='/auth/register' element={<RegisterView />} />
                </Route>
            </Routes>
        </BrowserRouter>
    )
}
{/*
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
>>>>>>> 155e4db8b04df153e9e7503fb3a4d0a469fbe5b8 */}
