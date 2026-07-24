//
import 'preline'
import "flag-icons/css/flag-icons.min.css";

import {createIcons, icons} from 'lucide';

import Alpine from 'alpinejs'
import {intersect} from "@alpinejs/intersect";
import gsap from "gsap";

window.Alpine = Alpine

Alpine.plugin(intersect)
// Animate to top button
Alpine.data('backToTop', () => ({
    visible: false,

    init() {
        window.addEventListener('scroll', () => {

            if (window.scrollY > 500 && !this.visible) {

                this.visible = true;

                gsap.to(this.$refs.buttonToTop, {
                    opacity: 1,
                    y: 0,
                    pointerEvents: "auto",
                    duration: 0.3,
                    ease: "power2.out"
                });

            }

            if (window.scrollY <= 500 && this.visible) {

                this.visible = false;

                gsap.to(this.$refs.buttonToTop, {
                    opacity: 0,
                    y: 20,
                    pointerEvents: "none",
                    duration: 0.3,
                    ease: "power2.in"
                });

            }


        });
    }

}));

Alpine.start()


document.addEventListener("DOMContentLoaded", () => {
    createIcons({icons});

    window.HSStaticMethods?.autoInit();
});
