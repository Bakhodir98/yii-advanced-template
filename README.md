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
make env-up
```
Start
```
make env-start
```
Stop
```
make env-stop
```
Down
```
make env-down
```
Attach
```
Attach local standard input, output to a container in which php:7.4-fpm is working. Required to install Composer packages, generating and executing database migrations etc.
```
```
make php-attach
```
Logs
```
make php-logs
```