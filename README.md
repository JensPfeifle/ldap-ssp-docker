# LDAP Self Service Password Docker

 Self Service Password is a PHP application that allows users to change their password in an LDAP directory. It was not developed by me, but is part of the [LDAP Tool Box project](https://ltb-project.org/). This is that, packaged up in a Docker container.

 See the the [respoitory](https://github.com/ltb-project/self-service-password) and the [documentation](https://ltb-project.org/documentation/self-service-password) for more information about LDAP Self Service Password.

## Getting Started

These instructions will get you up and running on your local machine for development and testing purposes.

### Prerequisites

Obviously, Docker must be [installed](https://docs.docker.acom/get-started/). Docker-compose is recommended.

### Building the image

Clone this repository with

```
git clone https://github.com/jenspfeifle/ldap-ssp-docker
```

And build with

```
docker build -t ldapssp .
```

## Starting the container

When starting the container, you must mount a directory from the host system to `/config` to provide the configuration files. You also probably want to expose the container's port 80 to be able to access the WebUI. Finally, you should set the APACHE_SERVER_NAME environment variable to match your deployment.

For example (if you built as shown above):

```
docker run -d -v /srv/appdata/ldapssp/config:/config -p 80:80 -e APACHE_SERVER_NAME=passwordreset.example.com ldapssp
```

If you have docker-compose, you can edit `docker-compose.yml` to set the configuration, then build and start the container with docker-compose. 
```
docker-compose up  -d --build ldapssp
```

Visit http://localhost:80/ and see if it works!

## Stopping the container
Find the container ID (the first column) with 
```
docker ps
```

Stop the container using the ID. For example: 
```
docker stop d45
```
The first few characters of the ID are enough.


## Configuration

If you started the container as above, you will now have the configuration directory mounted at `/srv/appdata/ldapssp/config`. 

Into this directory, three files can be placed to override the configuration of the software in the contianer. Example files are provided in the `config` folder. It is recommended to copy these and then adjust them to your needs. These files are
```
config.inc.local.php - LDAP SSP configuration file (see note below)
custom_background.png - custom background image
custom_logo.png - custom header logo
```

Any changes are immedately applied once you reload the page. Restarting the container is not required.

Note: for information on how to configure LDAP Self Service Password, see [the official documentation](https://ltb-project.org/documentation/self-service-password/latest/start).


If you edit the site configuration file `apache.conf` you must rebuild the container.

## Deployment

Generally, this container should be deployed behind a load balancer or reverse proxy that can provide SSL termination, if you want to make it available from the public internet.

## Versioning

The versions reflect those of the LDAP Self Service Password tool, adding a decimal for versioning of this project. (i.e. any version 1.3.x is based on LDAP SSP v1.3) For the versions available, see the [tags at ltb-project/self-service-password](https://github.com/ltb-project/self-service-password/releases). 

## Authors

* **[Jens Pfeifle](https://github.com/JensPfeifle)**

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thanks to the LDAP Tool Box project for a great tool!

