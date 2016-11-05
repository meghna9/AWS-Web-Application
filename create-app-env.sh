#!/bin/bash

aws rds create-db-instance --db-name meghnastorage --db-instance-identifier mpl-db --db-instance-class db.t1.micro --engine MySQL --master-username controller9 --master-user-password meghna999 --allocated-storage 5 --vpc-security-group-ids sg-861163ff --publicly-accessible --port 3306 --allocated-storage 5

#echo "creating DB may take some time"
aws rds wait db-instance-available --db-instance-identifier mpl-db

