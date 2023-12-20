# api-platform-links-handler-trait error test

## Docker
```shell
docker-compose up -d
```

## Create and/or reset the database
```shell
./resetDb.sh
```

## Start the project
```shell
symfony server:start
```

## Execute the SUCCESSFUL graphql query
```shell
curl 'https://127.0.0.1:8001/api/graphql' \
  -H 'authority: 127.0.0.1:8001' \
  -H 'accept: application/json' \
  -H 'accept-language: en-US,en;q=0.9' \
  -H 'content-type: application/json' \
  --data-raw $'{"query":"query TestEntity($id: ID\u0021) {\\n  testEntity(id: $id) {\\n    id\\n    state\\n  }\\n}","variables":{"id":"/api/test_entities/2"},"operationName":"TestEntity"}' \
  --compressed
```

## Execute the UNSUCCESSFUL graphql query
```shell
curl 'https://127.0.0.1:8001/api/graphql' \
  -H 'authority: 127.0.0.1:8001' \
  -H 'accept: application/json' \
  -H 'accept-language: en-US,en;q=0.9' \
  -H 'content-type: application/json' \
  --data-raw $'{"query":"query TestEntity($id: ID\u0021) {\\n  testEntity(id: $id) {\\n    id\\n    state\\n  }\\n}","variables":{"id":"/api/test_entities/1"},"operationName":"TestEntity"}' \
  --compressed
```
