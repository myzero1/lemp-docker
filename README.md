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

- centos6.5,docker1.7.1,docker-compose1.5.1
  - 在docker-compose.yml中使用变量
    ```
      The DOCKER solution:
      It looks like docker-compose 1.5+ has enabled variables substitution: https://github.com/docker/compose/releases

      The latest Docker Compose allows you to access environment variables from your compose file. So you can source your environment variables, then run Compose like so:

      set -a
      source .my-env
      docker-compose up -d
      Then you can reference the variables in docker-compose.yml using ${VARIABLE}, like so:

      db:
        image: "postgres:${POSTGRES_VERSION}"
      And here is more info from the docs, taken here: https://docs.docker.com/compose/compose-file/#variable-substitution

      When you run docker-compose up with this configuration, Compose looks for the POSTGRES_VERSION environment variable in the shell and substitutes its value in. For this example, Compose resolves the image to postgres:9.3 before running the configuration.

      If an environment variable is not set, Compose substitutes with an empty string. In the example above, if POSTGRES_VERSION is not set, the value for the image option is postgres:.

      Both $VARIABLE and ${VARIABLE} syntax are supported. Extended shell-style features, such as ${VARIABLE-default} and ${VARIABLE/foo/bar}, are not supported.

      If you need to put a literal dollar sign in a configuration value, use a double dollar sign ($$).

      And I believe this feature was added in this pull request: https://github.com/docker/compose/pull/1765

      The BASH solution:
      I notice folks have issues with Docker's environment variables support. Instead of dealing with environment variables in Docker, let's go back to basics, like bash! Here is a more flexible method using a bash script and a .env file.

      An example .env file:

      EXAMPLE_URL=http://example.com
      # Note that the variable below is commented out and will not be used:
      # EXAMPLE_URL=http://example2.com 
      SECRET_KEY=ABDFWEDFSADFWWEFSFSDFM

      # You can even define the compose file in an env variable like so:
      COMPOSE_CONFIG=my-compose-file.yml
      # You can define other compose files, and just comment them out
      # when not needed:
      # COMPOSE_CONFIG=another-compose-file.yml
      then run this bash script in the same directory, which should deploy everything properly:

      #!/bin/bash

      docker rm -f `docker ps -aq -f name=myproject_*`
      set -a
      source .env
      cat ${COMPOSE_CONFIG} | envsubst | docker-compose -f - -p "myproject" up -d
      Just reference your env variables in your compose file with the usual bash syntax (ie ${SECRET_KEY} to insert the SECRET_KEY from the .env file).

      Note the COMPOSE_CONFIG is defined in my .env file and used in my bash script, but you can easily just replace {$COMPOSE_CONFIG} with the my-compose-file.yml in the bash script.

      Also note that I labeled this deployment by naming all of my containers with the "myproject" prefix. You can use any name you want, but it helps identify your containers so you can easily reference them later. Assuming that your containers are stateless, as they should be, this script will quickly remove and redeploy your containers according to your .env file params and your compose YAML file.
    ```
