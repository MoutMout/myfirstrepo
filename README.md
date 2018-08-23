# Mock API

An api to distribute mocks 

You need a few software installed to run this project:

* An unix system
* PHP >= 7.1
* Composer
* PostgreSQL > 9
* Postgis

Usefull but not mandatory
* Make
* Docker

## Configure

Copy the .env.dist file to .env to configure you env-dependant variables

## Build

This project assumes that you have both [composer](https://getcomposer.org) and `make` binaries accessible in your $PATH

```
make install
```
installs dependencies

```
make build
```
prepare the project with fixtures and migrations

## Test

```
make test
```

Phpspec will test that your code is doing what it should.
Behat will run end to end tests on pretty much all key features
Dredd performs a documentation test to check whether the implementation is done accordingly to the documentation.

## Analyse

```
make analysis
```

Runs static analysis tools to enhance your code

## Contribute

`make analysis` will run at every commit.
`make test` will run at every push. Be sure to have your fixtures right !

Refer to the general coding guide lines of wizards / sodexo / your team.
On this project, you must create your branch on your fork and your merge requests againt master.
__Never__ skip the test or the analysis !

## Document

Document your code with the appropriate @SWG & @JMS annotations so nelmioApiDocBundle can generate the proper doc.
ìf you want to automatically update your swagger documentation according to your annotations & code, run this command:
`php bin/console dump:api-doc`

you can then have the documentation available on 
`http://127.0.0.1:8042/`
by starting a swagger-ui docker container with this command
`docker run -p 8042:8080 -e SWAGGER_JSON=/def/apidoc.json -v $PWD:/def swaggerapi/swagger-ui`
