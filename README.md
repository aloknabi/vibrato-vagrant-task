# vibrato-vagrant-task

This is a vagrant solution standing up a LAMP stack with chef-solo as the provisioner. This demonstrates an n-tier architecture with a vagrant multi-machine setup. 

Web tier -> Apache, PHP
Cache tier -> Redis
Database tier -> MySQL

It includes a simple php app that demonstrates querying the database and saving the result in redis. Subsequent queries can pull result directly from the redis cache. When the TTL has expired the database will be queried again (until TTL has expired).

## Instructions

clone repository

run `vagrant up`

visit http://172.16.111.41/total.php