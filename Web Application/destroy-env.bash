#! /bin/bash

#echo "Autoscaling group: automeghna $1"
#echo "launch configuration lauchmeghna $2"
#echo "load-balancer load-meghna $3"

aws autoscaling delete-auto-scaling-group --auto-scaling-group-name automeghna -
-force-delete

aws autoscaling delete-launch-configuration --launch-configuration-name $4

meghnacloud=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].In
stanceId' --filter "Name=instance-state-name, Values=running"`

aws elb deregister-instances-from-load-balancer --load-balancer-name load-meghna
 --instances $meghnacloud

aws elb delete-load-balancer-listeners --load-balancer-name load-meghna --load-b
alancer-ports 80

aws elb delete-load-balancer --load-balancer-name load-meghna

aws ec2 terminate-instances --instance-ids $meghnacloud
