#! /bin/bash
#echo "AMI ID : ami-6051f000  $1"
#echo "key-name: meghnalaveti9 $2"
#echo "security-group: sg-861163ff $3"
#echo "launch-configuration: launchmeghna $4"
#echo "count: 3 $5"

export AWS_ACCESS_KEY_ID=AKIAJRP6EG3R5YZE5A7Q
export AWS_SECRET_ACCESS_KEY=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


aws ec2 run-instances --image-id $1  --key-name $2 --security-group-ids $3 --instance-type t2.micro --count $5 --user-data file://installapp.sh

meghnacloud=`aws ec2 describe-instances  --query 'Reservations[*].Instances[].InstanceId' --filters "Name=instance-state-name, Values=pending"`

aws ec2 wait instance-running --instance-ids $meghnacloud

#echo" Attach load balancer and register instances"
aws elb create-load-balancer --load-balancer-name load-meghna --listeners Protocol=HTTP,LoadBalancerPort=80,InstanceProtocol=HTTP,InstancePort=80 --subnets subnet-e098b184


#echo "Attach instances to load balancers"
aws elb register-instances-with-load-balancer --load-balancer-name load-meghna --instances $meghnacloud

#echo "Create launch configuration"
aws autoscaling create-launch-configuration --launch-configuration-name $4 --image-id $1 --key-name $2 --instance-type t2.micro

#echo "Autoscaling"
aws autoscaling create-auto-scaling-group --auto-scaling-group-name automeghna --launch-configuration $4 --availability-zone us-west-2b --load-balancer-name load-meghna --max-size 5 --min-size 0 --desired-capacity 1



