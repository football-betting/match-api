# Create RabbitMQ vhosts
echo "Create RabbitMQ vhosts and assign them to user"
docker exec match-api_rabbitmq /bin/sh -c "rabbitmqctl add_vhost Match"
docker exec match-api_rabbitmq /bin/sh -c "rabbitmqctl set_permissions -p Match nexus '.*' '.*' '.*'"
