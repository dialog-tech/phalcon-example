# phalcon-example

clone repo
```
git clone [uri]
cd phalcon-example
```
build image
```
docker build -t dialogtech/phalcon-example .
```
run container
```
docker run --name phalcon-example -p 8080:80 -d -v /[workspace location]/phalcon-example/docker/nginx-site.conf:/etc/nginx/sites-available/default.conf -v /[workspace location]/phalcon-example/:/var/www/html dialogtech/phalcon-example
```
you can then visit http://[your docker ip]:8080 to see the demo

if you are using docker-toolbox, get your IP with `docker-machine ls`

you can read about the phalcon example here: https://docs.phalconphp.com/en/latest/reference/tutorial.html#checking-your-installation
