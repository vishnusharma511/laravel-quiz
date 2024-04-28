
# Laravel Quiz Project

This is a quiz project built with Laravel that allows users to take quizzes on various subjects and topics.

## Features

- User authentication: Users can Register, Login:Email/Mobile and Password, and log out.
- Quiz management: Admin users can create, edit, and delete quizzes.
- Subject/Topic management: Admin users can manage subjects and assign quizzes to subjects.
- Quiz taking: Registered users can take quizzes assigned to them and see their results.
- User dashboard: Users have access to a dashboard where they can see their quiz results and manage their account settings.

## Installation

To run this project locally, follow these steps:

1. Clone the repository:

```
git clone <repository-url>
```

2. Navigate to the project directory:

```
cd laravel-quiz-project
```

3. Install Composer dependencies:

```
composer install
```

4. Create a copy of the .env.example file and rename it to .env:

```
cp .env.example .env
```

5. Generate an application key:

```
php artisan key:generate
```

6. Set up your database connection in the .env file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

7. Run database migrations and seed the database:

```
php artisan migrate --seed
```

8. Serve the application:

```
php artisan serve
```

9. Access the application in your web browser at \`http://localhost:8000\`.

## Usage

1. Register a new user account or log in with an existing account.
2. Navigate to the quizzes section to view available quizzes.
3. Take quizzes on various subjects and topics.
4. View your quiz results on your dashboard.

## Credits

- Created by [Vishnu Sharma](https://github.com/vishnusharma511/)
- Laravel framework: [https://laravel.com/](https://laravel.com/)

## License

This project is open-source.
