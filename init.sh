# Create RabbitMQ vhosts
echo "Create RabbitMQ vhosts and assign them to user"
docker exec match-api_rabbitmq /bin/sh -c "rabbitmqctl add_vhost match.api.to.match"
docker exec match-api_rabbitmq /bin/sh -c "rabbitmqctl set_permissions -p match.api.to.match admin '.*' '.*' '.*'"
