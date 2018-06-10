lemp-docker
========================
This is a lemp evn builded by docker-compose.Include nginx:1.12-alpine,php7.0,mysql:5.7.

Installation
------------

Clone from [myzero1/lemp-docker](https://github.com/myzero1/lemp-docker)

  ```
  git clone https://github.com/myzero1/lemp-docker.git
  cd lemp-docker
  git checkout feature/multi_por
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
    COMPOSE_PROJECT_NAME=0 #0-9

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

  - Pull/Update images
      ```
      docker-compose pull
      ```


Notice
-----

- Win7上使用dockerTool

	- 端口定义如5123
 
	    ```
		   5为前置local
		    1为环境id,可取0-9.
		    2为应用id,nginx为0,,mysql为1,可取0-9.
		    3为实例id,可取0-9.
      	```
  	- 在virtualbox上配置端口映射
      	```
      		127.0.0.1 5000 5000
      		127.0.0.1 5010 5010
      	```
  	- 由于window的权限问题，有时候mysql的配置不会生效。可以试试下面的方法 mysql
      	```
          0、修改docker-compose中db部分的配置，根据里面的注释进行修改。
          1、docker-compose up -d 重新生成容器并启动
          2、 [winpty ]docker exec -it 0_db_1 bash 进入mysql容器 
          3、 exit 突出mysql容器 
          4、 docker-compose restart 重启所有的容器 
        ```
