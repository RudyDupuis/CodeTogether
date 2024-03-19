ARG PHP_VERSION=8.2

########### BASE ###########
FROM php:${PHP_VERSION}-fpm-alpine AS base

# persistent / runtime deps
RUN apk add --no-cache \
    acl \
    fcgi \
    file \
    gettext \
    openssl

# install required php extension
ARG APCU_VERSION=5.1.21
RUN set -eux ;\
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev libzip-dev zlib-dev; \
    docker-php-ext-configure zip;\
    docker-php-ext-install -j$(nproc) intl zip ;\
    pecl install apcu-${APCU_VERSION} ;\
    pecl clear-cache; \
    docker-php-ext-enable opcache apcu intl;\
    runDeps="$( \
    scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
    | tr ',' '\n' \
    | sort -u \
    | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )"; \
    apk add --no-cache --virtual .api-phpexts-rundeps $runDeps ; \
    apk del .build-deps

# set working directory
USER 82
WORKDIR /srv/api
USER 0

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install symfonyCli
RUN set -eux;\
    apk add --no-cache --virtual .install_deps bash ;\
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash ;\
    apk add symfony-cli ;\
    apk del .install_deps

###> recipes ###
###> doctrine/doctrine-bundle ###
RUN apk add --no-cache --virtual .pgsql-deps postgresql-dev; \
    docker-php-ext-install -j$(nproc) pdo_pgsql; \
    apk add --no-cache --virtual .pgsql-rundeps so:libpq.so.5; \
    apk del .pgsql-deps
###< doctrine/doctrine-bundle ###


########### DEVELOPMENT ###########
FROM base AS development
ARG XDEBUG_VERSION=3.3.1
VOLUME /srv/api
WORKDIR /srv/api

ENV UTILS \
    git \
    nano \
    openssh \
    tree  \
    util-linux \
    iputils \
    grep \
    iproute2 \
    mlocate \
    bash \
    bash-completion \
    bind-tools
ENV SONARLINT_DEP \
    openjdk17-jre-headless

# install aditionnal package for development
RUN apk add --no-cache $UTILS $SONARLINT_DEP \
    --update linux-headers \
    postgresql-client

# installing xdebug
RUN set -eux; \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS; \
    pecl install xdebug-$XDEBUG_VERSION; \
    docker-php-ext-enable xdebug; \
    apk del .build-deps

# copying conf
COPY docker/api-platform/api-platform.dev.ini $PHP_INI_DIR/conf.d/api-platform.ini

COPY docker/dev/init.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/init.sh

CMD ["/usr/local/bin/init.sh"]

