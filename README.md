# PHP Developer Test: CodeIgniter v4 Application (Scope for 4 Hours)

## Tools

LAMP
IDE PhpStorm

## Steps to install

1. Clone the repo

```bash
git clone https://github.com/MiguelAngelMP10/blog_ci
```

2. Enter the directory *blog_ci*

```bash
cd blog_ci
```

3. Install dependencies

```bash
composer install 
```

4. Database: Configure the connection to your database in the *app/Config/Database.php* file.

5. Run Migrations:

 ```bash
 php spark migrate
 ```

6. Seed data examples
 ```bash
   php spark db:seed DatabaseSeeder
 ```

7. *Serve the Application:*
```bash
  php spark serve
```