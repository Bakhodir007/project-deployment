# Requirements

```
Laravel 10 (+PHPUnit)
- PHP 8.3 (+fpm, +sqlite3, +gd, +mbstring, +xml, +zip, +curl, +json)
- Composer
```

# Stage 1 (Booting application)

```
php artisan composer:install
composer run post-root-package-install
php artisan key:generate
php artisan storage:link
```

# Stage 2 (Testing application)

```
php artisan test --env=testing
```

# Stage 3 (Running migrations and seeders)

#### if it is first booting
```
php artisan migrate --seed
```
#### else
```
php artisan migrate
```

# Stage 4 (Deploying application)

```
Volumes:
    /storage
    /database/database.sqlite (if not exsist create it)
```
~ using jenkins and docker
