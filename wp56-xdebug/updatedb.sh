docker exec -it `docker ps | grep wordpress | awk '{print $1}' | tr -d \n` /usr/bin/mysqldump -u root -psomewordpress wordpress   | grep -v "mysqldump:" > db-entrypoint/dump.sql
