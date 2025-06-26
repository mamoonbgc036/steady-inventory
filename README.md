## Live url
https://backend.api.rentandrooms.com/
# Steady Inventory

Steady Inventory is a Laravel-based inventory management system. This README provides a step-by-step guide to get the project up and running on your local machine.

**Credentials:**
```
Email: mamoon@admin.com
pass:1111

## 🛠 Requirements

- PHP >= 8.1
- Composer
- MySQL or any compatible database

## 🚀 Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/mamoonbgc036/steady-inventory.git
   cd steady-inventory
2. **Install packages dependencies:**
   ```bash
   composer install
3. **copy env:**
   ```bash
   cp .env.example .env
4. **Configure Database:**
   ```bash
   composer install
5. **Migrate and Seed DB with dumy data:**
   ```bash
   php artisan migrate --seed
6. **Generate new app key:**
   ```bash
   php artisan key:generate
7. **Spin the server:**
   ```bash
   php artisan serve
8. **Browse and Login:**
   ```bash
   browse http://localhost:8000 and login with above credentials
