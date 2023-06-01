# Laravel Twill Inertia Application

## Deployment

- [Steps](#steps)
- [Server Requirements](#server-requirements)

### Steps

Install project dependencies (Laravel, Twill, Inertia, ...)

```
# Development
composer install

# Live
composer install --no-dev --optimize-autoloader
```

Copy and rename `.env.example` to `.env`, then create application key

```
cp .env.example .env
php artisan key:generate
```

Execute migrations to initialize database structure

```
php artisan migrate
```

Create super admin account if needed

```
php artisan twill:superadmin
```

Create a symbolic link from `public/storage` to `storage/app/public` publicly accessible through `/storage` URL

```
php artisan storage:link
```

Initialize data

```
# Home page
php artisan db:seed PageHomeSeeder
```

### Server Requirements

- PHP version >= 8.2
- PHP extensions:
  - Ctype
  - cURL
  - DOM
  - Exif
  - Fileinfo
  - Filter
  - Hash
  - JSON
  - Mbstring
  - OpenSSL
  - PCRE
  - PDO
  - Session
  - Tokenizer
  - XML
