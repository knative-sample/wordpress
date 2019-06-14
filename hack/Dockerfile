FROM registry.cn-hangzhou.aliyuncs.com/knative-sample/wp-base:fpm-alpine-20190530093241

ENV WORDPRESS_VERSION 5.2.1
ENV WORDPRESS_SHA1 65913a39b2e8990ece54efbfa8966fc175085794

COPY wordpress /var/www/html
COPY hack/start.sh /usr/local/bin/
COPY hack/php.ini /usr/local/etc/php/php.ini

CMD ["/usr/local/bin/start.sh"]
