FROM debian:bookworm-slim
RUN apt-get update && apt-get install -y wget gnupg apt-transport-https ca-certificates

# Install PHP 8.1
RUN wget -qO - https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /usr/share/keyrings/sury-archive-keyring.gpg
RUN echo "deb [signed-by=/usr/share/keyrings/sury-archive-keyring.gpg] https://packages.sury.org/php/ bookworm main" | tee /etc/apt/sources.list.d/sury-php.list
RUN apt-get update && apt-get install -y --no-install-recommends php8.1
RUN apt-get install -y composer php8.1-cli \
    php8.1-common php8.1-mysql php8.1-zip \
    php8.1-gd php8.1-mbstring php8.1-curl \
    php8.1-xml php8.1-bcmath php8.1-intl \
    php8.1-fileinfo

WORKDIR /php
