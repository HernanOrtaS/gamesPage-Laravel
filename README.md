## Project Laravel-Docker

This repository uses containers to create the environment to setup  the project easily, you will need docker and setup with **docker compose up** and some extra commands

## Requirements
- Docker
- Docker Compose
- The cloned repository

#1 Configure .env
cp laravel/.env.example laravel/.env

#2 Configure the container
docker compose exec app bash

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

chown -R www-data:www-data database
chmod -R 775 database
