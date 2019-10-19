prepare-frontend:
	yarn --cwd frontend && \
	yarn --cwd frontend build

prepare-backend:
	composer --working-dir=backend install

prepare: prepare-frontend prepare-backend

run: prepare
	docker-compose up

test: prepare-backend
	php backend/vendor/bin/phpunit -c backend/phpunit.xml --coverage-text