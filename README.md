<p align="center"><img src="https://raw.githubusercontent.com/danisec/assets/refs/heads/main/images/kinerjaplus/kinerjaplus.png" width="auto" height="auto" alt="Laravel Logo"></p>

# KinerjaPlus

KinerjaPlus is a web application built using Laravel 10 for evaluating teacher performance. It leverages the Analytical Hierarchy Process (AHP) method combined with a 360-degree assessment that includes self-assessment, peer assessment, and supervisor assessment.

## Table of Contents

-   [Features](#features)
-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Usage](#usage)
-   [User Manual Guide](#user-manual-guide)
-   [Project Structure](#project-structure)
-   [Contributing](#contributing)

## Features

-   **Analytical Hierarchy Process (AHP)**: Use AHP for structured and accurate performance evaluation.
-   **360-Degree Feedback**: Incorporate feedback from self, peers, and supervisors to get a comprehensive assessment.
-   **Ranking**: Principals or leaders can view information on ranking results starting from the priority weight of the criteria, the average employee score against the criteria, and the employee performance ranking.
-   **Role-based Access Control**: Secure access with roles for admin, teachers, and principal or leader

## Requirements

-   PHP 8.1 or higher
-   Composer
-   Node.js and NPM
-   MySQL
-   Apache or Nginx

## Installation

Follow these steps to set up the project:

1. Clone the repository:

    ```bash
    git clone https://github.com/danisec/kinerjaplus.git

    cd kinerjaplus
    ```

2. Install dependencies:

    ```bash
    composer install

    npm install && npm run build
    ```

3. Configure Environment Variables:

    Copy the .env.example file and update it:

    ```bash
    cp .env.example .env
    ```

    Generate application key:

    ```bash
    php artisan key:generate
    ```

4. Set Up Database:

-   Create a new MySQL database.
-   Update .env with your database credentials:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kinerja_plus
    DB_USERNAME=dbusername
    DB_PASSWORD=dbpassword
    ```

5. Run Database Migrations:

    ```bash
    php artisan migrate --seed

    php artisan migrate --path="database/migrations/*"
    ```

    Or, manually import the SQL file:

    ```bash
    mysql -u your_username -p your_password kinerja_plus < database/sql/kinerja_plus.sql
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

## Usage

-   Access the application in your browser at `http://localhost:8000`.
-   Login with the default credentials:
    -   Superadmin:
        -   Username: `superadmin`
        -   Password: `superadmin12345`

## User Manual Guide

-   [User Manual Guide](https://drive.google.com/drive/folders/1SIqzttBP-SqOvaKbbH5hmjplKKYnaOyf?usp=drive_link)

## Project Structure

-   **app/Http/Controllers**: Contains the controllers for handling HTTP requests.
-   **app/Models**: Holds the Eloquent models.
-   **database/migrations**: Database migrations to set up the tables.
-   **resources/views**: Blade templates for the frontend.
-   **routes/web.php**: Defines web routes for the application.

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a feature branch: git checkout -b feature-name
3. Commit changes: git commit -m "feat: add new feature"
4. Push to branch: git push origin feature-name
5. Submit a pull request.

Ensure your code follows the project’s coding standards before submission.

## License

This project is licensed under CC BY 4.0. See the [Creative Commons Attribution CC BY 4.0](LICENSE) file for details.
