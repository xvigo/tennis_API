# Tennis court reservation system API
Tennis court reservation system API using Laravel and SQLite.
## Overview

The API provides access to courts, reservations, users and court surfaces. It follows RESTful principles and communicates using JSON.

## Base URL

The base URL for all API endpoints is: `localhost:80/api/V1`

## Endpoints

### Users

- `POST /users`: Create a new user account. This endpoint is used to register a new user in the system. Upon successful registration, a bearer token will be returned in the response, which is required for authentication on all other endpoints.


- `GET /users`: Retrieve an array of user items.
- `GET /me`: Retrieve details of a the currently authenticated user.


### Reservations 

- `GET /reservations`: Retrieve an array of reservation items. Also supports filtering using GET parameters eg. *?courtId=9&phoneNumber=480-984-8944*
- `GET /reservations/{id}`: Retrieve details of a specific reservation item.
- `POST /reservations`: Create a new reservation item. Total price for the reservation is returned in response.
- `PUT /reservations/{id}`: Update a specific reservation item. Only author of the reservation is authorized.
- `DELETE /reservations/{id}`: Delete a specific reservation item. Only author of the reservation is authorized.

### Courts

- `GET /courts`: Retrieve an array of court items.
- `GET /courts/{id}`: Retrieve details of a specific court item.

### Court surfaces

- `GET /surfaces`: Retrieve an array of court surfaces items.
- `GET /surfaces/{id}`: Retrieve details of a specific court surface item.



## Running using Docker
```
$ docker-compose build
$ docker-compose up
```
