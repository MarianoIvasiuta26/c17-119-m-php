import { BrowserRouter, Routes,Route } from 'react-router-dom';
import Navbar from './components/Home/Navbar';




export default function Router(){
    return (
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Navbar />} />         
        </Routes>
      </BrowserRouter>
    );
}