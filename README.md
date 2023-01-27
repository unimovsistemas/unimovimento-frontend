<h1 align="center"> UNIMOVIMENTO FRONTEND </h1>
<h2 align="center"> 💻 Sistema para Interação com Usuário para Gerenciamento do Uni Movimento 💻</h2>

<h3 align="center">***********🔧 INSTRUçÕES 🔧***********</h3>

### Versão do projeto
1.0.0

### Links Úteis
- Repositório backend: https://github.com/unimovsistemas/unimovimento-backend
- Repositório frontend: https://github.com/unimovsistemas/unimovimento-frontend
- Discovery: https://miro.com/app/board/uXjVOhGfNZ0=/

### Orientações para Desenvolvimento

- Clonar o repositório para sua máquina, de preferência pelo link SSH. Veja mais: https://docs.github.com/en/authentication/connecting-to-github-with-ssh
- Não commitar diretamente na branch main.
- Criar branch para cada demanda que irá atuar, seguindo sempre a nomenclatura na seção **Informações sobre as branches** neste documento.
 Todos os merges para a branch main serão mediantes a aprovação de PullRequest. Portanto, todo PullRequest deverá possuir um Reviewer que irá realizar o Code Review.
- Seguir as boas práticas de desenvolvimento baseadas no CleanCode, Padrões de Projeto e Arquitetura Limpa.
- Criar componentes, variáveis, serviços, interfaces... com nomeclaturas em inglês;
- Componentes na pasta `_components`;
- Serviços na pasta `_services`;
- Interfaces na pasta `_interfaces`
- Auths na pasta `_auths`
- Views na pasta `_views`
- Não commite arquivos de propriedades/configurações (Ex: application.properties, pom.xml, system.properties, etc), exceto se fizer parte da implementação que você está trabalhando.
- Você pode adicionar novas recomendações aqui que podem ser úteis ao longo do desenvolvimento para outros devs.

### Requisitos

| Ferramenta | Versão |
| ------ | ------ |
| Angular | 11.2.1 |
| Node | 16.15.0 |

- Clonar projeto do git para sua máquina.
- Dentro da pasta do projeto clonado abrir o cmd e utilizar o comando abaixo:

```
npm install
```
- Apos a instalação do npm, utilizar um dos comandos abaixo para start da aplicação:
```
ng serve
npm start
```
#

### Fluxo do desenvolvimento

- Ingressar na tarefa que você quer desenvolver no board do Trello entrando no card da tarefa e clicando no botão `Ingressar`.

- Mover a tarefa para a coluna `Doing` e criar um branch com o número da sua tarefa em letras minúsculas, por exemplo `task01`.

- Ao finalizar o desenvolvimento da tarefa, fazer commit (em português) das suas alterações na branch criada no passo anterior conforme exemplo: " task01 - Atualização README.md  "

- Subir as alterações para o repositório remoto.

- No Git será necessário fazer o Pull Request conforme abaixo:
    - Entrar na aba Pull Requests;
    - Clicar no botão `New pull request`;
    - Dentro de `Compare changes` selecionar sua branch conforme exemplo: `compare: <<Selecionar sua branch>>`;
    - Clicar em `Create new pull request`.

- Marcar o Product Owner do squad para aprovar o pull request;

- Mover a tarefa para coluna `Code review` no Trello.

### Execução

Orientações para execução do programa:
- Após clonar o repositório, execute o comando ***npm install***
- Após a instalação das dependências, execute o comando ***npm run start***

### Usabilidade

- Por padrão, ao executar o frontend a porta utilizada é a 4200. Então acesse em seu browser http://localhost:4200/

### Tecnologias utilizadas

- Angular Cli: 11.2.1 -> https://angular.io/cli

- Node: 16.15.0 -> https://nodejs.org/pt-br/download/

### Informações sobre as branchs

- Erros: bugfix/unimovf01
- Implementações: feature/unimovf02

## Build

Execute`ng build` para buildar o projeto. Os artefatos serão gravados no diretório `dist/`. Use `--prod` para buildar em modo produção.

## Rodando testes

Execute `ng test` para rodar os testes unitários via [Karma](https://karma-runner.github.io).

### 🏗️ Em Construção...🏗️
