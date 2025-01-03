async function runTopMenu() {
  const domLoaded = await domContentLoaded.getPromise();
  if (domLoaded) {

    const topMenu = document.getElementById('mobile-menu');

    if (topMenu) {
      topMenu.addEventListener('click', function () {
        var menuCont = document.querySelector('.header-menu-area');
        var navbar = document.querySelector('.navbar');
        var menuToggle = document.querySelector('.menu-toggle');
        menuCont.classList.toggle('showed')
        navbar.classList.toggle('show')
        menuToggle.classList.toggle('open')
        // navbar.style.display = (navbar.style.display === 'block') ? 'none' : 'block';
      });
    }
  }

} runTopMenu()