async function runComonsScripts() {
  const domLoaded = await domContentLoaded.getPromise();
  if (domLoaded) {
    const headerMenu = document.querySelector('.header-menu-area');
    const btnToTop = document.querySelector('#back-top');
    let scrollDiff;

    function checkScrollYPosition(ev) {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      console.log(`scrollTop: ${scrollTop}`);

      scrollTop = Math.round(scrollTop); // arredonda para o valor inteiro mais próximo
      if (scrollDiff !== scrollTop) {
        scrollDiff = scrollTop
      } else {
        return false;
      }

      if (scrollTop > 250) {
        if (headerMenu) {
          headerMenu.classList.add('sticky-menu');
          // headerMenu.querySelector('.logo img').setAttribute('src', 'img/logo/logo1.png');
        }
        if (btnToTop) {
          btnToTop.classList.add('show');
        }
      } else {
        if (headerMenu) {
          headerMenu.classList.remove('sticky-menu');
          // headerMenu.querySelector('.logo img').setAttribute('src', 'img/logo/logo2.png');
        }
        if (btnToTop) {
          btnToTop.classList.remove('show');
        }
      }
    }

    if (headerMenu) {
      checkScrollYPosition();
    }

    if (btnToTop) {
      btnToTop.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    }

    // window.addEventListener('scroll', checkScrollYPosition);

  }
} runComonsScripts()
