import React from "react";

import AppRoutes from "./routes.jsx";
import * as ReactDOM from 'react-dom/client';
import { StyledEngineProvider } from '@mui/material/styles';

ReactDOM.createRoot(document.querySelector("#app")!).render(
    <React.StrictMode>
        <StyledEngineProvider injectFirst>
            <AppRoutes/>
        </StyledEngineProvider>
    </React.StrictMode>
);
