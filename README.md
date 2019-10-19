# Temper's Assignment
## Dependencies
In order to run the project, you will need to have `PHP v7.2`, `yarn`, `docker`, `docker-compose`  and the following extensions enabled:  `php-mbstring` , `php-dom`, `php-json`.

## Running Instructions
Just `cd` into the project's directory and run: `make run`. This will install both backend and frontend dependencies and will run the web server on port `8888`.

## Test
To test, run `make test`. It will run the backend's tests and will only show test coverage results if you have `xdebug` extension enabled in your PHP setup.