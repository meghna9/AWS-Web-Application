#! /usr/bin/env bash

sudo apt-get update
sudo apt-get -y install git apache2 php-xml libapache2-mod-php php php-mysql curl php-curl zip unzip

cd /home/vagrant/mlaveti

sudo curl -sS https://getcomposer.org/installer | php

sudo php composer.phar require aws/aws-sdk-php

sudo systemctl enable apache2
sudo systemctl start apache2

sudo git clone git@github.com:illinoistech-itm/mlaveti.git

sudo rm -r /var/www/html/*
#sudo mkdir /var/www/html/vendor
#sudo mv vendor/* /var/www/html/vendor

sudo mv /home/ubuntu/mlaveti/app/* /var/www/html

php /var/www/html/dbddl.php