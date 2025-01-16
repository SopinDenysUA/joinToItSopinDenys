Instructions on how to start a Laravel project
1. Repository cloning

Clone the project from GitHub to your local directory:

git clone https://github.com/SopinDenysUA/joinToItSopinDenys

Navigate to the project folder:
   
cd <project_name>
2. Install dependencies

Install PHP dependencies via Composer:

composer install

Install frontend dependencies via npm:

npm install
3. customize the .env environment file

Copy the .env.example file to .env:

cp .env.example .env

Open .env in a text editor and configure the following settings:

Database:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database_name

DB_USERNAME=your_database_user

DB_PASSWORD=your_database_password

Mailtrap (to test sending emails): If you are using Mailtrap:

MAIL_MAILER=smtp

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=your_mailtrap_username

MAIL_PASSWORD=your_mailtrap_password

MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=no-reply@example.com

MAIL_FROM_NAME="Your Project Name”

4. Generate application key

Generate a key for the application:

php artisan key:generate

5. Database setup
Create a new database in MySQL (the name must match DB_DATABASE in .env).

Accept the migrations:

php artisan migrate

If needed, generate test data (if you have sids):

php artisan db:seed

6. Compiling frontend resources

For local development:

npm run dev

For production:

npm run build

7. Start the local server

Start the Laravel server:

php artisan serve

8. Opening the project in a browser

Go to the address:

http://127.0.0.1:8000

Additional tips

Clearing the cache: If you run into cache problems, run:

php artisan config:clear

php artisan cache:clear

php artisan view:clear

Access rights issues: Make sure the storage folder and bootstrap/cache have the correct permissions:

chmod -R 775 storage bootstrap/cache

Running Vite (if used): Make sure Vite is running to compile CSS/JS:

npm run dev
