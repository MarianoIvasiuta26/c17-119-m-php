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