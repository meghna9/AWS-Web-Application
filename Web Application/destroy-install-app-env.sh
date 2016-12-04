#! /usr/bin

aws rds delete-db-instance --db-name meghnastorage --db-instance-identifier mpl-
db --db-instance-class db.t1.micro --engine MySQL --master-username controller9
--master-user-password meghna999 --allocated-storage 5 --vpc-security-group-id s
g-861163ff --publicly-accessible --port 3306 --allocated-storage 5

aws sqs delete-queue --queue-name my-queue --attributes '{ "RedrivePolicy":"{\"d
eadLetterTargetArn\":\"arn:aws:iam::131515873733:deadLetter\", \"maxReceiveCoun\
":\"5\"}"}'

aws s3 rm s3://raw-mpl

aws s3 mb s3://finished-mpl
~
~