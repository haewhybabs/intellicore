# Intellicore Documentation

## Installation

Follow these steps to set up Intellicore:

1. Clone the repository:

    ```sh
    git clone https://github.com/haewhybabs/intellicore.git
    ```

2. Install the required dependencies:

    ```sh
    composer install
    ```

3. Set up the .env by updating the database configuration.

4. Generate the application key:

    ```sh
    php artisan key:generate
    ```

5. Migrate the database and seed data (including factory users for testing):

    ```sh
    php artisan migrate --seed
    ```

6. Start the server:

    ```sh
    php artisan serve
    ```
7. Test

    ```sh
    php artisan test
    ```

## Postman Documentation

For API documentation, refer to the [Postman Documentation](https://documenter.getpostman.com/view/5742682/2s9Xy5MAmQ).

**Author: Ayobami Babalola**
