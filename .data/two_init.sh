#!/bin/bash

mysql -u root -pAdmin2015  -e "create user 'root'@'%' IDENTIFIED BY 'theRipper'"
mysql -u root -pAdmin2015  -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'"
