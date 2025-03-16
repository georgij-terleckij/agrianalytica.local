import React from "react";
import {Box, Typography, Button, Grid, Card, CardContent, CardMedia, Container} from "@mui/material";
import {useNavigate} from "react-router-dom";
import Header from "../../layouts/main_site/Header.jsx";

const HomePage = () => {
    const navigate = useNavigate();

    return (
        <>
            <Header/>
            <Container maxWidth="lg">
                <Box
                    sx={{
                        backgroundImage: `url('/images/hero-bg.png')`, // Фон
                        backgroundSize: "cover",
                        backgroundPosition: "center",
                        height: 400,
                        display: "flex",
                        alignItems: "center",
                        justifyContent: "center",
                        color: "#fff",
                        textAlign: "center",
                        mb: 4,
                    }}
                >
                    <Typography variant="h3" sx={{fontWeight: "bold"}}>
                        Климатический Атлас
                    </Typography>
                </Box>
                {/* Карточки с контентом */}
                <Grid container spacing={3}>
                    <Grid item xs={12} md={6}>
                        <Card>
                            <CardMedia
                                component="img"
                                height="180"
                                image="/images/agrarian.png"
                                alt="Аграрие"
                            />
                            <CardContent>
                                <Typography variant="h5" color="primary">
                                    Аграрие
                                </Typography>
                                <Typography variant="body2">
                                    За гнучкі механізм інвестування міссі засобів виробництва, рішення у сфері…
                                </Typography>
                                <Button variant="contained" sx={{mt: 2}}>Подробнее</Button>
                            </CardContent>
                        </Card>
                    </Grid>

                    <Grid item xs={12} md={6}>
                        <Card>
                            <CardMedia
                                component="img"
                                height="180"
                                image="/images/partner.webp"
                                alt="Партнеры"
                            />
                            <CardContent>
                                <Typography variant="h5" color="primary">
                                    Партнёры
                                </Typography>
                                <Typography variant="body2">
                                    Прямий шлях до збільшення продажів та фінансування…
                                </Typography>
                                <Button variant="contained" sx={{mt: 2}}>Подробнее</Button>
                            </CardContent>
                        </Card>
                    </Grid>
                </Grid>

                {/* Партнёры */}
                <Box sx={{textAlign: "center", mt: 5, mb: 3}}>
                    <Typography variant="h4" sx={{fontWeight: "bold"}}>
                        Наши партнеры
                    </Typography>
                </Box>

                <Grid container spacing={2} justifyContent="center">
                    <Grid item>
                        <img src="/images/usaid.png" alt="USAID" width={100}/>
                    </Grid>
                    <Grid item>
                        <img src="/images/chemonics.png" alt="Chemonics" width={100}/>
                    </Grid>
                </Grid>
            </Container>
        </>
    );
};

export default HomePage;
