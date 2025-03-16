import React from "react";
import { Box, Typography, Button } from "@mui/material";
import { useNavigate } from "react-router-dom";

const NotFound = () => {
    const navigate = useNavigate();

    return (
        <Box sx={{ textAlign: "center", mt: 10 }}>
            <Typography variant="h2" color="error">
                404
            </Typography>
            <Typography variant="h5">Страница не найдена</Typography>
            <Button variant="contained" sx={{ mt: 2 }} onClick={() => navigate("/")}>
                На главную
            </Button>
        </Box>
    );
};

export default NotFound;
