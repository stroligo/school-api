# School API

Este projeto é uma API RESTful para gerenciar informações de uma escola, incluindo alunos, professores, cursos e matrículas. A API permite realizar operações CRUD (Criar, Ler, Atualizar e Excluir) em diversas entidades da escola.

## Tecnologias Utilizadas

-   **Laravel**: Framework PHP utilizado para desenvolver a API.
-   **MySQL/MariaDB**: Banco de dados relacional utilizado para armazenar as informações.
-   **Laravel Sanctum**: Sistema de autenticação simples para APIs.
-   **Eloquent ORM**: Para interação com o banco de dados de forma simples e eficiente.
-   **Docker**: Utilizado para criar um ambiente de desenvolvimento consistente e fácil de configurar.

## Docker

Este projeto utiliza o Docker para facilitar o processo de desenvolvimento, fornecendo um ambiente isolado para o Laravel, MySQL, Redis, Meilisearch, e outros serviços. O Docker garante que todos os desenvolvedores trabalhem com as mesmas versões de dependências e configurações, independentemente do sistema operacional.

### Serviços

O `docker-compose.yml` define os seguintes serviços:

-   **laravel.test**: O ambiente de execução do Laravel.
-   **mysql**: Servidor de banco de dados MySQL.
-   **redis**: Servidor Redis para cache e filas.
-   **meilisearch**: Serviço de busca.
-   **mailpit**: Ferramenta de teste de e-mail.
-   **selenium**: Serviço para testes automatizados com Selenium.

### Comandos Docker

Os seguintes comandos podem ser utilizados para interagir com o Docker:

-   `docker compose up -d`: Inicia os serviços.
-   `docker compose down`: Para os serviços.
-   `docker compose restart`: Reinicia os serviços.

## Instalação

1. Clone este repositório: git clone https://github.com/usuario/school-api.git

2. Instale as dependências: composer install

3. Configure o arquivo `.env` com as suas configurações de banco de dados.

4. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados.

5. Execute o comando `php artisan db:seed` para popular o banco de dados com dados de exemplo.

6. Execute o comando `php artisan serve` para iniciar o servidor da API.

## Rotas da API

A seguir, estão as rotas disponíveis no projeto. A API segue a arquitetura RESTful e possui os seguintes endpoints:

### Cursos (Courses)

-   **GET** `/api/courses`  
    Lista todos os cursos.

-   **POST** `/api/courses`  
    Cria um novo curso.

-   **GET** `/api/courses/{course}`  
    Exibe os detalhes de um curso específico.

-   **PUT/PATCH** `/api/courses/{course}`  
    Atualiza um curso específico.

-   **DELETE** `/api/courses/{course}`  
    Remove um curso específico.

### Matrículas (Enrollments)

-   **GET** `/api/enrollments`  
    Lista todas as matrículas.

-   **POST** `/api/enrollments`  
    Cria uma nova matrícula.

-   **GET** `/api/enrollments/student/{student_id}`  
    Exibe todos os cursos em que um aluno está matriculado.

-   **GET** `/api/enrollments/{enrollment}`  
    Exibe os detalhes de uma matrícula específica.

-   **PUT/PATCH** `/api/enrollments/{enrollment}`  
    Atualiza uma matrícula específica.

-   **DELETE** `/api/enrollments/{enrollment}`  
    Remove uma matrícula específica.

-   **DELETE** `/api/enrollments/{student_id}/{course_id}`  
    Remove um aluno de um curso específico.

### Alunos (Students)

-   **GET** `/api/students`  
    Lista todos os alunos.

-   **POST** `/api/students`  
    Cria um novo aluno.

-   **GET** `/api/students/{student}`  
    Exibe os detalhes de um aluno específico.

-   **PUT/PATCH** `/api/students/{student}`  
    Atualiza os dados de um aluno específico.

-   **DELETE** `/api/students/{student}`  
    Remove um aluno específico.

### Professores (Teachers)

-   **GET** `/api/teachers`  
    Lista todos os professores.

-   **POST** `/api/teachers`  
    Cria um novo professor.

-   **GET** `/api/teachers/{teacher}`  
    Exibe os detalhes de um professor específico.

-   **PUT/PATCH** `/api/teachers/{teacher}`  
    Atualiza os dados de um professor específico.

-   **DELETE** `/api/teachers/{teacher}`  
    Remove um professor específico.

### Autenticação

-   **GET** `/sanctum/csrf-cookie`  
    Retorna o token CSRF necessário para autenticação utilizando Laravel Sanctum.

### Armazenamento

-   **GET** `/storage/{path}`  
    Serve arquivos armazenados.

### Outros

-   **GET** `/up`  
    Retorna o status do servidor (geralmente utilizado para verificar se a aplicação está online).
