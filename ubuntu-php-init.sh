#!/bin/bash
sudo apt-get update && \
sudo apt -y install software-properties-common && \
sudo add-apt-repository ppa:ondrej/php && \
sudo apt-get install php7.4-cli php7.4-bcmath php7.4-bz2 php7.4-common php7.4-curl php7.4-dev
php7.4-fpm php7.4-gd php7.4-intl php7.4-json php7.4-mbstring php7.4-mysql php7.4-opcache php7.4-sqlite3 php7.4-xml php7.
4-xsl php7.4-zip unzip zip && \
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
sudo php composer-setup.php --install-dir=/usr/bin --filename=composer && \
sudo rm composer-setup.php && \
echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc && \
echo "alias artisan='php artisan'" >> ~/.bashrc && \
source ~/.bashrc
# wget -c http://dev.mysql.com/get/mysql-apt-config_0.8.15-1_all.deb && \
# sudo dpkg -i mysql-apt-config_0.8.15-1_all.deb && \
# sudo rm mysql-apt-config_0.8.15-1_all.deb && \
# sudo apt update
