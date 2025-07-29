# Course Enrollment System

This is a web application built with Laravel that allows users to browse courses, enroll in them, and manage their enrollments. It also includes an admin panel for managing courses, users, and enrollments.

## Features

### User Features:
- **User Authentication**: Register, login, and logout functionality.
- **Browse Courses**: View a list of available courses.
- **Enroll in Courses**: Enroll in desired courses.
- **Dashboard**: View a list of enrolled courses.
- **Continue Learning**: Redirects to the course details page.
- **Unenroll from Courses**: Remove a course from the dashboard and the database.

### Admin Features:
- **Admin Authentication**: Separate login for administrators.
- **Dashboard**: Overview of courses, users, and enrollments.
- **Course Management**: Create, view, edit, and delete courses.
- **User Management**: Create, view, edit, and delete users.
- **Enrollment Management**: View and delete enrollments.

## Installation

Follow these steps to set up the project locally:

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/AlexKalll/course-enrollment.git
    cd course-enrollment
    ```

2.  **Install Composer dependencies:**
    ```bash
    composer install
    ```

3.  **Create a the `.env` file or make a copy of `.env.example` to it as the command below **
    ```bash
    cp .env.example .env
    ```

4.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure your database:**
    Open the `.env` file and update the database connection details. For example, for MySQL:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1 (or localhost)
    DB_PORT=3306
    DB_DATABASE=course_enrollment_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Run database migrations and seeders:**
    This will create the necessary tables and populate them with initial data, including an admin user.
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Start the development server:**
    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000` (or another port if specified) or via `http://127.0.0.1:8000`.

Note: Make sure to have Xampp, Mamp, Wamp, laravel herd or any other local server running on your machine.
## Usage

### User Access:
-   **Register/Login**: Navigate to `/register` or `/login` to create an account or log in.
-   **Browse Courses**: After logging in, you can browse courses from the home page or your dashboard.
-   **Enroll/Unenroll**: Click on a course to see details and enroll. From your dashboard, you can unenroll from courses.

### Admin Access:
-   **Login**: Navigate to `/admin/login`.
-   **Credentials**: Use `admin@gmail.com` as the email and `123456` as the password.
-   **Manage**: Access the admin dashboard to manage courses, users, and enrollments.

---
### Contributors
