FROM golang:1.24 AS godev
FROM wordpress:cli-2.12 AS wpcli

FROM wordpress:6.8.2

# Copy go dev 
COPY --from=wpcli /usr/local/bin/wp /usr/local/bin/wp
COPY --from=godev /usr/local/go /usr/local/go

ARG USER_UID=1000
ARG USER_GID=1000

RUN apt-get update
## common tools and libraries (probably not required in prod)
RUN apt-get install -y git wget zip unzip 

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
