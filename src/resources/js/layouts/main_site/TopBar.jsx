import React from "react";
import { Box, Typography, Button, IconButton } from "@mui/material";
import FavoriteBorderIcon from "@mui/icons-material/FavoriteBorder";
import CloudQueueIcon from "@mui/icons-material/CloudQueue";
import AttachMoneyIcon from "@mui/icons-material/AttachMoney";
import LanguageIcon from "@mui/icons-material/Language";
import VisibilityIcon from "@mui/icons-material/Visibility";

const TopBar = () => {
    return (
        <Box
            sx={{
                display: "flex",
                justifyContent: "space-between",
                alignItems: "center",
                backgroundColor: "#333",
                color: "#fff",
                padding: "5px 20px",
            }}
        >
            {/* Левая часть */}
            <Box sx={{ display: "flex", alignItems: "center", gap: 2 }}>
                <IconButton color="inherit"><FavoriteBorderIcon /></IconButton>
                <Typography variant="body2">Донати</Typography>

                <IconButton color="inherit"><CloudQueueIcon /></IconButton>
                <Typography variant="body2">Кліматичний атлас</Typography>

                <IconButton color="inherit"><AttachMoneyIcon /></IconButton>
                <Typography variant="body2">Фінансування ММСБ</Typography>
            </Box>

            {/* Правая часть */}
            <Box sx={{ display: "flex", alignItems: "center", gap: 2 }}>
                <Typography variant="body2">Аграріям</Typography>
                <Typography variant="body2">Іншим</Typography>
                <Typography variant="body2">Контакти</Typography>

                <IconButton color="inherit"><LanguageIcon /></IconButton>
                <Typography variant="body2">UA RU EN</Typography>

                <IconButton color="inherit"><VisibilityIcon /></IconButton>
            </Box>
        </Box>
    );
};

export default TopBar;
