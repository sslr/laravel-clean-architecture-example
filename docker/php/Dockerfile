FROM php:7.4.3-fpm

LABEL MAINTAINER="ms.salari@gmail.com"

ARG WWW_DATA_USER
ARG ENVIRONMENT
ENV TZ=Asia/Tehran
ENV APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=DontWarn

RUN rm /var/lib/apt/lists/* -vrf && \
    apt-get clean && apt-get update

RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections

RUN apt-get update -y && apt-get install -y --no-install-recommends \
        g++ \
        apt-utils \
        libpcre3-dev \
        zlib1g-dev \
        libicu-dev \
        alien \
        libzip-dev \
        zip \
        git \
        libjpeg-dev \
        libpng-dev \
        libxml2-dev \
        libfreetype6-dev \
        libmcrypt-dev \
        libssl-dev \
        supervisor \
        tzdata \
        libmagickwand-dev \
        libmagickcore-dev \
        wget \
    && echo "upload_max_filesize = 8M" > /usr/local/etc/php/conf.d/upload.ini \
    && docker-php-ext-install exif intl pdo_mysql bcmath pcntl soap \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure gd --with-jpeg --with-freetype &&  \
       docker-php-ext-install gd zip

# Install php redis extension
# https://github.com/phpredis/phpredis#installingconfiguring


### only install opcache in production environment

RUN if [ "$ENVIRONMENT" == "production" ]; \
    then \
         docker-php-ext-install opcache; \
         docker-php-ext-configure opcache --enable-opcache; \
    fi

RUN pecl install redis imagick \
&& docker-php-ext-enable redis imagick

COPY opcache.ini /usr/local/etc/php/conf.d/opcache-recommended.ini

### packages needed for image optimization
RUN apt-get install -y \
                jpegoptim \
                optipng \
                pngquant \
                gifsicle


RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
 apt-get install -y build-essential nodejs && \
 npm install -g svgo

########  wkhtmltopdf:
RUN apt-get install -y \
libxrender1 \
libfontconfig1 \
libx11-dev \
libjpeg62 \
libxtst6 \
&& wget https://github.com/h4cc/wkhtmltopdf-amd64/blob/master/bin/wkhtmltopdf-amd64?raw=true -O /usr/local/bin/wkhtmltopdf \
&& chmod +x /usr/local/bin/wkhtmltopdf \
&& ln -s /usr/local/bin/wkhtmltopdf /usr/local/bin/wkhtmltopdf-amd64




#####   wkhtmltoimage:
RUN apt-get install -y \
    libxrender1 \
    libfontconfig1 \
    libx11-dev \
    libjpeg62 \
    libxtst6 \
    && wget https://github.com/h4cc/wkhtmltoimage-amd64/blob/master/bin/wkhtmltoimage-amd64?raw=true -O /usr/local/bin/wkhtmltoimage \
    && chmod +x /usr/local/bin/wkhtmltoimage \
    && ln -s /usr/local/bin/wkhtmltoimage /usr/local/bin/wkhtmltoimage-amd64


## install composer inside container
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

## setup user group permission

RUN usermod -u ${WWW_DATA_USER} www-data && \
    groupmod -g ${WWW_DATA_USER} www-data && \
    chown -R www-data:www-data /var/www/


#### make bash files work both on windows system and unix based systems
RUN apt-get install -y dos2unix

# change TimeZone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && dpkg-reconfigure -f noninteractive tzdata

### Run supervisor
#RUN /usr/bin/supervisord -c /etc/supervisor/supervisord.conf && \
#    service supervisor start

### service supervisor start

EXPOSE 9000

WORKDIR /var/www/

## Cleanup
RUN apt-get purge -y \
    g++ \
    && rm -rf /var/lib/apt/lists/*


CMD service supervisor start && php-fpm
