# Responsive Book Catalog PWA

Catálogo de livros responsivo desenvolvido como Progressive Web App. O projeto apresenta diferentes categorias literárias em cards adaptáveis e pode ser instalado no dispositivo ou acessado offline após o primeiro carregamento.

## Funcionalidades

- Catálogo com dez sugestões de livros
- Layout responsivo com CSS Grid
- Cards adaptáveis ao espaço disponível
- Menu horizontal para desktop
- Menu recolhível para dispositivos móveis
- Manifesto para instalação como aplicativo
- Cache offline dos arquivos e imagens
- Atualização automática de versões antigas do cache

## Tecnologias

![HTML5](https://img.shields.io/badge/HTML5-Markup-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Grid-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![PWA](https://img.shields.io/badge/PWA-Offline-5A0FC8?logo=pwa&logoColor=white)

- HTML5 semântico
- CSS Grid e media queries
- JavaScript
- Web App Manifest
- Service Worker e Cache API

## Responsividade

O catálogo utiliza:

```css
grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
```

Essa configuração distribui os cards automaticamente conforme a largura disponível. Em telas de até `768px`, a navegação é substituída por um menu recolhível.

## Recursos PWA

O arquivo `manifest.json` define nome, cores, ícones e modo de exibição independente. O service worker aplica uma estratégia **cache first**:

1. Armazena a interface e todas as capas durante a instalação.
2. Responde com o recurso em cache quando disponível.
3. Consulta a rede quando o recurso ainda não está armazenado.
4. Remove versões antigas do cache durante a ativação.

## Estrutura

```text
responsive-book-catalog-pwa/
|-- img/
|   |-- icon.svg
|   `-- livro1.jpg ... livro10.jpg
|-- index.html
|-- manifest.json
|-- service_worker.js
|-- style.css
`-- README.md
```

## Como executar

Service workers exigem um contexto seguro, como `localhost` ou HTTPS. Na raiz do projeto, inicie um servidor estático:

```bash
npx serve .
```

Acesse o endereço exibido no terminal.

Também é possível usar a extensão Live Server do Visual Studio Code.

## Como testar a PWA

1. Abra o projeto pelo servidor local.
2. Acesse as ferramentas de desenvolvimento do navegador.
3. Em **Application**, confira o manifesto e o service worker.
4. Recarregue a página para concluir o primeiro cache.
5. Ative o modo offline e recarregue novamente.
6. Use a opção de instalação disponibilizada pelo navegador.

## Destaques técnicos

- Interface construída sem frameworks
- Layout fluido com quantidade dinâmica de colunas
- Cache dos recursos essenciais para navegação offline
- Caminhos relativos compatíveis com hospedagem em subdiretórios
- Ícone vetorial escalável para instalação em diferentes dispositivos

## Contexto acadêmico

Projeto desenvolvido na disciplina de Desenvolvimento de Plataformas Móveis para praticar responsividade com CSS Grid e fundamentos de Progressive Web Apps.

**Autora:** Sofya Andrade
