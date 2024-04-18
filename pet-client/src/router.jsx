import { BrowserRouter, Routes, Route} from 'react-router-dom'
import AppLayout from './layouts/AppLayout';
// import LoginView from './views/auth/LoginView';
// import RegisterView from './views/auth/RegisterView';
import Home from './pages/Home/Home';
import LoginPage from "./pages/Login/LoginPage";


export default function Router() {
    return (
      <BrowserRouter>
        <Routes>
          <Route element={<AppLayout />}>
            <Route path="/" element={<Home />} index />
            {/* <Route path="/auth/login" element={<LoginView />} /> */}
            {/* <Route path="/auth/register" element={<RegisterView />} /> */}
            <Route path="/auth/LoginPage" element={<LoginPage />} />
          </Route>
        </Routes>
      </BrowserRouter>
    );
}
