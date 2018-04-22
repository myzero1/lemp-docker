lemp-docker
========================
This is a lemp evn builded by docker-compose.Include nginx:1.12-alpine,php7.0,mysql:5.7.

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
    COMPOSE_PROJECT_NAME=0

    ```

- Go to env dir and copy docker-compose.yml.dist to docker-compose.yml

    ```
    cd env
    cp docker-compose.yml.dist docker-compose.yml
    ```

- Go to env dir and copy docker-compose.yml.dist to docker-compose.yml

    ```
    cd  env/
    cp  conf.dist conf
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
  - Remove containers
      ```
      docker-compose down
      ```
      
  - Add containers and images
      ```
      docker-compose up
      
      docker-compose up -d
      ```
      
  - Remove containers and images
      ```
      docker-compose rm
      ```



Notice
-----

- Win7上使用dockerTool
  - 在win7上配置hosts，hosts不支持正则
      ```
      127.0.0.1 welcome.local
      127.0.0.1 welcome1.local
      ```
      
  - 在docker宿主机上配置hosts，hosts不支持正则
      ```
      127.0.0.1 welcome.local
      127.0.0.1 welcome1.local
      ```
