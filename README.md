# 🔐 Sistema de autenticação com Laravel

Sistema completo de autenticação desenvolvido com **Laravel**, incluindo cadastro, login, redefinição de senha e login social com **Google OAuth**.

O projeto foi construído com foco em **boas práticas**, **organização de código** e **testes automatizados**, sendo adequado tanto para uso real quanto para portfólio.

---

## ✨ Funcionalidades

* ✅ Cadastro de usuários
* ✅ Login com e-mail e senha
* ✅ Validação de dados com feedback ao usuário
* ✅ Redefinição de senha via e-mail
* ✅ Login com Google (OAuth)
* ✅ Proteção de rotas com middleware `auth`
* ✅ Layouts separados para usuários autenticados e visitantes
* ✅ Estilização customizada para telas de autenticação

---

## 🧪 Testes Automatizados

O projeto utiliza **Pest** para **testes funcionais (Feature Tests)**, cobrindo os fluxos críticos da aplicação.

### Testes implementados

* Login com credenciais válidas
* Login com senha inválida
* Cadastro de usuário
* Cadastro com e-mail duplicado
* Reset de senha com token válido
* Reset de senha com token inválido
* Login com Google (OAuth mockado)

### Executar os testes

```bash
php artisan test
```

> O login com Google é testado de forma **mockada**, sem dependência de serviços externos.

---

## 🛠️ Tecnologias Utilizadas

* PHP
* Laravel
* Blade
* MySQL
* Bootstrap
* Laravel Socialite
* Pest (Testes automatizados)

---

## ⚙️ Instalação e Configuração

Clone o repositório:

```bash
git clone https://github.com/BrunoMendes20/Sistema-de-autenticacao
cd Sistema de autenticacao
```

Instale as dependências:

```bash
composer install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env` e execute as migrations:

```bash
php artisan migrate
```

---

## 📧 Configuração de E-mail

O envio de e-mails (como redefinição de senha) é configurado via SMTP.

Exemplo no `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@gmail.com
MAIL_PASSWORD=sua-senha-de-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu-email@gmail.com
MAIL_FROM_NAME="Laravel Auth"
```

Durante desenvolvimento ou testes, é possível usar:

```env
MAIL_MAILER=log
```

---

## 🔑 Login com Google (OAuth)

Para utilizar o login com Google:

1. Crie um projeto no **Google Cloud Console**
2. Gere as credenciais OAuth
3. Configure no arquivo `.env`:

```env
Google_Client_ID=
Google_Client_Secret=
Google_Redirect_URI=
```

---

## 📌 Decisões Técnicas

* Testes focados em **comportamento**, não em detalhes de implementação
* Integrações externas (Google OAuth) são testadas com **mock**
* Validações críticas possuem cobertura de testes
* Estrutura pensada para fácil manutenção e evolução

---

## 📄 Licença

Este projeto é open-source e foi desenvolvido para fins educacionais e de estudo.
