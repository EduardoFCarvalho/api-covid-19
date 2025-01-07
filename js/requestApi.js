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

    // fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${selectedCountry}`)
    //   .then(response => response.json())
    fetch(`register_access.php?pais=${selectedCountry}`)
      .then(registerResponse => {
        if (!registerResponse.ok) {
          console.error('Erro ao registrar acesso no banco de dados');
        }
        return fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${selectedCountry}`);
      })
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
          <p id="totalConfirmados" class="card-text">${totalConfirmados.toLocaleString('pt-BR')}</p>
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
          <p id="totalMortos" class="card-text">${totalMortos.toLocaleString('pt-BR')}</p>
        </div>
      </div>
    `;
        refContainer.insertAdjacentElement('beforebegin', cardObitos);

        if (!form.classList.contains('totalonly')) {


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
        }
      })
      .catch(error => {
        console.error("Erro ao buscar os dados:", error);
        const errorElement = document.createElement('p');
        errorElement.classList.add('text-danger');
        errorElement.textContent = 'Erro ao carregar os dados. Selecione outro pais ou tente novamente mais tarde.';
        refContainer.insertAdjacentElement('beforebegin', errorElement);
      });
  });
});