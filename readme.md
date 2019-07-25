# Sample laravel project
This project includes a docker container based on `php-apache` image.

It is under development, So I've mounted the source code from host to the container. On production environment you should remove these volumes.

## Installation guide
Follow these steps to simply run the project.

### Clone the project
Clone this repository to your local machine using the following command
```bash
git clone 
```

### Environment variables
Setting up the container (OS) level environment variables like $USER id `WWW_DATA_USER_ID`. So every single file which is created or modified by container users will be owned by $USER because of user id mapping between the host and the containers.
```bash
cd /path-to-project
cp .env.example .env
vim .env
```


### Running the containers
Open the terminal and type the following command:
```bash
docker-compose up -d 
```

### Bootup the application

Only the first time that you want to run the application, you need to execute the following command.
It will install the dependencies, creates .env laravel file, generates the application key and changes required directory permissions.

```bash
docker-compose exec --user www-data app bootup
```


## API Documentation
In the root of the project there is a postman collection which contains the API doc.
Also you can find the API documentation in the following address.

[API Documentation]()

## Tests
To run tests, in the terminal type the following command:
```bash
docker-compose exec app vendor/bin/phpunit
```

## Images/Containers

`app`
php:7.3.5-apache


## Licence

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
