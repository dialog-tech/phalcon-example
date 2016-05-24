FROM dialogtech/php7-nginx-phalcon:1.0.0
MAINTAINER Thomas Cooper <tom.cooper@dialogtech.com>

COPY docker/nginx-site.conf /etc/nginx/sites-available/default.conf
COPY docker/php.ini /etc/php/7.0/fpm/php.ini
