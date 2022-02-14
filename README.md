Add the following lines to your hosts file (/etc/hosts in Linux/Mac OS c:\Windows\System32\Drivers\etc\hosts in Windows):
```
127.0.0.1   backend.tmp.loc
127.0.0.1   frontend.tmp.loc
127.0.0.1   api.tmp.loc
```
Start/Stop/Down/Attach/Logs
```
If you work on Windows use make.bat command instead of make in the commands below.
```
Build environment
```
cd docker
make env-up
```
Start
```
cd docker
make env-start
```
Stop
```
cd docker
make env-stop
```
Down
```
cd docker
make env-down
```
Attach
```
Attach local standard input, output to a container in which php:7.4-fpm is working. Required to install Composer packages, generating and executing database migrations etc.
```
```
cd docker
make php-attach
```
Logs
```
cd docker
make php-logs
```