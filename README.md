## Website for photos

## Description
This is a website for sharing photos, including user and administrative parts. The project is implemented using Laravel MariaDB.

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/your-repo.git
    ```
2. Navigate to the project folder:
    ```bash
    cd your-repo
    ```
3. Install dependencies:
    ````bash
    composer install
    npm install
    npm run dev
    ```
4. Customize the `.env` file:
    - Copy `.env.example` to `.env`.
    - Specify the database and mail service settings.

5. Perform migrations and sids:
    ```bash
    php artisan migrate --seed
    ```

6. Start the local server:
    ````bash
    php artisan serve
    ```

## Functionality
- User registration and authentication.
- Uploading and viewing photos.
- Commenting on photos.
- Administration panel for managing users and photos.
