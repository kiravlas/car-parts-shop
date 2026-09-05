import 'preline'
import "flag-icons/css/flag-icons.min.css";

import {createIcons, icons} from 'lucide';

import Alpine from 'alpinejs'
import {intersect} from "@alpinejs/intersect";
import gsap from "gsap";
import axios from "axios";

window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.plugin(intersect);


// =========================================================
// WISHLIST STORE
// =========================================================

Alpine.store('wishlist', {

    count: 0,

    productIds: [],

    loading: false,


    // -----------------------------------------------------
    // Initialize store from Laravel
    // -----------------------------------------------------

    initData(productIds = [], count = 0) {

        this.productIds = productIds.map(Number);

        this.count = Number(count);

    },


    // -----------------------------------------------------
    // Check if product is liked
    // -----------------------------------------------------

    isLiked(productId) {

        return this.productIds.includes(Number(productId));

    },


    // -----------------------------------------------------
    // Update store after toggle
    // -----------------------------------------------------

    update(productId, isLiked, totalCount) {

        productId = Number(productId);

        if (isLiked) {

            if (!this.productIds.includes(productId)) {
                this.productIds.push(productId);
            }

        } else {

            this.productIds = this.productIds.filter(
                id => id !== productId
            );

        }

        this.count = Number(totalCount);

    },


    // -----------------------------------------------------
    // Remove product from store
    // -----------------------------------------------------

    remove(productId, totalCount = null) {

        productId = Number(productId);

        this.productIds = this.productIds.filter(
            id => id !== productId
        );

        if (totalCount !== null) {
            this.count = Number(totalCount);
        } else if (this.count > 0) {
            this.count--;
        }

    }

});

// =========================================================
// CART STORE
// =========================================================

Alpine.store('cart', {

    // Total number of products/units in the cart.
    // Example:
    // 1 brake pad + 2 oil filters = 3
    count: 0,


    // -----------------------------------------------------
    // Initialize store from Laravel
    // -----------------------------------------------------

    initData(count = 0) {

        this.count = Number(count);

    },


    // -----------------------------------------------------
    // Update cart counter
    // -----------------------------------------------------

    updateCount(count) {

        this.count = Math.max(
            0,
            Number(count)
        );

    },


    // -----------------------------------------------------
    // Increase cart counter
    // -----------------------------------------------------

    increase(amount = 1) {

        this.count = Math.max(
            0,
            this.count + Number(amount)
        );

    },


    // -----------------------------------------------------
    // Decrease cart counter
    // -----------------------------------------------------

    decrease(amount = 1) {

        this.count = Math.max(
            0,
            this.count - Number(amount)
        );

    },


    // -----------------------------------------------------
    // Clear cart
    // -----------------------------------------------------

    clear() {

        this.count = 0;

    }

});


// =========================================================
// BACK TO TOP
// =========================================================

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


Alpine.start();


document.addEventListener("DOMContentLoaded", () => {

    createIcons({icons});

    window.HSStaticMethods?.autoInit();

});


// =========================================================
// RADIO
// =========================================================

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
