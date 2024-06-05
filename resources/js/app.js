import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
window.Alpine = Alpine;
Alpine.plugin(persist);
Alpine.start();

import { BarChart3, Briefcase, ChevronDown, Database, DoorClosed, Home, Menu, Mouse, Plus, Settings2, ShieldCheck, Trash2, createIcons } from 'lucide';
createIcons({
    icons: {
        Plus,
        Mouse,
        Menu,
        DoorClosed,
        ChevronDown,
        Settings2,
        Trash2,
        Database,
        ShieldCheck,
        BarChart3,
        Home,
        Briefcase
    }
});
