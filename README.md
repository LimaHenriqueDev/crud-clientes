<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">📞 Agenda de Contatos</h2>

> Aplicação web desenvolvida em Laravel para gerenciamento de contatos pessoais. Cada usuário pode gerenciar seus próprios contatos de forma segura e organizada.

---

## ⚙️ Tecnologias Utilizadas

- PHP 8.x
- Laravel 10.x
- Blade (views)
- Bootstrap 5
- MySQL ou PostgreSQL
- Autenticação nativa com Laravel Auth (`Auth::attempt`, `Auth::login`, etc.)

---

## 📋 Funcionalidades

- Cadastro e login de usuários
- Proteção de rotas com middleware `auth`
- CRUD de contatos por usuário (nome, email, telefone, status)
- Validações personalizadas por usuário (ex: e-mail único por dono)
- Layout responsivo com menu e opção de logout

---

## 🚀 Como Rodar o Projeto

1. Clone o repositório:
   git clone https://github.com/LimaHenriqueDev/crud-clientes.git
   cd crud-clients
   
3. Instale as dependências:

composer install

4. Copie e configure o arquivo .env:
   cp .env.example .env

5. Gere a chave da aplicação:
   php artisan key:generate
   
7. Execute as migrações:
   php artisan migrate

8. Inicie o servidor:
   php artisan serve

