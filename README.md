# CentrumD Project

A test task for CentrumD company review.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- Docker and Docker Compose installed on your machine.
- Git for cloning the repository.

## Installation

To install CentrumD, follow these steps:

1. **Clone the repository:**
   ```sh
   git clone https://github.com/dyakadmytro/CentrumDtest.git
   
2. **Initialize and update submodules:**
   ```sh
    git submodule update --init --recursive

## Environment Setup

Set up your environment with the following commands:
1. **Copy the environment files:**
   ```sh
   cp ./docker-config/.env.example ./laradock/.env

2. **Build Docker containers:**
   ```sh
    docker-compose build nginx mysql workspace php-fpm
   
3. **Run the containers:**
   ```sh
    docker-compose up -d nginx mysql workspace php-fpm

## App configuration
Configure the application by entering the workspace container and setting up the environment file:
1. **Enter the workspace container:**
   ```sh
   docker-compose exec workspace bash

2. **Copy the .env example file:**
   ```sh
    cp .env.example .env
   
3. **Configure app:**
   ```sh
    php artisan key:generate
   
4. **Run migrations**
   ```sh
    php artisan migrate
   
5. **Run seeders**
   ```sh
    php artisan db:seed

## Using Your App

To use **CentrumD**, open your web browser and visit http://localhost:8091.
your user creds are: test_admin@example.com password