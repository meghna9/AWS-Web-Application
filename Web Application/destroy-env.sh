#! /bin/bash

#! /bin/bash
#echo "AMI ID : ami-6051f000  $1"
#echo "key-name: meghnalaveti9 $2"
#echo "security-group: sg-861163ff $3"
#echo "launch-configuration: launchmeghna $4"
#echo "count: 1 $5"

aws autoscaling delete-auto-scaling-group --auto-scaling-group-name automeghna -
-force-delete

aws autoscaling delete-launch-configuration --launch-configuration-name launchme
ghna

meghnacloud=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].In
stanceId' --filter "Name=instance-state-name, Values=running"`

aws elb deregister-instances-from-load-balancer --load-balancer-name load-meghna
 --instances $meghnacloud

aws elb delete-load-balancer-listeners --load-balancer-name load-meghna --load-b
alancer-ports 80

aws elb delete-load-balancer --load-balancer-name load-meghna

aws ec2 terminate-instances --instance-ids $meghnacloud
~