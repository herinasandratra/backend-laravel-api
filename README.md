# backend-laravel-api

Welcome to the Laravel project! Below are the instructions to get started.

## Installation

1. Clone the repository to your local machine:

```bash
git clone https://github.com/herinasandratra/backend-laravel-api.git
```

2. Navigate to the project:

```bash
cd backend-laravel-api
```

## Docker compose user

3. Insure you are in the right folder which contain docker-compose.yaml :

```bash
docker-compose up -d
```
```bash
docker-compose run --rm app composer install --no-interaction
```
```bash
docker-compose run --rm app php artisan key:generate
```

```bash
docker-compose run --rm app php artisan migrate
```

```bash
docker-compose run --rm app php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

```bash
docker-compose run --rm app php artisan jwt:secret
```

```bash
docker-compose run --rm app php artisan db:seed
```

Now you should access to the backend url in your browser http://localhost:8000 .