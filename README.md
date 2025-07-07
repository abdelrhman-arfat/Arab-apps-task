# 🚀 Arab Apps Backend Task

## 🧩 Database Configuration

### Products Table

| Column      | Type     | Details                          |
| ----------- | -------- | -------------------------------- |
| id          | BIGINT   | Primary Key                      |
| name        | STRING   | Product name                     |
| price       | DECIMAL  | (10,2) formatted price           |
| stock       | INTEGER  | Number of items in stock         |
| status      | BOOLEAN  | 1 = Available, 0 = Not Available |
| category_id | BIGINT   | Foreign key from categories      |
| timestamps  | DATETIME | created_at, updated_at           |

### Categories Table

| Column     | Type     | Details                |
| ---------- | -------- | ---------------------- |
| id         | BIGINT   | Primary Key            |
| name       | STRING   | Category name          |
| timestamps | DATETIME | created_at, updated_at |

---

### Settings

1.  Environment Configuration **.evn** :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=your_password

```

2. Migration :

```bash

php artisan migrate
```

3. Seeder For Product fake data:

```bash
php artisan db:seed --class=ProductSeeder
```

## Caching :

1. Environment Configuration **.evn** :

```env
CACHE_DRIVER = file
```

2. config/cache.php

```bash
'default' => env('CACHE_DRIVER', 'file'),
'limiter' => env('RATE_LIMITER_DRIVER', 'file')
```
