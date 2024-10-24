

# Paradisus Real Estate Restful API

Welcome to the **Paradisus Real Estate Restful API**, a professional and secure RESTful API designed for Real Estate Agencies to efficiently manage property listings, user authentication, and transactions. This project utilizes Laravel with JWT (JSON Web Token) authorization via the [`jwt-auth`](https://jwt-auth.readthedocs.io/en/develop/) package, ensuring that all interactions are securely authenticated.

## Project Overview

This API provides a comprehensive solution for managing properties in a real estate environment. It includes features such as property listings, updates, deletions, and secure user authentication.

The current version of the API implements **Clean Architecture**, ensuring maintainability and scalability. The project continues to follow the **Service Oriented Programming** pattern and uses **PostgreSQL** as the database. The API adheres to the [JSON:API](https://jsonapi.org/) specification for data structuring and communication.

## Features

- JWT-based user authentication
- Full CRUD operations for property management and amenities
- Clean Architecture implemented for maintainability and scalability
- Secure and scalable architecture (Service Oriented Programming)
- Designed for easy integration with Real Estate Agency systems

## Prerequisites

- PHP 8.x or higher
- Composer
- PostgreSQL
- Laravel 10.x
- DBeaver (Optional, for database management)
- JWT Auth package

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/paradisus-real-estate-restful-api.git
   cd paradisus-real-estate-restful-api
   ```

2. **Install dependencies:**

   Run Composer to install all necessary packages:

   ```bash
   composer install
   ```

3. **Set up the environment:**

   Copy the `.env.example` file to `.env` and update the necessary configurations (such as database and JWT settings):

   ```bash
   cp .env.example .env
   ```

   Update your `.env` file with PostgreSQL database credentials:

   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

4. **Generate an application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**

   Set up the database by running migrations:

   ```bash
   php artisan migrate
   ```

6. **Set up JWT Authentication:**

   Generate a JWT secret key:

   ```bash
   php artisan jwt:secret
   ```

7. **Start the application:**

   Launch the application locally:

   ```bash
   php artisan serve
   ```

   The API will now be running at `http://localhost:8000`.

## Routes

| Method   | URI                                   | Action                                           |
|----------|---------------------------------------|--------------------------------------------------|
| GET      | /                                     | Application home route                           |
| POST     | api/auth/login                        | Login user                                       |
| POST     | api/auth/logout                       | Logout user                                      |
| POST     | api/auth/me                           | Get authenticated user info                      |
| POST     | api/auth/refresh                      | Refresh JWT token                                |
| GET      | api/v1/properties                     | List all properties                              |
| POST     | api/v1/properties                     | Add a new property                               |
| GET      | api/v1/properties/{property}          | Show a specific property                         |
| PUT      | api/v1/properties/{property}          | Update a property                                |
| DELETE   | api/v1/properties/{property}          | Delete a property                                |
| GET      | api/v1/amenities                      | List all amenities                               |
| GET      | api/v1/amenities/{id}                 | Show a specific amenity                          |
| POST     | api/v1/amenities                      | Add a new amenity                                |
| PUT      | api/v1/amenities/{id}                 | Update an amenity                                |
| PATCH    | api/v1/amenities/{id}                 | Partially update an amenity                      |
| DELETE   | api/v1/amenities/{id}                 | Delete an amenity                                |

## Future Plans

This API is currently in **version 1**. The API has already adopted **Clean Architecture** to improve code maintainability, scalability, and modularity, ensuring a robust and future-proof system.

## License

This project is licensed under the MIT License.
