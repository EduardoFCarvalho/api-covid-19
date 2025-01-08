# API COVID 19

## Introdução

Esta interface tem como objetivo disponibilizar para o usuário uma forma de obter informações sobre os casos confirmados e óbitos em decorrência da COVID-19 no mundo. 
Dentre os principais processos estão sendo empregados consumo de API, gerenciamento/tratamento de informação e armazenamento de dados em banco.

## Ferramentas utilizadas e suas versões

- Laragon (uma alternativa é o Xampp) [PHP 7.4+]
- Visual Studio Code [1.96.2]
- phpMyAdmin [5.2.1]

Caso você não possua as ferramentas instaladas em seu computador é recomendável o download sempre nos sites oficiais.

## Tecnologias

### Para o Frontend
- HTML, CSS e JS

### Para o Backend
- PHP e mySql

## Objetivos do Projeto

- [x] Permitir escolher três países (Brazil, Canada ou Australia) e a partir do retorno da API dispor valores totais de casos confirmados e óbitos do país, assim como os valores totais de cada estado do país respectivo
- [x] Armazenar no banco de dados as informações dos países escolhidos com data e hora da requisição
- [x] A página ser criada com HTML, CSS e JS. E no seu rodapé exibir a informação do ultimo país pesquisado junto com a data dessa busca

Bônus: 
- [x] Disponibilizar para o usuário a possibilidade de escolher dois países de uma lista mais completa, dessa busca exibir o total de casos e óbitos de cada e exibir também a diferença da taxa de mortes entre eles.

## Procedimentos

### Arquivos
Baixe os arquivo ZIP ou clone o repositório dentro do seu ambiente de desenvolvimento (pasta www do Laragon ou htdocs do Xampp)

```sh
git clone https://github.com/EduardoFCarvalho/api-covid-19.git
```

### Ambiente de desenvolvimento e banco de dados
Abra e inicie seu gerenciador do ambiente de desenvolvimento, clique em admin / Banco de dados para acessar o phpMyAdmin

Obs: Normalmente por padrão o Xampp já vem com esse gerenciador, mas se você estiver usando o Laragon pode ser necessário uma rápida configuração, para saber mais acesse o tutorial a seguir:

[https://www.youtube.com/watch?v=nCofk11geHI](https://www.youtube.com/watch?v=nCofk11geHI)

No phpMyAdmin crie um novo banco, no projeto foi utilizado o nome de access-api-covid19, mas você pode usar o de sua preferência

Após criar, acessa-lo e carregar o arquivo .sql que está pasta Extras, este contém a estrutura do banco

Em seguida entre no diretório Modules no arquivo Config e vá até a seção correspondente de configurações de conexão do banco e cheque se estão alinhadas com o que você criou, se necessário ajuste

### Utilizando em ambiente local

Concluindo os passos anteriores e confirmando que seu gerenciador de ambientes está ativo

Vamos ajustar a tag base do projeto para uma visualização correta, se necessário

No navegador acesse localhost/caminho (nome da pasta) que se encontra os arquivos
Exemplo: [http://localhost/api-covid-19](http://localhost/api-covid-19)

Se o carregamento da página apresentar falhas na visualização mas os textos estiverem aparecendo, copie o link completo dessa página, nos arquivos na pasta modules em config atualize o parâmetro definido CONF_TAG_BASE para o ambiente local.

Atualize a página e estará pronto para uso.


## Informações adicionais

No responsivo ao mudar a resolução de tela, atualizar a página para que todas as funcionalidade funcionem adequadamente, como o intuito não é trabalhar com alterações da largura da tela de forma constante preferi uma abordagem que utilizasse menos memória do navegador evitando assim o uso de funções de monitoramento.
