FROM wyveo/nginx-php-fpm:php80

WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chown nginx -R /usr/share/nginx/storage
