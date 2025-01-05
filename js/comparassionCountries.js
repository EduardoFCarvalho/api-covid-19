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