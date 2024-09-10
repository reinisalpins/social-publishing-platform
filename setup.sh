#!/bin/bash

set -e

touch database/database.sqlite
echo "Created database.sqlite"

cp -f .env.example .env
echo "Copied env example"

./vendor/bin/sail artisan key:generate

echo "Setup complete."
