# Fitness Assessment System

Sistema web para gerenciamento de alunos e avaliações físicas de uma academia. A aplicação centraliza dados cadastrais e indicadores corporais, oferecendo uma interface autenticada para acompanhar registros de peso, altura, percentual de gordura e massa muscular.

## Funcionalidades

- Autenticação de usuários
- Cadastro, edição e exclusão de alunos
- Busca de alunos por nome
- Cadastro e gerenciamento de avaliações físicas
- Associação de múltiplas avaliações a cada aluno
- Registro de peso, altura, gordura corporal e massa muscular
- Paginação das listagens
- Validação dos dados enviados pelos formulários
- Exclusão em cascata das avaliações ao remover um aluno

## Tecnologias

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Database-4169E1?logo=postgresql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6-646CFF?logo=vite&logoColor=white)

- **Back-end:** PHP, Laravel e Eloquent ORM
- **Front-end:** Blade, Bootstrap, Tailwind CSS e Alpine.js
- **Banco de dados:** PostgreSQL
- **Build:** Vite e npm
- **Testes:** PHPUnit

## Arquitetura

O projeto segue o padrão MVC do Laravel:

- **Models:** representam alunos, avaliações físicas e usuários
- **Views:** interfaces Blade para autenticação, painel e operações de cadastro
- **Controllers:** concentram validações e regras dos fluxos de alunos e avaliações
- **Migrations:** versionam a estrutura do banco e seus relacionamentos
- **Routes:** expõem recursos REST protegidos por autenticação

## Modelo de dados

```mermaid
erDiagram
    ALUNOS ||--o{ AVALIACOES_FISICAS : possui

    ALUNOS {
        bigint id PK
        string nome
        string email UK
        date data_nascimento
        string telefone
    }

    AVALIACOES_FISICAS {
        bigint id PK
        bigint aluno_id FK
        date data_avaliacao
        decimal peso
        decimal altura
        decimal gordura_corporal
        decimal massa_muscular
        text observacoes
    }
```

## Como executar

### Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e npm
- PostgreSQL

### Instalação

1. Entre na pasta do projeto e instale as dependências:

```bash
composer install
npm install
```

2. Crie o arquivo de ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

No Windows PowerShell, use `Copy-Item .env.example .env`.

3. Configure a conexão no arquivo `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=fitness_assessment
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

4. Crie as tabelas e o usuário de demonstração:

```bash
php artisan migrate --seed
```

5. Inicie o back-end:

```bash
php artisan serve
```

6. Em outro terminal, inicie o Vite:

```bash
npm run dev
```

A aplicação estará disponível em `http://localhost:8000`.

## Acesso de demonstração

```text
E-mail: admin@academia.com
Senha: senha123
```

As credenciais são destinadas exclusivamente ao ambiente local.

## Testes

```bash
php artisan test
```

## Estrutura principal

```text
app/
├── Http/Controllers/     # Fluxos de alunos e avaliações
└── Models/               # Entidades e relacionamentos
database/
├── migrations/           # Estrutura do banco de dados
└── seeders/              # Usuário inicial
resources/views/
├── alunos/               # Telas de gerenciamento de alunos
├── avaliacoes/           # Telas de avaliações físicas
└── layouts/              # Layout da aplicação
routes/
└── web.php               # Rotas web protegidas
```

## Destaques técnicos

- Rotas RESTful com `Route::resource`
- Relacionamento um-para-muitos com Eloquent ORM
- Proteção de rotas por middleware de autenticação
- Validação de dados no servidor
- Reutilização de formulários com partials Blade
- Integridade referencial por chave estrangeira e exclusão em cascata
