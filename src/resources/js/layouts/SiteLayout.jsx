import React from "react";
import { Container, Typography } from "@mui/material";

const SiteLayout = () => {
    return (
        <Container sx={{ mt: 4, textAlign: "center" }}>
            <Typography variant="h2" gutterBottom>Добро пожаловать!</Typography>
            <Typography variant="h5">Наш сайт предлагает лучшие решения для аграрного бизнеса.</Typography>
        </Container>
    );
};

export default SiteLayout;
