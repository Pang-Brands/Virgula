Tema para site Virgula

## Começando

Essas instruções fornecerão uma cópia do projeto completo em execução em sua máquina local para fins de desenvolvimento e teste.

O projeto pode ser construído com npm ou yarn, então escolha uma das abordagens abaixo caso você não tenha nenhuma instalada em seu sistema.

- O **Npm** é distribuído com o Node.js, o que significa que, quando você baixa o Node.js, automaticamente obtém o npm instalado em seu computador. [Download Node.js](https://nodejs.org/en/download/)
- O **Yarn** é um gerenciador de pacotes criado pela equipe do Facebook e parece ser mais rápido que o npm em geral. [Download Yarn](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)

É recomendado a utilização do **NVM** em seu projeto para evitar problemas de versões. Com o **NVM** a gente pode ver as versões do Node, escolher quais queremos instalar ou desisntalar e definir qual queremos usar em cada momento ou projeto. [Download NVM](https://www.treinaweb.com.br/blog/instalando-e-gerenciando-varias-versoes-do-node-js-com-nvm)

- No macOS, voce pode utilizar o código abaixo para acessar a sua instalação do NVM se nao aparecer a sua instalação no repositorio. Após isso, voce pode escolher a versão desejada e realizar os comandos normalmente.

```bash
  1. source ~/.bash_profile
  2. nvm use 14.15.0
```

## Setup

- Para baixar o projeto siga as instruções abaixo:

```bash
  1. git clone git@github.com:Pang-Brands/Virgula.git
  2. cd virgula
```

- Instale o Ruby ou RVM e depois o gerenciador de pacote(composer) e por ultimos as gemas:

```bash
  3. composer install
```

- Instale as dependências e inicie o servidor:

```bash
  6. yarn install
  7. yarn start
```

#### Ou

```bash
  6. npm install
  7. npm start
```

- Para compilar os minificados:

```bash
  9. yarn build
```

## Agradecimentos

Obrigado a equipe Pang Brands e a todos os envolvidos no projeto!
