FROM php:7.4-fpm-alpine

RUN apk add --no-cache nginx wget bash

# Install npm and node
RUN apk add --update npm

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
    /usr/local/bin/composer install --no-dev

RUN chown -R www-data: /app


COPY package.json ./

RUN npm install

## Make our shell script executable
RUN chmod +x startup.sh

CMD sh /app/docker/startup.sh