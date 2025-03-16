import React, {useState} from "react";
import {Box, Button, Container, TextField, Typography, Link, Alert} from "@mui/material";
import {useNavigate} from "react-router-dom";
import axios from "axios";

const LoginPage = () => {
    const navigate = useNavigate();
    const [form, setForm] = useState({email: "", password: ""});
    const [error, setError] = useState(null);

    const handleChange = (e) => {
        setForm({...form, [e.target.name]: e.target.value});
    };

    const handleLogin = async () => {
        setError(null); // Очищаем ошибку перед новым запросом
        try {
            const response = await axios.post("http://localhost:8000/api/login", form);
            console.log('token', response.data.token)
            localStorage.setItem("token", response.data.access_token); // Сохраняем токен
            navigate("/client"); // Перенаправляем в клиентскую админку
        } catch (err) {
            setError("Ошибка авторизации. Проверьте данные.");
        }
    };

    return (
        <Box
            sx={{
                minHeight: "100vh",
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                backgroundImage: "url('/images/background.jpg')",
                backgroundSize: "cover",
                backgroundPosition: "center",
            }}
        >
            <Container
                maxWidth="xs"
                sx={{
                    backgroundColor: "white",
                    borderRadius: 3,
                    padding: 4,
                    boxShadow: 3,
                    textAlign: "center",
                }}
            >
                {/* Логотип */}
                <img src="/images/logo.png" alt="AgriAnalytica" style={{width: 180}}/>

                <Typography variant="h5" fontWeight="bold" mt={2} mb={3}>
                    Войти в кабинет
                </Typography>

                {error && <Alert severity="error">{error}</Alert>}

                {/* Поля ввода */}
                <TextField
                    fullWidth
                    label="Ваш логин"
                    variant="outlined"
                    margin="normal"
                    name="email"
                    value={form.email}
                    onChange={handleChange}
                />
                <TextField
                    fullWidth
                    label="Ваш пароль"
                    variant="outlined"
                    type="password"
                    margin="normal"
                    name="password"
                    value={form.password}
                    onChange={handleChange}
                />

                {/* Забыл пароль */}
                <Link href="#" sx={{display: "block", mt: 1, mb: 2, color: "green"}}>
                    Забыли пароль?
                </Link>

                {/* Кнопки */}
                <Button
                    variant="contained"
                    color="success"
                    fullWidth
                    sx={{mb: 2, fontSize: 16, fontWeight: "bold", py: 1.5}}
                    onClick={handleLogin}
                >
                    ВОЙТИ
                </Button>

                <Button
                    variant="contained"
                    color="grey"
                    fullWidth
                    sx={{fontSize: 16, fontWeight: "bold", py: 1.5}}
                    onClick={() => navigate("/register")}
                >
                    ЗАРЕГИСТРИРОВАТЬСЯ
                </Button>
            </Container>
        </Box>
    );
};

export default LoginPage;
