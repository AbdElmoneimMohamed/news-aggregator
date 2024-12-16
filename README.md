# News Aggregator Backend

This project is the backend implementation of a **News Aggregator** website that pulls articles from various sources and provides an API to retrieve them. The backend is built using **Laravel** and provides several endpoints to interact with the articles, including searching, filtering, and user preferences.

## Features

- **Data Aggregation**: Fetches articles from multiple data sources (NewsAPI, BBC News, The Guardian).
- **Database Storage**: Stores fetched articles in a local database and keeps the data regularly updated.
- **API Endpoints**: Exposes endpoints for frontend interactions, allowing article retrieval with filtering and search capabilities.

## Tech Documentation

- **Laravel Commands**: Generate separate 3 laravel commands to fetch the articles from (NewsApi, BBC, The Guardian)
  ``` 
    php artisan news:fetch-articles-from-bbc
    php artisan news:fetch-articles-from-guardian
    php artisan news:fetch-articles-from-news-api
    
- **Cron Job**: Run the commands every hour to keep the data updated
- **Strategy Pattern**: used the Strategy design pattern to fetch the data depend on the source
- **Services**: In Every Command use services to fetch the data from the source, map the data to ArticleDto, persist the data
- **Frontend Api**: provide api to get the data from backend ``/api/articles``


## Installation

1. **Prerequisites**

    - PHP 8.x
    - Composer
    - Docker


2. **Clone the Repository**

   ```bash
   git clone https://github.com/AbdElmoneimMohamed/acme-widget-co.git
   cd acme-widget-co
   make local-setup

## Usage

| Command            | Meaning                                            |
|--------------------|----------------------------------------------------|
| `make local-setup` | setup local environment in one step for first time |
| `make test`        | run unitTest                                       | 
| `make ecs`         | run cs-fixer                                       |
| `make phpstan`     | run php-stan                                       |
| `make rector`      | run rector                                         |
| `make ci`          | run all Quality tools  
| `make start`       | start docker sail                                  |
| `make stop`        | stop docker                                        |
| `make rebuild`     | rebuild without cache                              |
| `make restart`     | restart docker                                     |
| `make migrate`     | run migration                                      |
| `make clear`       | clear cache                                        |


    
