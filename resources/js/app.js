//
import 'preline'
import "flag-icons/css/flag-icons.min.css";

import {createIcons, icons} from 'lucide';

document.addEventListener("DOMContentLoaded", () => {
    createIcons({icons});

    window.HSStaticMethods?.autoInit();
});
