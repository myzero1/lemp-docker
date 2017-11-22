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
```

- Go to env dir and copy docker-compose.yml.dist to docker-compose.yml

```
cd env
cp docker-compose.yml.dist docker-compose.yml
```

- Go to env/docker/nginx dir and vhost.conf.dist to vhost.conf

```
cd  env/docker/nginx
cp vhost.conf.dist vhost.conf
```


Usage
-----

You can then access Gii through the following URL:

```
http://localhost/path/to/index.php?r=myzero1
OR
http://localhost/path/to/index.php?r=myzero1/gii
```

or if you have enabled pretty URLs, you may use the following URL:

```
http://localhost/path/to/index.php/myzero1
OR
http://localhost/path/to/index.php/myzero1/gii
```
