
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
      selectElement.innerHTML = '<option value="" disabled selected>Selecione um país</option>';

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