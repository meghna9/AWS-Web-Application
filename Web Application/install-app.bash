#! /usr/bin/env bash

sudo apt-get update
sudo apt-get -y install git apache2 php-xml libapache2-mod-php php php-mysql curl php-curl zip unzip php-mysqli
sudo apt-get install awscli

cd /home/ubuntu

sudo curl -sS https://getcomposer.org/installer | php
sudo cp composer.phar /usr/local/bin/composer

sudo systemctl enable apache2
sudo systemctl start apache2

sudo git clone git@github.com:illinoistech-itm/mlaveti.git

cd /home/ubuntu/mlaveti/week10/


chmod 777 install-app-env.sh
./install-app-env.sh

cd app

sudo composer require aws/aws-sdk-php
sudo composer require aws/aws-sdk-php-resources

cd /home/ubuntu

sudo rm -r /var/www/html/*
#sudo mkdir /var/www/html/vendor
#sudo mv vendor/* /var/www/html/vendor

sudo cp -r /home/ubuntu/mlaveti/Web Application/app/* /var/www/html

php /var/www/html/dbddl.php