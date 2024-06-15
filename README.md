# Rajaongkir API Integration with Lumen

This project integrates with the Rajaongkir API to fetch province and city data, stores it in a PostgreSQL database, and provides REST API endpoints for searching this data.

## Prerequisites

- PHP >= 7.2
- Composer
- PostgreSQL

## Setup

1. **Clone the repository:**

   ```sh
   git clone https://github.com/yourusername/rajaongkir-api.git
   cd rajaongkir-api

2. Install dependencies:

    composer install

3. Configure Environment Variables:
    Copy the .env.example file to .env and update the database configuration and Rajaongkir API key:
    cp .env.example .env

    Update the .env file with your database credentials and Rajaongkir API key:
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=rajaongkir
    DB_USERNAME=yourusername
    DB_PASSWORD=yourpassword

    RAJAONGKIR_API_KEY=0df6d5bf733214af6c6644eb8717c92c

4. Generate Application Key:
    php artisan key:generate

5. Run Migrations:
    php artisan migrate

6. Fetch Rajaongkir Data:
    Run the artisan command to fetch data from the Rajaongkir API and store it in the database:
    php artisan fetch:rajaongkir-data


