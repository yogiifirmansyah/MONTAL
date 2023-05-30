# MONTAL

## Clone and Setup Environment

-   Clone and setup this repository on your local environment using git and this command

```
git clone https://github.com/yogiifirmansyah/MONTAL.git
cd MONTAL
composer install
npm install
```

-   Copy .env.example and rename it to .env or use this command

```
cp .env.example .env
```

-   Setup the keys in .env file and use this command to generate .env app_key

```
php artisan key:generate
```

## Migrate and seed database

-   Make sure your database is running to migrate and seed database using this command

```
php artisan migrate --seed
```

-   Serve the project using this command if you don't use laragon with virtual hostname

```
php artisan serve
```

-   Run the npm dev mode

```
npm run dev
```

-   Open your browser and go to <a>http:://localhost:8000</a> or <a>http://127.0.0.1:8000</a>
-   Use this email and password to login

```
Role Admin:
email : admin@gmail.com
password : 123456

or

Role Wali Kelas:
email : walas@gmail.com
password : 123456

or

Role User:
email : user@gmail.com
password : 123456
```
