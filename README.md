\# Horizon Academy — Laravel Authentication \& Role Management System



A Laravel-based school management foundation with authentication, role-based authorization, student, teacher, and staff management, registration requests, profiles, activity logs, and a responsive dashboard interface.



\## Features



\* User registration and login

\* Email verification

\* Password reset and password confirmation

\* Role-based authorization

\* Admin dashboard

\* Student management

\* Teacher management

\* Staff management

\* Student profile completion

\* Teacher profile completion

\* Staff profile completion

\* Student self-registration with administrator approval

\* Registration request management

\* Activity logging

\* Protected settings pages

\* Custom 403 unauthorized page

\* Form validation and authorization

\* Automated feature tests

\* Laravel Pint code formatting

\* GitHub Actions workflows for testing and linting



\## User Roles



\### Admin



\* Access the admin dashboard

\* Manage users

\* Manage students

\* Manage teachers

\* Manage staff

\* Review registration requests

\* View activity logs



\### Student



\* Access the student dashboard

\* Complete and update their profile

\* Manage their account settings



\### Teacher



\* Access the teacher dashboard

\* Complete and update their profile



\### Staff



\* Access the staff dashboard

\* Complete and update their profile



\## Technology Stack



\* Laravel 12

\* PHP 8.2+

\* Livewire / Volt

\* Flux UI

\* MySQL

\* Vite

\* Tailwind CSS

\* Pest

\* Laravel Pint



\## Requirements



Make sure the following are installed:



\* PHP 8.2 or higher

\* Composer

\* Node.js and npm

\* MySQL or another supported Laravel database

\* Git



\## Installation



Clone the repository and enter the project directory:



```bash

git clone https://github.com/mizhar0011-ux/school-management-system.git

cd school-management-system
```



Install PHP dependencies:



```bash

composer install

```



Install JavaScript dependencies:



```bash

npm install

```



Create the environment file:



```bash

cp .env.example .env

```



On Windows, you can also copy `.env.example` manually and rename it to `.env`.



Generate the application key:



```bash

php artisan key:generate

```



Configure the database connection in `.env`.



Run the migrations and seed the demo data:



```bash

php artisan migrate:fresh --seed

```



Build the frontend assets:



```bash

npm run build

```



Start the Laravel development server:



```bash

php artisan serve

```



\## Demo Accounts



The database seeder creates the following accounts for local evaluation.



\### Administrator



\* Email: `admin@horizonacademy.com`

\* Password: `Admin@12345`



\### Student



\* Email: `test@example.com`

\* Password: `password`



These credentials are intended for local development and project evaluation only.



\## Testing



Run the complete test suite with:



```bash

php artisan test

```



The project currently contains authentication, registration, dashboard, email verification, password, and settings tests.



\## Code Style



Laravel Pint is used for PHP code formatting.



Run Pint with:



```bash

vendor/bin/pint

```



\## Frontend



Build production assets with:



```bash

npm run build

```



For development with Vite:



```bash

npm run dev

```



\## Project Structure



```text

app/

├── Http/

│   ├── Controllers/

│   ├── Middleware/

│   └── Requests/

├── Livewire/

├── Models/

└── Providers/



database/

├── factories/

├── migrations/

└── seeders/



resources/

├── css/

├── js/

└── views/



routes/

├── auth.php

├── console.php

└── web.php



tests/

├── Feature/

└── Unit/

```



\## Security



\* Environment-specific configuration is stored in `.env`.

\* `.env` is excluded from Git.

\* Application secrets should never be committed.

\* Role middleware protects role-specific routes.

\* Form requests enforce server-side validation and authorization.

\* Authentication-protected routes require a logged-in user.



\## License



This project is developed for educational and portfolio purposes.