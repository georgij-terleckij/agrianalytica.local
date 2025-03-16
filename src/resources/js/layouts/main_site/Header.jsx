import React from "react";
import { Box, Button } from "@mui/material";
import { Link } from "react-router-dom";
import TopBar from "./TopBar";
import Navbar from "./Navbar";

const Header = () => {
    return (
        <Box style={{ backgroundColor: "#5EB02D" }}>
            {/* Верхняя панель */}
            <TopBar />

            {/* Логотип + кнопка "Мій кабінет" */}
            <Box sx={{ display: "flex", justifyContent: "space-between", alignItems: "center", padding: "10px 20px" }}>
                {/* Логотип */}
                <Link to="/">
                    <img src="/images/logo.png" alt="Logo" style={{ height: "50px" }} />
                </Link>

                {/* Кнопка "Мій кабінет" */}
                <Link to="/login" style={{ textDecoration: "none" }}>
                    <Button
                        variant="contained"
                        sx={{ backgroundColor: "#5EB02D", color: "#fff", borderRadius: "20px", padding: "8px 20px" }}
                    >
                        Мій кабінет
                    </Button>
                </Link>
            </Box>

            {/* Основное меню */}
            <Navbar />
        </Box>
    );
};

export default Header;
