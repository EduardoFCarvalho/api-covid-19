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

    // Função para obter os dados da API
    async function obterPaisesCovid() {
      const url = "https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1";

      try {
        const resposta = await fetch(url);
        if (!resposta.ok) {
          throw new Error(`Erro na requisição: ${resposta.status}`);
        }
        const dados = await resposta.json();
        return dados;
      } catch (erro) {
        console.error("Erro ao obter dados da API:", erro);
        return null;
      }
    }

    // Função para preencher um select com os países
    function preencherSelect(selectElement, paises) {
      selectElement.innerHTML = '<option value="">Selecione um país</option>';

      Object.keys(paises).forEach(chave => {
        const pais = paises[chave];
        const option = document.createElement("option");
        option.value = pais;
        option.textContent = pais;
        selectElement.appendChild(option);
      });
    }

    // Função principal para preencher os dois selects
    async function preencherSelectsComparativos() {
      const paises = await obterPaisesCovid();
      if (paises) {
        const select1 = document.getElementById("selectPais1");
        const select2 = document.getElementById("selectPais2");

        preencherSelect(select1, paises);
        preencherSelect(select2, paises);
      } else {
        document.getElementById("selectPais1").innerHTML = '<option value="">Erro ao carregar países</option>';
        document.getElementById("selectPais2").innerHTML = '<option value="">Erro ao carregar países</option>';
      }
    }

    preencherSelectsComparativos();


  }
} runComonsScripts()
