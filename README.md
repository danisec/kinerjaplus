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

1. Clone the repository:

    ```bash
    git clone https://github.com/danisec/ereport-erenos.git
    ```

2. Install dependencies:

    ```bash
    composer install

    npm install && npm run build
    ```

3. Create a new database and configure the `.env` file:

    ```bash
    cp .env.example .env

    php artisan key:generate
    ```

4. Set Up Database:

-   Create a database for the application.
-   Update the `.env` file with the database credentials.

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kinerjaplus
    DB_USERNAME=dbusername
    DB_PASSWORD=dbpassword
    ```

5. Run the database migrations:

    ```bash
    php artisan migrate --seed
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

Contributions are welcome! Please fork the repository and submit a pull request with your changes. Ensure that your code follows the project’s coding standards.
