import { createTheme } from "@mui/material/styles";

const theme = createTheme({
    palette: {
        primary: {
            main: "#1976d2", // Синий
        },
        secondary: {
            main: "#ff9800", // Оранжевый
        },
        background: {
            default: "#f4f6f8", // Светло-серый фон
        },
    },
    typography: {
        fontFamily: "Roboto, Arial, sans-serif",
    },
});

export default theme;
