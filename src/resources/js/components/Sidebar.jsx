import React from "react";
import { Drawer, List, ListItem, ListItemIcon, ListItemText } from "@mui/material";
import { Home, Person, Settings, People } from "@mui/icons-material";
import { Link } from "react-router-dom";

const Sidebar = () => {
    return (
        <Drawer variant="permanent" sx={{ width: 240, flexShrink: 0 }}>
            <List>
                <ListItem button component={Link} to="/client">
                    <ListItemIcon><Home /></ListItemIcon>
                    <ListItemText primary="Главная" />
                </ListItem>
                <ListItem button component={Link} to="/client/profile">
                    <ListItemIcon><Person /></ListItemIcon>
                    <ListItemText primary="Профиль" />
                </ListItem>
                <ListItem button component={Link} to="/client/settings">
                    <ListItemIcon><Settings /></ListItemIcon>
                    <ListItemText primary="Настройки" />
                </ListItem>
                <ListItem button component={Link} to="/client/list">
                    <ListItemIcon><People /></ListItemIcon>
                    <ListItemText primary="Клиенты" />
                </ListItem>
            </List>
        </Drawer>
    );
};

export default Sidebar;
