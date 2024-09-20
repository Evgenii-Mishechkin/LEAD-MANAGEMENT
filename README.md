ENG.

Documentation for Deploying and Running a Laravel Project with Vite and Tailwind CSS

LEAD MANAGEMENT 

1. Cloning the Repository and Installing Dependencies
First, clone the project repository to your local machine using:
git clone <repository-url>

Navigate to the project directory:
cd <project-folder-name>

Install the PHP dependencies using Composer:
composer install

Install the Node.js dependencies using npm:
npm install

Rename the .env.example file to .env:

Generate an application key for Laravel:
php artisan key:generate

Open the .env file to configure your database connection:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lead_management-db
DB_USERNAME=<your-database-username>
DB_PASSWORD=<your-database-password>

Configure the mail server for sending emails:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<your-email>
MAIL_PASSWORD=<your-email-password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="<your-email>"
MAIL_FROM_NAME="${APP_NAME}"

3. Database Preparation
Run the migrations to create the necessary tables:
php artisan migrate

In the project includes seed data, populate the database:
php artisan db:seed

4. Running the Project
To start the Laravel development server and the Vite server simultaneously, use:
npm run dev

This will launch the Laravel application at http://localhost:8000 and Vite at http://localhost:5173.

For production builds, compile the assets using:
npm run build

5. Additional Information
The Vite configuration is optimized for Laravel and Tailwind CSS, including only the necessary plugins and dependencies. To modify the project’s configuration, edit the relevant files in resources/js/app.js and resources/css/app.css, and manage packages in package.json and vite.config.js.
After making changes to dependencies or configurations, re-run:
npm install
npm run dev
or
npm run build

Additional Information for Software Environments:
Deploying on a Local XAMPP Server (Windows)
Download and install XAMPP from the official website.
Ensure that Apache and MySQL are enabled in the XAMPP control panel (run as administrator).
Move the project to the htdocs directory (typically at C:\xampp\htdocs).
Open phpMyAdmin via http://localhost/phpmyadmin and create a database for your project.
Update the database connection settings in the .env file as described earlier.


RUS.

Документация по разворачиванию и запуску проекта на Laravel с использованием Vite и Tailwind CSS

LEAD MANAGEMENT 


1. Клонирование репозитория и установка зависимостей
Склонируйте репозиторий проекта на ваш локальный компьютер:
git clone <URL репозитория>

Перейдите в каталог проекта:
cd <название папки проекта>

Установите зависимости PHP с помощью Composer:
composer install

Установите зависимости Node.js с помощью npm:
npm install

2. Настройка среды
Переименуйте файл .env.example в .env:

Сгенерируйте ключ приложения Laravel:
php artisan key:generate


Откройте файл .env и настройте параметры подключения к базе данных и почтовый сервер:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lead_management-db
DB_USERNAME=<имя пользователя базы данных>
DB_PASSWORD=<пароль базы данных>


Настройте почтовый сервер для отправки писем:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<ваш email>
MAIL_PASSWORD=<пароль от email>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="<ваш email>"
MAIL_FROM_NAME="${APP_NAME}"
 
3. Подготовка базы данных
Выполните миграции базы данных для создания необходимых таблиц:
php artisan migrate

В проекте предусмотрены начальные данные, выполните команду для их заполнения:
php artisan db:seed

4. Запуск проекта
Чтобы одновременно запустить сервер разработки Laravel и сервер Vite для работы с фронтендом, используйте команду:
npm run dev

Эта команда запускает сервер Laravel на http://localhost:8000 и сервер Vite на http://localhost:5173.

Для сборки проекта для продакшена (например, перед деплоем на сервер) выполните:
npm run build

5. Дополнительная информация
Конфигурация Vite для вашего проекта настроена в файле vite.config.js. В нем подключены только те плагины и зависимости, которые необходимы для работы с Laravel и Tailwind CSS.

Если в будущем вам потребуется изменить конфигурацию проекта, вы можете редактировать файлы в resources/js/app.js и resources/css/app.css, а также управлять пакетами через package.json и vite.config.js.

После внесения изменений в зависимости или конфигурации, не забудьте заново выполнить npm install и npm run dev или npm run build.

Эти шаги позволят вам развернуть проект на новом окружении и начать его использование или разработку.


Доп. Информация по ПО:

Развертывание на локальном сервере XAMPP (Windows)

Скачайте и установите XAMPP с официального сайта.
Убедитесь, что включены Apache и MySQL в панели управления XAMPP !!! от имени администратора.

Переместите проект в папку htdocs (обычно она находится по пути C:\xampp\htdocs).

Откройте phpMyAdmin (http://localhost/phpmyadmin) и создайте базу данных для вашего проекта.
Обновите параметры подключения к базе данных в .env

