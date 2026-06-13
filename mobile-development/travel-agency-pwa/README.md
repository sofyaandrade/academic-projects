# Travel Agency PWA

Landing page responsiva para uma agência de viagens fictícia, desenvolvida como Progressive Web App. A interface apresenta a empresa, seus serviços e canais de contato em uma experiência adaptável a dispositivos móveis e disponível offline.

## Funcionalidades

- Banner de apresentação em tela cheia
- Navegação por seções da página
- Apresentação institucional da agência
- Cards de pacotes e serviços turísticos
- Menu recolhível em dispositivos móveis
- Layout responsivo com Flexbox
- Instalação como aplicativo
- Cache offline da interface e das imagens

## Tecnologias

![HTML5](https://img.shields.io/badge/HTML5-Markup-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Flexbox-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![PWA](https://img.shields.io/badge/PWA-Offline-5A0FC8?logo=pwa&logoColor=white)

- HTML5 semântico
- CSS Flexbox e media queries
- JavaScript
- Web App Manifest
- Service Worker e Cache API

## Seções da página

- **Início:** apresentação dos pacotes nacionais e internacionais
- **Sobre:** resumo institucional da Mundo Viagens
- **Serviços:** viagens nacionais, internacionais, hospedagem e guias
- **Contato:** canais para atendimento

## Responsividade

A interface utiliza Flexbox para distribuir conteúdo e cards. Em telas de até `768px`:

- O menu horizontal é substituído por um menu recolhível.
- A seção institucional passa de duas colunas para uma coluna.
- A imagem ocupa toda a largura disponível.
- Os cards são reorganizados conforme o espaço da tela.

## Recursos PWA

O manifesto permite abrir o site em modo independente e define ícones para instalação. O service worker utiliza uma estratégia **cache first**, armazenando:

- Documento HTML
- Folha de estilos
- Manifesto
- Ícones da aplicação
- Banner e imagens das seções

Os caminhos relativos permitem hospedar a aplicação em subdiretórios, incluindo GitHub Pages.

## Estrutura

```text
travel-agency-pwa/
|-- img/
|   |-- banner.jpg
|   |-- icon.svg
|   |-- img1.jpg
|   `-- servico1.jpg ... servico3.jpg
|-- index.html
|-- manifest.json
|-- service_worker.js
|-- style.css
`-- README.md
```

## Como executar

Service workers exigem `localhost` ou uma conexão HTTPS. Na raiz do projeto, execute:

```bash
npx serve .
```

Acesse o endereço informado pelo servidor.

Também é possível utilizar a extensão Live Server do Visual Studio Code.

## Como testar a PWA

1. Abra o projeto por um servidor local.
2. Acesse a seção **Application** das ferramentas do navegador.
3. Verifique o manifesto e o registro do service worker.
4. Recarregue a página para armazenar os recursos.
5. Ative o modo offline e confirme que a interface continua disponível.
6. Teste a instalação da aplicação pelo navegador.

## Destaques técnicos

- Página única com navegação interna por âncoras
- Header fixo e seções em tela cheia
- Cards flexíveis para diferentes resoluções
- Menu móvel controlado por JavaScript
- Cache offline de todos os recursos essenciais
- Caminhos compatíveis com implantação em subdiretórios

## Contexto acadêmico

Projeto desenvolvido na disciplina de Desenvolvimento de Plataformas Móveis para praticar Flexbox, responsividade e fundamentos de Progressive Web Apps.

**Autora:** Sofya Andrade
