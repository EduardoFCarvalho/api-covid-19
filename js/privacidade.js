"use strict";
async function runPrivacity() {
    const domLoaded = await domContentLoaded.getPromise();
    if (domLoaded) {

        if (!sessionStorage.lgpd && !localStorage.lgpd) {
            const btnLGPD = document.querySelector('.accept');
            const boxLGPD = document.querySelector('.lgpd');
            // console.log(btnLGPD);
            boxLGPD.style.display = 'block';

            btnLGPD.addEventListener('click', function () {
                localStorage.setItem("lgpd", 'ok');
                sessionStorage.setItem("lgpd", 'ok');
                boxLGPD.style.display = 'none';
            })
        }

    }
} runPrivacity()