# HOW-TO

This guide helps you to build this testing framework for Prestashop with Payfort Start plugin installed.


## Create base Prestashop instalation

```
cd app
docker build -t payfortstart/prestashop-app .
```

### Run prestashop instance for configuration.
Create a Demo customer with login **demo@example.com** and password **12345678**
```
docker run --name app -d -p 80:80 payfortstart/prestashop-app
```

### After instalation remove folder /var/www/html/install
```
docker exec -it app rm -fr /var/www/html/install
```

### And change admin folder to the one recomended by prestashop
When accessing http:s//app/admin. Save this new admin folder for later use.
```
docker exec -it app mv /var/www/html/admin /var/www/html/[new_admin_folder]
```



### Commit new configured image
```
docker commit -m "Prestashop configured" app payfortstart/prestashop-app:configured
docker stop app
docker rm app
```


## Add Payfort Start plugin

```
cd ../app-plugin
docker build -t payfortstart/prestashop-plugin .
```

### Run prestashop instance with plugin for configuration.
Activate payfortstart plugin and setup credentials with payment accepted
```
docker run --name app -d -p 80:80 payfortstart/prestashop-plugin
```
### Commit new configured prestashop with plugin payfortstart ready
```
docker commit -m "Prestashop with Payfort Start configured" app payfortstart/prestashop-plugin:configured
docker stop app
docker rm app
```
-


## Running tests
```
cd ../test
docker build -t payfortstart/prestashop-test .
```

### Run the prestashop app
```
docker run -d --name app payfortstart/prestashop-plugin:configured
```

### Run test image with phantomjs running
```
docker run -d --name test --link app:app payfortstart/prestashop-test
```
### Run tests against test image
```
docker exec -it test /tests/vendor/bin/phpunit /tests/payfort.php
```

Output of the test should be

```
PHPUnit 5.7.5 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 22.49 seconds, Memory: 3.50MB

OK (1 test, 1 assertion)
```






