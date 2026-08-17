//
import 'preline'
import "flag-icons/css/flag-icons.min.css";

import {createIcons, icons} from 'lucide';

import Alpine from 'alpinejs'
import {intersect} from "@alpinejs/intersect";
import gsap from "gsap";
import axios from "axios";

window.axios = axios;
window.Alpine = Alpine

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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
// Radio

const radioAudio = document.getElementById('radio-audio');
const radioToggle = document.getElementById('radio-toggle');
const radioStatus = document.getElementById('radio-status');

const radioPlayIcon = document.getElementById('radio-play-icon');
const radioPauseIcon = document.getElementById('radio-pause-icon');

if (radioAudio && radioToggle) {

    radioToggle.addEventListener('click', async () => {

        if (radioAudio.paused) {

            try {

                await radioAudio.play();

                radioPlayIcon.classList.add('hidden');
                radioPauseIcon.classList.remove('hidden');

                radioStatus.textContent = 'Live';
                radioStatus.classList.remove('badge-ghost');
                radioStatus.classList.add('badge-success');

            } catch (error) {

                console.error('Unable to play radio:', error);

                radioStatus.textContent = 'Error';
                radioStatus.classList.remove('badge-ghost');
                radioStatus.classList.add('badge-error');

            }

        } else {

            radioAudio.pause();

            radioPlayIcon.classList.remove('hidden');
            radioPauseIcon.classList.add('hidden');

            radioStatus.textContent = 'Paused';
            radioStatus.classList.remove('badge-success');
            radioStatus.classList.add('badge-warning');

        }

    });


    radioAudio.addEventListener('waiting', () => {

        radioStatus.textContent = 'Buffering...';

    });


    radioAudio.addEventListener('playing', () => {

        radioStatus.textContent = 'Live';

        radioStatus.classList.remove(
            'badge-ghost',
            'badge-warning',
            'badge-error'
        );

        radioStatus.classList.add('badge-success');

    });


    radioAudio.addEventListener('error', () => {

        radioStatus.textContent = 'Unavailable';

        radioStatus.classList.remove(
            'badge-ghost',
            'badge-success',
            'badge-warning'
        );

        radioStatus.classList.add('badge-error');

    });

}
