# Guia de Criação de Projeto Laravel com Vite, TailwindCSS e Bootstrap

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

---

## 🚀 Sobre o Projeto

Este guia tem como objetivo auxiliar na criação de um projeto **Laravel** integrado com **Vite**, **TailwindCSS** , utilizando o seguinte arquivo `package.json` como referência:

---

## ⚙️ Passo a Passo para Criar o Projeto


### 1 Instalar as bibliotecas necessárias node

Execute o seguinte comando para instalar todas as dependências listadas no `package.json`:

```bash
composer install
npm install
```

### 2 Gerando chave no .env e gerando o banco de dados

No terminal execute:
**Terminal 1 (Laravel):**
```bash
php artisan key:generate
php artisan migrate
```

### 3 Executar o servidor de desenvolvimento

No terminal execute:

**Terminal 1 (Laravel):**
```bash
composer run dev
```

---

### Biblioteca de Autenticação**
composer require laravel/breeze --dev
php artisan breeze:install livewire

---

## 📚 Documentação Oficial

- [Laravel](https://laravel.com/docs)
- [Vite](https://vitejs.dev/)
- [TailwindCSS](https://tailwindcss.com/docs)
- [Livewire](https://laravel-livewire.com/)

---

## 🧾 Licença

Este projeto segue a licença [MIT](https://opensource.org/licenses/MIT).

---

💡 **Dica:** Este setup é ideal para aplicações Laravel modernas com front-end reativo e performance otimizada.



**Tradução para pt-br**
https://github.com/lucascudo/laravel-pt-BR-localization.git