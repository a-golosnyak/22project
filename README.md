## Local Development

1. Clone repository
   ```bash
   $ git clone https://github.com/a-golosnyak/22project.git
   ```

1. Create .env file 
   ```bash
   $ cp .env.example .env
   ```

1. Install the dependencies with [Composer](https://getcomposer.org/)

   ```bash
   $ composer install
   ```

1. Create database named as in .env.

1. Create tables

   ```bash
   $ php artisan migrate:fresh
   ```
   
1. Add pet example
    ```bash
    php artisan add dog “Lucky”
    php artisan add cat “TOM”
    ```
1. Make chosen pet give a voice.
    ```bash
    php artisan “Lucky”
    ```
    
1. Make all pets give a voice in random order.
    ```bash
    php artisan voice
    ```
    