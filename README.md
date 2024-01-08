# Boats App

## Installation

### Prerequisites
For this project, you should have a docker desktop and composer installed.

### Steps to build backend
Clone the project:
```bash
git clone git@github.com:SuperHomer/boat-app.git
```

Go to the repo and install necessary packages:
```bash
cd boat-app
composer update
composer install
```

Set up the .env file:
```bash
cp .env.example .env
```

Update the app name:
```bash
APP_NAME=BoatsApp
```

Ensure the DB connection in the .env file is like this:
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=boat_app
DB_USERNAME=sail
DB_PASSWORD=password
```

Build the project:
```bash
./vendor/bin/sail up -d
```

### Steps to set up after build
Generate key:
```bash
./vendor/bin/sail php artisan key:generate
```

Set up the database:
```bash
./vendor/bin/sail php artisan migrate
```

Optional, if you want to prepopulate the database:
```
./vendor/bin/sail php artisan migrate:refresh --seed
```

To run the frontend, open a new terminal:


### Build frontend
Install dependencies and run the frontend:
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Go the this link:
http://localhost


## API routes
| Verb      | URI             | Description            |
|-----------|-----------------|------------------------|
| GET       | /api/boats      | Get all boats          |
| GET       | /api/boats/{id} | Get a specific boat    |
| POST      | /api/boats      | Create a boat          |
| PUT/PATCH | /api/boats/{id} | Update a specific boat |
| DELETE    | /api/boats/{id} | Delete a specific boat |
  

