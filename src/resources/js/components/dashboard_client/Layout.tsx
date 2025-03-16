import * as React from 'react';
import Box from '@mui/material/Box';
import Drawer from '@mui/material/Drawer';
import AppBar from '@mui/material/AppBar';
import CssBaseline from '@mui/material/CssBaseline';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import List from '@mui/material/List';
import Divider from '@mui/material/Divider';
import ListItem from '@mui/material/ListItem';
import ListItemButton from '@mui/material/ListItemButton';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import InboxIcon from '@mui/icons-material/MoveToInbox';
import MailIcon from '@mui/icons-material/Mail';
import { Outlet } from "react-router-dom";
import { Link } from "react-router-dom";

const drawerWidth = 240;

export default function ClippedDrawer() {
    const [open, setOpen] = React.useState(true); // ✅ Управляем состояние боковой панели

    const toggleDrawer = () => {
        setOpen(!open); // Переключаем состояние
    };

    return (
        <Box sx={{ display: 'flex' }}>
            <CssBaseline />

            {/* Верхний бар */}
            <AppBar position="fixed" sx={{ zIndex: (theme) => theme.zIndex.drawer + 1 }}>
                <Toolbar>
                    <IconButton
                        color="inherit"
                        aria-label="open drawer"
                        edge="start"
                        onClick={toggleDrawer} // ✅ Кнопка управления Sidebar
                        sx={{ mr: 2 }}
                    >
                        <MenuIcon />
                    </IconButton>
                    <Typography variant="h6" noWrap component="div">
                        Панель управления
                    </Typography>
                </Toolbar>
            </AppBar>

            {/* Боковое меню */}
            <Drawer
                variant="persistent"
                open={open} // ✅ Контролируем видимость
                sx={{
                    width: drawerWidth,
                    flexShrink: 0,
                    [`& .MuiDrawer-paper`]: { width: drawerWidth, boxSizing: 'border-box' },
                }}
            >
                <Toolbar />
                <Divider />
                <List>
                    {[
                        { text: "Главная", path: "/client/dashboard", icon: <InboxIcon /> },
                        { text: "Клиенты", path: "/client/list", icon: <MailIcon /> },
                        { text: "Настройки", path: "/client/settings", icon: <InboxIcon /> },
                    ].map((item) => (
                        <ListItem key={item.text} disablePadding>
                            <ListItemButton component={Link} to={item.path}>
                                <ListItemIcon>{item.icon}</ListItemIcon>
                                <ListItemText primary={item.text} />
                            </ListItemButton>
                        </ListItem>
                    ))}
                </List>
            </Drawer>

            {/* Контент */}
            <Box
                component="main"
                sx={{
                    flexGrow: 1,
                    p: 3,
                    marginLeft: open ? `${drawerWidth}px` : 0, // ✅ Смещение при открытии/закрытии
                    transition: "margin 0.3s ease-out"
                }}
            >
                <Toolbar />
                <Outlet />
            </Box>
        </Box>
    );
}
