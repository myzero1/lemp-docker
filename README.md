lemp-docker
========================
This is a lenmp evn builded by docker-compose.Include nginx:1.12-alpine,php7.0,mysql:5.7.

Installation
------------

Clone from [myzero1/lemp-docker](https://github.com/myzero1/lemp-docker)

  ```
  git clone https://github.com/myzero1/lemp-docker.git
  ```

Setting
-----

- Go to env dir and copy .env.dist to .env

    ```
    cd env
    cp .env.dist .env

    vi .env

    # -----------project conf-------------------
    # You should set COMPOSE_PROJECT_NAME as 1-255,if you wang to you use this project.
    COMPOSE_PROJECT_NAME=1

    ```

- Go to env dir and copy docker-compose.yml.dist to docker-compose.yml

    ```
    cd env
    cp docker-compose.yml.dist docker-compose.yml
    ```

- Go to env/conf/nginx dir and cp nginx.conf.dist to nginx.conf

    ```
    cd  env/conf/nginx
    cp  nginx.conf.dist nginx.conf
    ```
    

- Go to env/conf/nginx dir and cp vhost.conf.dist to vhost.conf

    ```
    cd  env/conf/nginx
    cp  vhost.conf.dist vhost.conf
    ```
    
- Go to env/conf/mysql dir and cp my.cnf.dist to my.cnf

    ```
    cd  env/conf/mysql
    cp  my.cnf.dist my.cnf
    ```

- Go to env/conf/php dir and cp php.ini.dist to php.ini

    ```
    cd  env/conf/php
    cp  php.ini.dist php.ini
    ```


Usage
-----

- Go to env dir
    ```
    cd env
    ```

- Build env by docker-comose as following：
    ```
    docker-compose build
    ```

- Up env by docker-comose as following：
    ```
    docker-compose up
    ```
OR run in backend
    ```
    docker-compose up -d
    ```

- Log into the app container
    ```
    docker-compose exec app bash
    
    docker exec -it env_app_1 bash   on docker for windows
    ```

- Get the docker host IP address
    ```
    docker-machine env [machine name]
    ```

- More usefull commands
  - Stop containers
      ```
      docker-compose stop
      ```
   - Start containers
      ```
      docker-compose start
      ```
  - Restart containers
      ```
      docker-compose restart
      ```
  - Remve containers and images
      ```
      docker-compose rm
      ```
  - Add containers and images
      ```
      docker-compose up
      ```
      or
      ```
      docker-compose up
      ```
