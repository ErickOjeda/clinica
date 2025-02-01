# Projeto Clínica - API

Este projeto consiste em uma API desenvolvida para gerenciar uma clínica. 

## Laravel Sail

Foi utilizado Laravel Sail no desenvolvimento dessa API para um ambiente de desenvolvimento mais consistente

## Populando o banco

Após rodar `php artisan migrate`, rode `php artisan db:seed` para popular o banco com informações de teste

## Funcionalidades Principais

### Cidades
- **Listar Cidades:** Retorna uma lista de todas as cidades cadastradas.
- **Listar Médicos de uma Cidade:** Retorna uma lista de médicos que atuam em uma cidade específica.

### Médicos
- **Listar Médicos:** Retorna uma lista de todos os médicos cadastrados.
- **Adicionar um Novo Médico:** Cadastra um novo médico no sistema.
- **Agendar Consulta:** Permite agendar uma consulta com um médico.
- **Listar Pacientes de um Médico:** Retorna uma lista de pacientes atendidos por um médico específico.

### Pacientes
- **Listar Pacientes de um Médico:** Retorna uma lista de pacientes atendidos por um médico específico.
- **Atualizar Paciente:** Permite atualizar as informações de um paciente.
- **Adicionar Paciente:** Cadastra um novo paciente no sistema.

### Autenticação
- **Login:** Autentica um usuário e retorna um token JWT.
- **Usuário:** Retorna as informações do usuário autenticado.
- **Logout:** Encerra a sessão do usuário.

## Rotas da API

### Autenticação
- **POST /login:** Autentica um usuário.
  ```php
  Router::post('/login', [LoginController::class, 'login']);
  ```

### Cidades
- **GET /cidades:** Lista todas as cidades.
  ```php
  Router::get('/cidades', [CidadeController::class, 'list']);
  ```
- **GET /cidades/{id_cidade}/medicos:** Lista médicos de uma cidade específica.
  ```php
  Router::get('/cidades/{id_cidade}/medicos', [CidadeController::class, 'listDoctors']);
  ```

### Médicos
- **GET /medicos:** Lista todos os médicos.
  ```php
  Router::get('/medicos', [Medicocontroller::class, 'list']);
  ```
- **POST /medicos:** Adiciona um novo médico (requer autenticação).
  ```php
  Router::post('/medicos', [Medicocontroller::class, 'create']);
  ```
- **POST /medicos/consulta:** Agenda uma consulta com um médico (requer autenticação).
  ```php
  Router::post('/medicos/consulta', [Medicocontroller::class, 'appointment']);
  ```
- **GET /medicos/{id_medico}/pacientes:** Lista pacientes de um médico específico (requer autenticação).
  ```php
  Router::get('/medicos/{id_medico}/pacientes', [Medicocontroller::class, 'doctorPatients']);
  ```

### Pacientes
- **POST /pacientes:** Adiciona um novo paciente (requer autenticação).
  ```php
  Router::post('/pacientes', [PacienteController::class, 'create']);
  ```
- **PUT /pacientes/{id_paciente}:** Atualiza as informações de um paciente (requer autenticação).
  ```php
  Router::put('/pacientes/{id_paciente}', [PacienteController::class, 'update']);
  ```

### Usuário
- **GET /user:** Retorna as informações do usuário autenticado (requer autenticação).
  ```php
  Router::get('/user', [LoginController::class, 'me']);
  ```
- **POST /logout:** Encerra a sessão do usuário (requer autenticação).
  ```php
  Router::post('/logout', [LoginController::class, 'logout']);
  ```

## Middleware de Autenticação

Todas as rotas que requerem autenticação são protegidas pelo middleware `jwt.verify`, que verifica a validade do token JWT fornecido pelo usuário e retorna mensagens personalizadas para cada erro possivel do token.

```php
Router::middleware('jwt.verify')->group(function () {
    // Rotas protegidas
});
```
