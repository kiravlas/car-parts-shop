//
import 'preline'
import "flag-icons/css/flag-icons.min.css";

import {createIcons, icons} from 'lucide';

import Alpine from 'alpinejs'
import {intersect} from "@alpinejs/intersect";

window.Alpine = Alpine

Alpine.plugin(intersect)

Alpine.start()


document.addEventListener("DOMContentLoaded", () => {
    createIcons({icons});

    window.HSStaticMethods?.autoInit();
});
