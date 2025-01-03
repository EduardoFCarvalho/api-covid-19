"use strict";
const domContentLoaded = (function () {
    let domContentLoadedPromise = null;
    function setup() {
        domContentLoadedPromise = new Promise((resolve) => {
            document.addEventListener('DOMContentLoaded', () => {
                resolve(true);
            });
        });
    }
    return {
        getPromise: function () {
            if (!domContentLoadedPromise) {
                setup();
            }
            return domContentLoadedPromise;
        }
    };
})();
