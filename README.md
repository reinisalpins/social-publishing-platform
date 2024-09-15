# Social Publishing Platform

This project is a social publishing platform built with Laravel.

## Installation

### Prerequisites

- Git
- Docker
- Docker Compose

### Clone the Repository

```bash
git clone git@github.com:reinisalpins/social-publishing-platform.git
cd social-publishing-platform
```

### Install Dependencies

Run the following command to install PHP dependencies using a Docker container:

```bash
docker run --rm \
 -u "$(id -u):$(id -g)" \
 -v "$(pwd):/var/www/html" \
 -w /var/www/html \
 laravelsail/php83-composer:latest \
 composer install --ignore-platform-reqs
```

### Start the Docker Environment

Start the Docker environment using Laravel Sail:

```bash
./vendor/bin/sail up -d
```

### Run the Setup Script

After the Docker environment is up and running, execute the provided setup script:

```bash
chmod +x setup.sh
./setup.sh
```

This script will:
1. Create a SQLite database file
2. Copy the `.env.example` file to `.env`
3. Generate an application key
4. Run database migrations
5. Seed the database

### Build Frontend Assets

To compile and prepare the frontend assets, run:

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

This will install the necessary Node.js dependencies and build your frontend assets.

## Usage

### Serve the Application

The application should now be running. You can access it at `http://localhost`.

### Login

To access the features, use the following credentials:

```
Email: admin@example.com
Password: password
```

## Development

To stop the Docker environment:

```bash
./vendor/bin/sail down
```

For frontend development, you can use:

```bash
./vendor/bin/sail npm run dev
```

This will start the Vite development server and watch for changes in your frontend files.
