#! /usr/bin/env bash

sudo apt-get update
sudo apt-get -y install git apache2 php-xml libapache2-mod-php php php-mysql curl php-curl zip unzip 
sudo apt-get install awscli

cd /home/ubuntu

sudo curl -sS https://getcomposer.org/installer | php

sudo php composer.phar require aws/aws-sdk-php

sudo systemctl enable apache2
sudo systemctl start apache2

sudo git clone git@github.com:illinoistech-itm/mlaveti.git

cd /home/ubuntu/mlaveti/week10/

chmod 777 install-app-env.sh
./install-app-env.sh

cd /home/ubuntu

sudo rm -r /var/www/html/*
#sudo mkdir /var/www/html/vendor
#sudo mv vendor/* /var/www/html/vendor

sudo cp /home/ubuntu/mlaveti/week10/app/* /var/www/html

php /var/www/html/dbddl.php