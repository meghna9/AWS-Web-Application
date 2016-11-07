#! /usr/bin/env bash

export AWS_ACCESS_KEY_ID=AKIAJRP6EG3R5YZE5A7Q
export AWS_SECRET_ACCESS_KEY=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
export REGION=us-west-2

aws rds create-db-instance --db-name meghnastorage --db-instance-identifier mpl-db --db-instance-class db.t1.micro --engine MySQL --master-username controller9 --master-user-password meghna999 --allocated-storage 5 --vpc-security-group-ids sg-861163ff --publicly-accessible --port 3306 --allocated-storage 5
#echo "creating DB may take some time"
aws rds wait db-instance-available --db-instance-identifier mpl-db

aws sns create-topic --Studentapp

aws sns subscribe --topic-arn arn:null --protocol email --notification-endpoint mlaveti@hawk.iit.edu

aws sqs create-queue --queue-name my-queue --attributes '{ "RedrivePolicy":"{\"deadLetterTargetArn\":\"arn:aws:iam::131515873733:deadLetter\", \"maxReceiveCount\":\"5\"}"}'

aws s3 mb s3://raw-mpl

aws s3 mb s3://finished-mpl
