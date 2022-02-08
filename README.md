Add the following lines to your hosts file (/etc/hosts in Linux/Mac OS):
```
127.0.0.1   backend.tmp.loc
127.0.0.1   frontend.tmp.loc
```
To build images
```
docker-compose build
```
To run containers
```
docker-compose up
```