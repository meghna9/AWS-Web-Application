#! /usr/bin/env bash

aws rds create-db-instance --db-name meghnastorage --db-instance-identifier mpl-db --db-instance-class db.t1.micro --engine MySQL --master-username controller9 --master-user-password meghna999 --allocated-storage 5 --vpc-security-group-ids sg-861163ff --publicly-accessible --port 3306 --allocated-storage 5
#echo "creating DB may take some time"
aws rds wait db-instance-available --db-instance-identifier mpl-db

aws sns create-topic --Studentapp

aws sns subscribe --topic-arn arn:arn:aws:sns:us-west-2:131515873733:Studentapp --protocol email --notification-endpoint mlaveti@hawk.iit.edu

aws sqs create-queue --queue-name my-queue --attributes '{ "RedrivePolicy":"{\"deadLetterTargetArn\":\"arn:aws:sqs:us-west-2:0123456789012:deadletter\", \"maxReceiveCount\":\"5\"}"}'

aws s3 mb s3://raw-mpl

aws s3 mb s3://finished-mpl
