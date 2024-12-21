# DHBW-UCA-AuthRolesManager

This project is a collaborative effort between **UCA** and the German university **DHBW**, focused on enhancing the security of a Laravel-based application. The main objective is to implement advanced **authentication**, **authorization**, and **role management** features to ensure efficient access control and secure user management.

## Features

- **Secure Authentication**: Implements secure user login, registration, and session management.
- **Role-Based Access Control (RBAC)**: Assigns specific roles to users and grants them permissions based on their role.
- **Dynamic Role Management**: Admins can manage roles and permissions through an intuitive interface.
- **Secure API Endpoints**: Protects endpoints to prevent unauthorized access and vulnerabilities.
- **Data Encryption**: Ensures sensitive data is encrypted for maximum security.

## Technologies Used

- **Laravel**: PHP framework for building secure web applications.
- **MySQL**: Database management system for storing user data and roles.
- **GitHub**: For version control and collaboration.

## Installation

To get a local copy up and running, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/YahyaLem02/DHBW-UCA-AuthRolesManager.git
    ```
2. Navigate into the project directory:
    ```bash
    cd DHBW-UCA-AuthRolesManager
    ```
3. Install dependencies:
    ```bash
    composer install
    ```
4. Copy the `.env.example` file to `.env` and configure the database and other settings:
    ```bash
    cp .env.example .env
    ```
5. Generate the application key:
    ```bash
    php artisan key:generate
    ```
6. Migrate the database:
    ```bash
    php artisan migrate
    ```
7. Serve the application:
    ```bash
    php artisan serve
    ```

