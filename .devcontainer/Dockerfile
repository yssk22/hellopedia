FROM golang:1.24 AS godev
FROM wordpress:cli-2.12 AS wpcli
FROM google/cloud-sdk:latest AS cloud-sdk
FROM wordpress:6.8.2

# Copy go dev 
COPY --from=wpcli /usr/local/bin/wp /usr/local/bin/wp
COPY --from=godev /usr/local/go /usr/local/go

ARG USER_UID=1000
ARG USER_GID=1000

RUN apt-get update
## common tools and libraries (probably not required in prod)
RUN apt-get install -y git wget zip unzip gpg

## PHP extensions
RUN apt-get install -y libpq-dev libzip-dev
RUN docker-php-ext-install pgsql pdo_pgsql

## Google Cloud SDK
RUN 
RUN echo "deb [signed-by=/usr/share/keyrings/cloud.google.gpg] https://packages.cloud.google.com/apt cloud-sdk main" | \
	tee -a /etc/apt/sources.list.d/google-cloud-sdk.list && curl https://packages.cloud.google.com/apt/doc/apt-key.gpg | \
	gpg --dearmor -o /usr/share/keyrings/cloud.google.gpg && apt-get update -y && apt-get install google-cloud-cli -y
    
## postgresql for wordpress
RUN wget -O /usr/src/postgresql-for-wordpress.tar.gz https://github.com/PostgreSQL-For-Wordpress/postgresql-for-wordpress/archive/refs/tags/v3.4.1.tar.gz
RUN tar -xzf /usr/src/postgresql-for-wordpress.tar.gz -C /usr/src/
RUN mv /usr/src/postgresql-for-wordpress-3.4.1/pg4wp /var/www/html/wp-content/plugins/pg4wp
RUN cp /var/www/html/wp-content/plugins/pg4wp/db.php /var/www/html/wp-content/db.php

## required for wpcli
RUN apt-get install -y less 

RUN groupadd --gid $USER_UID vscode \
	&& useradd -s /bin/bash --uid $USER_UID --gid $USER_GID -m vscode \
	&& usermod -a -G www-data vscode \
	&& usermod -a -G sudo vscode \
	&& apt-get install -y sudo \
	&& echo "vscode ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers.d/vscode

USER vscode

ENV GOROOT /usr/local/go
ENV PATH $PATH:/usr/local/bin:/usr/local/go/bin

ENTRYPOINT ["apache2-foreground"]
