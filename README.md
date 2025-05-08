# Laravel API Authentication

A simple Laravel REST API that supports user authentication with the following endpoints:

-   `/api/register`
-   `/api/login`
-   `/api/logout`

## Features

-   User registration
-   Token-based login (Sanctum or Passport)
-   Logout
-   Basic validation and error handling
-   Laravel 12+

## Getting Started

### Prerequisites

-   PHP >= 8.4.6
-   Composer
-   SQLite
-   Laravel installer

### Installation

```bash
# Clone the repository
git clone https://github.com/AliDawood8/api--aravel.git
cd api--aravel

# Install dependencies
composer install

# Copy .env and generate app key
cp .env.example .env
php artisan key:generate

# Configure your .env (DB settings, etc.)

# Run migrations
php artisan migrate

# Install Sanctum (if using it for auth)
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```
