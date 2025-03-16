import React, { useEffect, useState } from "react";
import api from "../../services/api";
import { Container, Typography, CircularProgress } from "@mui/material";
import { DataGrid, GridColumns } from "@mui/x-data-grid";

const columns: GridColumns = [
    { field: "id", headerName: "ID", width: 90 },
    { field: "name", headerName: "Имя", width: 200 },
    { field: "email", headerName: "Email", width: 250 },
    { field: "status", headerName: "Статус", width: 150 }
];

const ClientsPage = () => {
    const [clients, setClients] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        api.get("/clients")
            .then((res) => {
                setClients(res.data);
                setLoading(false);
            })
            .catch((err) => {
                console.error("Ошибка при загрузке клиентов:", err);
                setLoading(false);
            });
    }, []);

    return (
        <Container>
            <Typography variant="h4" sx={{ mb: 2 }}>Список клиентов</Typography>
            {loading ? (
                <CircularProgress />
            ) : (
                <DataGrid
                    rows={clients}
                    columns={columns}
                    autoHeight
                    pageSizeOptions={[5, 10, 20]}
                />
            )}
        </Container>
    );
};

export default ClientsPage;
