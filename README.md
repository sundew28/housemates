# Housemates Code Test

An application to send API request and receive response as JSON. I have used laravel 10 framework to create the application and JWT to set up the authentication. In some API endpoints i have made use of implicit model binding for smoother and faster results.

## Requirements

- PHP :- 8.1 or above
- MySQL :- 5.6 or above
- Composer :- To install the dependencies
- Postman :- To test the API calls

## Install

Clone the repo to your working directory using your favorite CLI console (eg: GitBash, PowerShell, cmd or any of your choice) 

```bash
$ git clone https://github.com/sundew28/housemates.git
```

Once you are done cloning the repo next would be to run composer in your console to install laravel framework dependencies by running the below composer command. Make sure you have composer installed

Via Composer

```bash
$ composer install
```

Next would be to change your .env file to set your database credentials in your root .env file. Once completed run the below command in your console which
will set up your database tables migraion and seeding and setting up your JWT secret key in .env file.

```bash
$ composer run setup
```
This would create all the basic tables to run your application smoothly. I have created a basic user account for easy to use in this case.

```php
// User account
   Email : admin@housemates.io
   Password : adminadmin
```

## Security

For API authentication / security i have implemented the JWT auth instead of using sanctum or OAuth. JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed. JWT authentication has aided the wider adoption of stateless API services.

Your JWT authentication key is already set in the .env or enviorment file.

Check your .env file if the secret key is generated with hash alogorithm, an example like below
```
JWT_SECRET=AYBKioTi6AOI1EOEMJkmrH8vHDquUnmot4ff6w7d4XBB3WC93ceqmSMJAtW8kxco

JWT_ALGO=HS256

```

## Testing the Application

All API endpoints require a post/get/put/delete request to be made which is already made mandatory in the api route file for secure transfer of data.

### Task 

The instructions were to call API end points through the console command. Listed like below after you login.

Login :

```bash
Url : <define your localhost with port/virtual domain>/api/login
Params : 
- email <already a user account with email created. Please refer the doc for the informations>,
- password
```
The API will return you with a secure token generated for use. Next you can use the token be set under the Authorization tab.

```
Authorization --> Type (Select Bearer Token)
```
### API Endpoints

1) POST <define your localhost with port/virtual domain>/api/property - create a new property

    Parameters required

    ```bash
    name
    address
    ```

2) GET <define your localhost with port/virtual domain>/api/property - Fetch all properties.

3) PUT <define your localhost with port/virtual domain>/api/property/{id} - Edit a specific property. This is set in a way to update the specific property

    Parameters required

    ```bash
    id
    name
    address
    ```

4) DELETE <define your localhost with port/virtual domain>/api/property/{id} - Delete a specific property.

    Parameters required

    ```bash
    id   
    ```

5) POST <define your localhost with port/virtual domain>/api/room - Create a new room for a property.

    Parameters required

    ```bash
    property_id
    name
    size
    ```

6) GET <define your localhost with port/virtual domain>/api/room/{propertyId} - Fetch all rooms of a specific property.

    Parameters required

    ```bash
    property_id    
    ```

7) PUT <define your localhost with port/virtual domain>/api/room/{id} - Edit a specific room.This is set in a way to update the specific room.
    
    Parameters required

    ```bash
    id
    name
    size
    ```

8) DELETE <define your localhost with port/virtual domain>/api/room/{id} - Delete a specific room.
   
   Parameters required

    ```bash
    id   
    ```

## Improvements

- Would have added the frontend.
- I would like to make improvement to the error capturing by making use of error handler in laravel, make use of JsonResponse error handling
- Check the quality of code by using tools like PHPsniffer, PHP-CS-Fixer with PSR2 and Symfony standards (much extra checks, closer to Laravel than PSR2).
- Writing unit tests and integration tests to ensure API functionality
- Keep the code as simple as possible and following S.O.L.I.D princples.
- Improving validation of inputs.
- Leverage caching techniques to improve API response times like Redis or Memcached.
- Enhancing API development with versioning, rate limiting, and request throttling features.
