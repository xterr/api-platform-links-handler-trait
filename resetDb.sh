#!/bin/bash

./bin/console doctrine:schema:drop --force --full-database

rm migrations/Version*
rm -rf var/cache/*

./bin/console make:migration
./bin/console doctrine:migrations:migrate --no-interaction

./bin/console doctrine:fixtures:load --no-interaction --env=dev || exit 1
