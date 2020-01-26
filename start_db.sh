#!/bin/bash
docker run --name test-mysql -p 3306:3306 -e MYSQL_DATABASE=laravel -e MYSQL_ROOT_PASSWORD=test -d mysql:5.7.29
