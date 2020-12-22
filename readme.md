# Installation

## Step 1:

```bash
git clone https://github.com/HocSinhNghiemTuc/ltct.git
cd ltct
```

## Step 2:

```bash
cp .env.example .env
```

## Step 3: Edit the .env file

Create new database in your local database system

DB_DATABASE='your_db_name'	   (example: laravel)
DB_USERNAME='your_db_username' (example: root)
DB_PASSWORD='your_db_password' (example: secret)


## Step 4: Composer install

```bash
composer install 
```

If something wrong:
```bash
composer update
```

## Step 5: Migration

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

## Step 6: Run
```bash
php artisan serve
```

Go to localhost:8000 in your browser
