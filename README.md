
# Laravel POS System - TFA7

## Project Description

This project is a Laravel-based Point of Sale (POS)
application developed for IT0049 - Web System Technologies.

TFA7 extends the TFA6 project by implementing
customer and user account management, form validation,
record editing, and profile picture uploads.

## Features

- View customer accounts
- Create customer accounts
- Validate customer information
- View user accounts
- Create user accounts
- Validate unique usernames
- Edit existing customers
- Edit existing users
- Upload and resize user avatars
- Display avatars with a default placeholder

## Technologies Used

- PHP
- Laravel
- MySQL or SQLite (depending on configuration)
- HTML and CSS
- Composer
- Intervention Image

## Installation

1. Clone the repository:

   git clone YOUR_REPOSITORY_URL

2. Enter the project directory:

   cd pos-system-tfa7

3. Install dependencies:

   composer install

4. Create the environment file:

   cp .env.example .env

5. Configure the database in .env.

6. Generate the application key:

   php artisan key:generate

7. Run database migrations:

   php artisan migrate

8. Create the public storage link:

   php artisan storage:link

9. Start the development server:

   php artisan serve

10. Open:

    http://127.0.0.1:8000

## Screenshots

Screenshots of the application's features are
available in the screenshots folder.

## Academic Information

Course: IT0049 - Web System Technologies

Assessment: Technical Formative Assessment 7

Project: Making It Editable in Laravel
