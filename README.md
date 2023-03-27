# Survey Form with dynamic questions

### Description
In this app, 
User can register,login and logout.
To create or view survey user must authenticate.
User can create surveys with dynamic questions and different question types.
Customers can submit the survey in published survey link.
After submitting the survey, an email will be sent to survey's owner.

## Installation

Use PHP 8+, Laravel 10+ and MySQL.

```shell
git clone https://github.com/Y2theK/survey-test.git
```

```shell
cp .env.example .env
```
```shell
composer install
```

```shell
php artisan key:generate
```

```shell
npm install && npm run dev
```

**That's it!**

<br/>

## Backend API Routes

#### Auth Routes

```shell
POST : {{base_url}}/v1/register 

Example Input : 
{
    "name" : "Jon Doe",
    "email" : "jondoe@gmail.com",
    "password" : "12312312"
}

Example Output : 
{
    "user": {
        "name": "Jon Doe",
        "email": "jondoe@gmail.com"
    },
    "token": "5|VzxTlDSJvFQv7bVBcRkP3Jai68yYovp5PUFgCrqB",
    "token-type": "Bearer"
}
```

```shell
POST : {{base_url}}/v1/login

Example Input : 
{
    
    "email" : "jondoe@gmail.com",
    "password" : "12312312"
}

Example Output : 
{
    "user": {
        "name": "Jon Doe",
        "email": "jondoe@gmail.com"
    },
    "token": "5|VzxTlDSJvFQv7bVBcRkP3Jai68yYovp5PUFgCrqB",
    "token-type": "Bearer"
}
```

```shell

POST : {{base_url}}/v1/logout

Example Output : 
{
    "message": "User loggout "
}
```

#### Surveys Routes ( NEED TO AUTHENTICATE )

```shell
GET : {{base_url}}/v1/surveys

Example Output : 
{
    "message": "Get All Surveys",
    "data": {
        "surveys": [
            {
               "id": 1,
                "name": "super survey",
                "slug": "super-survey-12345",
                "questions": [
                    {
                        "id": 1,
                        "question": "Favorite Movie",
                        "type": "text"
                    },
                ]
            }
            {
                "id": 2,
                "name": "super survey",
                "slug": "super-survey-23543",
                "questions": [
                    {
                        "id": 2,
                        "question": "name",
                        "type": "text"
                    },
                    {
                        "id": 3,
                        "question": "DOB",
                        "type": "date"
                    },
                    {
                        "id": 3,
                        "question": "Phone",
                        "type": "number"
                    },
                ]
            },
        }
    }
}

```

```shell
GET : {{base_url}}/v1/surveys/{surveyId}

Example Output : 
{
    "message": "Get Survey",
    "data": {
        "id": 1,
        "name": "Pyay kyi",
        "slug": "pyay-kyi-6421b97e526e4",
        "questions": [
            {
                "id": 1,
                "question": "Your Lucky Number",
                "type": "number"
            },
            {
                "id": 2,
                "question": "Your Mom Birthday",
                "type": "date"
            }
        ]
    }
}
```

```shell
POST : {{base_url}}/v1/surveys

Example Input : 
    name : "Pyay kyi",
    questions[0][type] : "text"
    questions[0][question] : "Favorite Color"
    questions[1][type] : "date"
    questions[1][question] : "Birth Date"
    
Example Output : 
{
    "message": "Survey Created",
    "data": {
        "id": 24,
        "name": "Pyay kyi",
        "slug": "pyay-kyi-6421b97e526e4",
        "questions": [
            {
                "id": 86,
                "question": "Favorite Color",
                "type": "text"
            },
            {
                "id": 87,
                "question": "Birth Date",
                "type": "date"
            }
        ]
    }
}
```

```shell
DELETE : {{base_url}}/v1/surveys/{surveyId}

Example Output : 
{
    "message": "Survey Deleted"
}

```

## Public ROUTES
```shell
GET : {{base_url}}/survey-form/{surveySlug}

POST : {{base_url}}/survey-form/{surveySlug}
```

## Example Email
<<<<<<< HEAD
 ![Survey Submitted mail](https://.png)
=======
<img src="https://github.com/Y2theK/survey-test/blob/master/public/mailSS.png" alt="Survey Submitted Mail" width="50%">
>>>>>>> f5b99b90504d596c58db48642a0eb05a9feb840c
