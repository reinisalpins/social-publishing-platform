#!/bin/bash

set -e

touch database/database.sqlite
echo "Created database.sqlite"

cp -f .env.example .env
echo "Copied env example"

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed

echo "Setup complete."
