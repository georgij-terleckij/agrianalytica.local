import React from "react";
import { Box, Button } from "@mui/material";

const Navbar = () => {
    const menuItems = [
        "AGRI:ФІНАНСУВАННЯ",
        "AGRI:МАГАЗИН",
        "AGRI:ТРЕЙДИНГ",
        "AGRI:ЕКСПЕРТИ",
        "AGRI:РОБОТА",
        "ГРАНТИ",
        "ПРОДУКТИ",
    ];

    return (
        <Box sx={{ display: "flex", gap: 3, padding: "10px 20px", backgroundColor: "#222" }}>
            {menuItems.map((item, index) => (
                <Button key={index} sx={{ color: "#fff", fontSize: "14px" }}>
                    {item}
                </Button>
            ))}
        </Box>
    );
};

export default Navbar;
