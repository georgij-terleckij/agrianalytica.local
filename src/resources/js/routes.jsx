import {BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom";
import HomePage from "./pages/home/HomePage";
import LoginPage from "./pages/LoginPage.jsx";
import NotFound from "./pages/NotFound.jsx";
// import PrivateRoute from "./components/PrivateRoute";
import Layout from "./components/dashboard_client/Layout.jsx";
import Dashboard from "./pages/client/Dashboard.jsx";
import Profile from "./pages/client/Profile.jsx";
import Settings from "./pages/client/Settings.jsx";
import ClientsPage from "./pages/client/ClientsPage.jsx";

// Функция проверки аутентификации
const isAuthenticated = () => {
    return !!localStorage.getItem("token"); // Проверяем, есть ли токен в localStorage
};

// Защищенный маршрут (перенаправляет на /login, если нет авторизации)
const PrivateRoute = ({ element }) => {
    return isAuthenticated() ? element : <Navigate to="/login" replace />;
};
const AppRoutes = () => {
    return (
        <Router>
            <Routes>
                {/* 🔹 Главный сайт */}
                {/*<Route path="/" element={<SiteLayout />} />*/}
                <Route path="/" element={<HomePage/>}/>;
                <Route path="/login" element={<LoginPage/>}/>;

                {/* 🔹 Клиентская админка */}
                <Route path="/client/*" element={<PrivateRoute element={<Layout/>}/>}>
                    <Route path="dashboard" element={<Dashboard />} />
                    <Route path="list" element={<ClientsPage />} />
                    <Route path="settings" element={<Settings />} />
                    {/*<Route index element={<Dashboard/>}/>*/}
                    <Route path="profile" element={<Profile/>}/>
                    {/*<Route path="list" element={<ClientsPage/>}/>*/}
                </Route>

                {/* 404 - Страница не найдена */}
                <Route path="*" element={<NotFound/>}/>
            </Routes>
        </Router>
    );
};

export default AppRoutes;
