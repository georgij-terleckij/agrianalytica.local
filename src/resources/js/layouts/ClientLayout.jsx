import React, { useEffect, useState } from "react";
import {Box , CssBaseline} from "@mui/material";
import Navbar from "../components/Navbar";
import Sidebar from "../components/Sidebar";
import {Routes, Route} from "react-router-dom";
import Dashboard from "../pages/client/Dashboard";
import Profile from "../pages/client/Profile";
import Settings from "../pages/client/Settings";
import NotFound from "../pages/NotFound.jsx";
import ClientsPage from "../pages/client/ClientsPage.jsx";
import api from "../services/api.js";

const ClientLayout = () => {
    const [user, setUser] = useState(null);

    useEffect(() => {
        const fetchUser = async () => {
            try {
                const token = localStorage.getItem("token");
                if (!token) return;

                const response = await api.get("/me", {
                    headers: { Authorization: `Bearer ${token}` },
                });

                setUser(response.data);
            } catch (error) {
                console.error("Ошибка при загрузке пользователя", error);
            }
        };

        fetchUser();
    }, []);

    return (
        <>
            <CssBaseline/>
            {user && <Navbar user={user} />}
            <Box sx={{display: "flex"}}>
                <Sidebar />
                <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
                    <Routes>
                        <Route index element={<Dashboard/>}/>
                        <Route path="profile" element={<Profile/>}/>
                        <Route path="settings" element={<Settings/>}/>
                        <Route path="/list" element={<ClientsPage />} />
                        <Route path="*" element={<NotFound />} />
                    </Routes>
                </Box>
            </Box>
        </>
    );
};

export default ClientLayout;
