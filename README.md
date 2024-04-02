# activity-app


## Commands

### Run Project

To start the project, run:

```bash
make init
```

```bash
make start
```

### Run Tests
To execute tests, use:

```bash
make init-test
```

```bash
make run-test
```


## Endpoints

Adventure
``` 
curl --location --request GET 'http://localhost:8080/api/activity/adventure?id=12b8d474-1b32-4a2b-8aeb-aaefd636fd89' \
--header 'Content-Type: application/json'
````

```
curl -- --request POST 'http://localhost:8080/api/activity/adventure' \
--header 'Content-Type: application/json' \
--data '{
    "id": "12b8d474-1b32-4a2b-8aeb-aaefd636fd89",
    "name": "x",
    "description": "x",
    "material": {
        "name" : "x",
        "type" : "x"
    }
}'
```


OnlineGame
``` 
curl --location --request GET 'http://localhost:8080/api/activity/onlineGame?id=12b8d474-1b32-4a2b-8aeb-aaefd636fd89' \
--header 'Content-Type: application/json'
````

```
curl --location --request POST 'http://localhost:8080/api/activity/onlineGame' \
--header 'Content-Type: application/json' \
--data '{
    "id": "12b8d474-1b32-4a2b-8aeb-aaefd636fd89",
    "name": "x",
    "description": "x",
    "url": "https://x.com"
}'
```

Sport
``` 
curl --location --request GET 'http://localhost:8080/api/activity/sport?id=12b8d474-1b32-4a2b-8aeb-aaefd636fd89' \
--header 'Content-Type: application/json'
````

```
curl --location --request POST 'http://localhost:8080/api/activity/sport' \
--header 'Content-Type: application/json' \
--data '{
    "id": "12b8d474-1b32-4a2b-8aeb-aaefd636fd89",
    "name": "x",
    "description": "x",
    "type": "x"
}'
```