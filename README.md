# Laravel-starter

Built with Laravel 11, Blade, Tailwind CSS + Daisy UI Component, Alpine.js, and Remix Icon.

## Features
- Responsive on Small & Large Screen
- Side Bar Menu (Small Screen) & Nav Bar Menu (Large Screen)
- Light/Dark Mode
- Toast
- Alert Modal
- Photo Profile
- Custom Paginator with Tooltip

## Requirements
- Composer latest version
- PHP v8.2-8.3
- Node JS v18 and newest

## Installation

Clone the repository
```bash
git clone https://github.com/dimasa07/Laravel-starter.git
cd Laravel-starter
```

Copy .env
```bash
cp .env.example .env
```

Configure database in .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Install Composer Dependencies
```bash
composer install
```

Install Node Dependencies
```bash
npm install
```

Run Migration
```bash
php artisan migrate --seed
```

Generate App Key
```bash
php artisan key:generate
```

Run Application
```bash
php artisan serve
```

Run Vite Server
```bash
npm run dev
```

## Usage
Login as Admin
- Email: test@example.com
- Password: password