<footer class="bg-dark footer-theme">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-4 mb-5">
                <div>
                    <a href="./">
                        <img src="img/logo/logo.png" alt="Logo api covid 19">
                    </a>
                    <p class="text-justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, fugit. Ad quaerat fugit quas nam nobis quam porro quis deleniti aspernatur, nesciunt nemo laudantium fuga vero voluptatem? Sed, necessitatibus iure!</p>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-5">
                <div class="links">
                    <h3 class="link-title">Links rápidos</h3>
                    <ul>
                        <li><a href="./">Home</a></li>
                        <li><a href="#">Sobre nós</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <div class="container copyr">
        <div class="row">
            <div class="col-12">
                <p class="text-center">&copy; Copyright <?= date('Y'); ?>. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>


    <!-- Scroll Up -->
    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="injected-svg" data-src="https://static.elfsight.com/icons/app-back-to-top-arrow-5.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M11.573 11.672a.615.615 0 0 1 .854 0l3.896 3.824a.578.578 0 0 1 0 .832.615.615 0 0 1-.853 0L12 12.92l-3.47 3.408a.615.615 0 0 1-.853 0 .578.578 0 0 1 0-.832zm0-4a.615.615 0 0 1 .854 0l3.896 3.824a.578.578 0 0 1 0 .832.615.615 0 0 1-.853 0L12 8.92l-3.47 3.408a.615.615 0 0 1-.853 0 .578.578 0 0 1 0-.832z"></path>
            </svg>
        </a>
    </div>

    <?php include_once 'modules/lgpd.php' ?>
</footer>