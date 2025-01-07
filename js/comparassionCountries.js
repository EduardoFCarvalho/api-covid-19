const selectPais1 = document.getElementById('selectPais1');
const selectPais2 = document.getElementById('selectPais2');

selectPais2.disabled = true;

// Função restaura opções comparação lista 2
function resetOptionsDisplay(select) {
  const options = select.options;
  for (let i = 0; i < options.length; i++) {
    options[i].style.display = 'block';
  }
}

selectPais1.addEventListener('change', () => {
  resetOptionsDisplay(selectPais2);

  if (selectPais1.value) {
    selectPais2.disabled = false;

    const selectedValue = selectPais1.value;
    const options = selectPais2.options;

    for (let i = 0; i < options.length; i++) {
      if (options[i].value === selectedValue) {
        options[i].style.display = 'none';
      }
    }
  }
});

function calcularTaxaMortes() {

  const totalConfirmados1 = parseFloat(document.querySelector('#comparOne #totalConfirmados')?.textContent.replace(/\./g, '').replace(',', '.') || 0);
  const totalMortos1 = parseFloat(document.querySelector('#comparOne #totalMortos')?.textContent.replace(/\./g, '').replace(',', '.') || 0);

  const totalConfirmados2 = parseFloat(document.querySelector('#compartwo #totalConfirmados')?.textContent.replace(/\./g, '').replace(',', '.') || 0);
  const totalMortos2 = parseFloat(document.querySelector('#compartwo #totalMortos')?.textContent.replace(/\./g, '').replace(',', '.') || 0);


  const taxaMortes1 = totalMortos1 / totalConfirmados1 || 0;
  const taxaMortes2 = totalMortos2 / totalConfirmados2 || 0;


  let diferencaTaxas = Math.abs((taxaMortes1 - taxaMortes2) * 100);
    

  const comparResultContainer = document.querySelector('.comparResult .ref');
  let cardTaxa = document.querySelector('.comparResult .taxa-card');

  if (!cardTaxa) {
    cardTaxa = document.createElement('div');
    cardTaxa.classList.add('col-12', 'col-md-6', 'col-lg-5', 'mb-5', 'taxa-card');
    comparResultContainer.insertAdjacentElement('beforebegin', cardTaxa);
  }

  cardTaxa.innerHTML = `
    <div class="card taxa">
      <span class="card-title">Diferença de Taxa de Mortes</span>
      <div class="card-body">
        <p class="card-text">${diferencaTaxas.toFixed(2)}%</p>
      </div>
    </div>
  `;
}

function monitorarSelects() {
  const selectPais1 = document.querySelector('#selectPais1');
  const selectPais2 = document.querySelector('#selectPais2');

  const debounceCallback = debounce(() => {
    const cardPais1 = document.querySelector('#comparOne #totalConfirmados');
    const cardPais2 = document.querySelector('#compartwo #totalConfirmados');

    if (cardPais1 && cardPais2) {
      calcularTaxaMortes();
    }
  }, 300); // Evitar chamadas frequentes

  selectPais1.addEventListener('change', debounceCallback);
  selectPais2.addEventListener('change', debounceCallback);
}

// Função debounce para limitar a frequência das chamadas
function debounce(func, delay) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), delay);
  };
}

document.addEventListener('DOMContentLoaded', monitorarSelects);
