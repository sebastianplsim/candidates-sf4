FROM ubuntu:18.04

RUN export LC_ALL=C.UTF-8
RUN DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get install -y \
    git \
    curl \
    sudo \
    software-properties-common

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y tzdata
RUN ln -fs /usr/share/zoneinfo/Europe/London /etc/localtime
RUN dpkg-reconfigure --frontend noninteractive tzdata

RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php && apt-get update
RUN apt-get install -y \
    php7.2 \
    php7.2-curl \
    php7.2-zip \
    php7.2-mysql \
    php7.2-xml

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh && bash nodesource_setup.sh
RUN apt-get install nodejs -y
RUN npm install npm@6.4.0 -g
RUN npm install serverless@1.30.1 -g

RUN mkdir /opt/app
WORKDIR /opt/app
EXPOSE 8000
