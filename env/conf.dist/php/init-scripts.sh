#!/bin/bash

# for crontable
\cp -rf /root/init-scripts/crontab /etc/crontab
/etc/init.d/cron start

# for golang center
cd /app/center
chmod 777 server
nohup  ./server &

# for php-fpm
exec php-fpm
