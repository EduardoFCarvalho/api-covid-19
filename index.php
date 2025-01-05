<?php include 'modules/seo.php' ?>

</head>

<body>
  <?php include 'modules/header.php' ?>

  <section class="banner-area">

    <div class="container h-100 section-padding">
      <div class="row h-100 justify-content-center">
        <div class="col-12 banner-content">
          <h1>Covid 19 no Mundo</h1>
          <p>A Covid-19 é uma infecção respiratória aguda causada pelo coronavírus SARS-CoV-2, potencialmente grave, de elevada transmissibilidade e de distribuição global. O SARS-CoV-2 é um betacoronavírus descoberto em amostras de lavado broncoalveolar obtidas de pacientes com pneumonia de causa desconhecida na cidade de Wuhan, província de Hubei, China, em dezembro de 2019.</p>
        </div>


      </div>
    </div>

  </section>

  <section>
    <div class="container section-padding">
      <div class="row">
        <div class="col-12">
          <h2>Conheça mais sobre os casos e obtos ocorridos</h2>
          <p>Desde o primeiro registro da doença no país, em fevereiro de 2020, o mundo sofreu uma explosão de casos e obitos.</p>
          <p>Veja os principais dados sobre o Covid-19 no mundo escolhendo uma das opções abaixo:</p>
        </div>

        <div class="col-12 ">
          <form id="selectOne" class="countryForm" action="#" method="get">
            <label for="country">Selecione um país:</label>
            <select id="country">
              <option value="">Selecione um país</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="Australia">Australia</option>
            </select>
          </form>

          <div class="row justify-content-center pt-5">
            <!-- Cards de casos de obitos -->
            <div class="ref"></div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <section>
    <div class="container section-padding">
      <div class="row">

        <div class="col-12">
          <h2>Comparando os casos entre paises</h2>
          <p>A pandemia de COVID-19 marcou um dos períodos mais desafiadores da história recente, afetando sociedades de formas variadas. A comparação de casos ao redor do mundo é uma ferramenta valiosa para entender as dinâmicas de disseminação do vírus, os fatores que influenciaram as curvas de contágio e as estratégias de combate adotadas por diferentes países.</p>
          <p>Selecione abaixo os dois paises que deseja comparar:</p>
        </div>

        <div class="col-6">
          <form class="countryForm" action="#" method="get">
            <label for="selectPais1">País 1:</label>
            <select id="selectPais1">
              <option value="">Carregando...</option>
            </select>
          </form>
        </div>

        <div class="col-6">
          <form class="countryForm" action="#" method="get">
            <label for="selectPais2">País 2:</label>
            <select id="selectPais2">
              <option value="">Carregando...</option>
            </select>
          </form>
        </div>

      </div>
    </div>
  </section>

  <?php include 'modules/cta.php' ?>

  <?php include 'modules/footer.php' ?>

  <?php include 'modules/js.geral.php' ?>


  <!-- <script>
    // Função que faz as requisições AJAX
    const formsSelects = document.querySelectorAll('form select');

    formsSelects.forEach(formSelect => {
      formSelect.addEventListener('change', () => {
        // Encontra o formulário relacionado
        const form = formSelect.closest('form');

        // Obtém o valor do país selecionado
        const selectedCountry = formSelect.value;

        // Faz a requisição para a API com o país selecionado
        fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${selectedCountry}`)
          .then(response => response.json())
          .then(data => {
            // Inicializa variáveis para os totais
            let totalConfirmados = 0;
            let totalMortos = 0;

            // Itera sobre o objeto para calcular os totais
            Object.values(data).forEach(entry => {
              totalConfirmados += entry.Confirmados || 0;
              totalMortos += entry.Mortos || 0;
            });

            // Seleciona os elementos onde os dados serão exibidos
            const tabela1 = document.querySelector(`[data-tabela1]`);
            const tabela2 = document.querySelector(`[data-tabela2]`);

            // Atualiza os valores nas tabelas
            tabela1.innerHTML = `Casos confirmados: ${totalConfirmados}`;
            tabela2.innerHTML = `Óbitos: ${totalMortos}`;
          })
          .catch(error => {
            console.error("Erro ao buscar os dados:", error);
          });
      });
    });
  </script> -->

  <script>
    // Função que faz as requisições AJAX
    const formsSelects = document.querySelectorAll('form select');

    formsSelects.forEach(formSelect => {
      formSelect.addEventListener('change', () => {
        const form = formSelect.closest('form');
        const refContainer = form.nextElementSibling.querySelector('.ref');

        // Limpar lista anterior
        let previousSibling = refContainer.previousElementSibling;
        while (previousSibling && previousSibling !== form) {
          const elementToRemove = previousSibling;
          previousSibling = previousSibling.previousElementSibling;
          elementToRemove.remove();
        }

        const selectedCountry = formSelect.value;

        fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${selectedCountry}`)
          .then(response => response.json())
          .then(data => {
            let totalConfirmados = 0;
            let totalMortos = 0;

            Object.values(data).forEach(entry => {
              totalConfirmados += entry.Confirmados || 0;
              totalMortos += entry.Mortos || 0;
            });

            // Card Casos
            const cardCasos = document.createElement('div');
            cardCasos.classList.add('col-12', 'col-md-6', 'col-lg-5', 'mb-5');
            cardCasos.innerHTML = `
          <div class="card casos">
            <span class="card-title">Total de casos confirmados</span>
            <div class="card-body">
              <p class="card-text">${totalConfirmados.toLocaleString('pt-BR')}</p>
            </div>
          </div>
        `;
            refContainer.insertAdjacentElement('beforebegin', cardCasos);

            // Card obitos
            const cardObitos = document.createElement('div');
            cardObitos.classList.add('col-12', 'col-md-6', 'col-lg-5', 'mb-5');
            cardObitos.innerHTML = `
          <div class="card obitos">
            <span class="card-title">Total de óbitos</span>
            <div class="card-body">
              <p class="card-text">${totalMortos.toLocaleString('pt-BR')}</p>
            </div>
          </div>
        `;
            refContainer.insertAdjacentElement('beforebegin', cardObitos);

            // Cards estados
            Object.values(data).forEach(entry => {
              const cardEstado = document.createElement('div');
              cardEstado.classList.add('col-6', 'col-md-4', 'col-lg-3', 'mb-3');
              cardEstado.innerHTML = `
            <div class="card">
              <span class="card-title">${entry.ProvinciaEstado || 'Desconhecido'}</span>
              <div class="card-body">
                <p class="card-text"><i class="check fa-solid fa-check"></i> ${entry.Confirmados.toLocaleString('pt-BR') || 0}</p>
                <p class="card-text"><i class="cross fa-solid fa-cross"></i> ${entry.Mortos.toLocaleString('pt-BR') || 0}</p>
              </div>
            </div>
          `;
              refContainer.insertAdjacentElement('beforebegin', cardEstado);
            });
          })
          .catch(error => {
            console.error("Erro ao buscar os dados:", error);
            const errorElement = document.createElement('p');
            errorElement.classList.add('text-danger');
            errorElement.textContent = 'Erro ao carregar os dados. Tente novamente mais tarde.';
            refContainer.insertAdjacentElement('beforebegin', errorElement);
          });
      });
    });
  </script>
</body>

</html>