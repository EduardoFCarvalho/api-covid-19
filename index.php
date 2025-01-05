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

        <div class="col-12 mt-5">
          <form id="selectOne" class="countryForm" action="#" method="get">
            <label for="country">Selecione um país:</label>
            <select id="country">
              <option value="" disabled selected>Selecione um país</option>
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

        <div class="col-12 mb-5">
          <h2>Comparando os casos entre paises</h2>
          <p>A pandemia de COVID-19 marcou um dos períodos mais desafiadores da história recente, afetando sociedades de formas variadas. A comparação de casos ao redor do mundo é uma ferramenta valiosa para entender as dinâmicas de disseminação do vírus, os fatores que influenciaram as curvas de contágio e as estratégias de combate adotadas por diferentes países.</p>
          <p>Selecione abaixo os dois paises que deseja comparar:</p>
        </div>

        <div class="col-6">
          <form id="comparOne" class="countryForm totalonly" action="#" method="get">
            <label for="selectPais1">País 1:</label>
            <select id="selectPais1">
              <option value="">Carregando...</option>
            </select>
          </form>
          <div class="row justify-content-center pt-5">
            <!-- Cards de casos de obitos -->
            <div class="ref"></div>
          </div>
        </div>

        <div class="col-6">
          <form id="compartwo" class="countryForm totalonly" action="#" method="get">
            <label for="selectPais2">País 2:</label>
            <select id="selectPais2">
              <option value="">Carregando...</option>
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

  <?php include 'modules/cta.php' ?>

  <?php include 'modules/footer.php' ?>

  <?php include 'modules/js.geral.php' ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Requisição para buscar o último país pesquisado
      fetch('get_last_country.php')
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            const lastCountry = data.data.pais;
            const lastUpdated = new Date(data.data.updated_at).toLocaleString('pt-BR');

            // Exibir as informações na página
            const lastCountryElement = document.querySelector('#last-country');
            if (lastCountryElement) {
              lastCountryElement.innerHTML = `
            <p>Último país pesquisado: <strong>${lastCountry}</strong></p>
            <p>Última atualização: <strong>${lastUpdated}</strong></p>
          `;
            }
          } else {
            console.warn(data.message);
          }
        })
        .catch(error => {
          console.error('Erro ao buscar o último país:', error);
        });
    });
  </script>
</body>

</html>