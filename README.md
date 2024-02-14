## How to run the code?

### Docker

Please use **make** tool to run the code:
- Build docker: `make build`
- Get result of code challenge: `make result`
- Check code: `make code-style`
- Analyse code: `make analyse-code`
- Unit Test: `make test`

You can run `make enter` and execute these commands directly `composer {start,test,code-style,analyse-code}` inside the Docker container

### Without Docker

Install **php8.2** and **composer** 
- Install all dependencies: `composer install`
- Get result of code challenge: `composer start`
- Check code: `composer code-style`
- Analyse code: `composer analyse-code`
- Unit Test: `composer test`
