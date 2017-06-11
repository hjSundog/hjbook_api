# API for Books

---

## GET books/

---

Get All Book Information

##### Authorization

---

Yes

##### Parameters

---

No Parameters

##### METHOD

---

GET

##### EXAMPLE

---

    GET index.php/book/

##### RESULT

---

*** JSON EXAMPLE ***

    {
      {
        "book_id": 1,
        "book_name": "Digital Castle",
        "book_detail": "Test"
        "borrowed": 0
        "create_datetime": "2017-05-28 16:14:59"
      };
      {
        "book_id": 2,
        "book_name": "The Last Guardian",
        "book_detail": "Test"
        "borrowed": 1
        "create_datetime": "2017-05-30 13:09:09"
      }
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---


## GET books/id

---

Get Specific Book Information

##### Authorization

---

Yes

##### Parameters

---

None

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/books/1
` 

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "book_id": "2",
      "book_name": "Digital Castles",
      "book_detail": "test",
      "borrowed": "0",
      "create_datetime": "2017-05-28 16:14:59"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid Book ID |

####About other error codes，view Error List Below.

---

## POST books/

---

POST(Create) New Book Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| book_name | true | int | Book ID |
| book_category | true | varchar | Book category |
| book_detail | true | varchar | Book detail |

##### METHOD

---

POST

##### EXAMPLE

---

    POST index.php/book/

*** JSON EXAMPLE ***

    {
      "book_name": "The Last Guardian",
      "book_category": "novel",
      "book_detail": "test"
    }

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "book_id": 3,
      "book_name": "Digital Castle",
      "book_detail": "Test"
      "borrowed": 0
      "create_datetime": "2010/1/1"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | Cannot post with certain id | Bad request |
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## PUT book/id

---

PUT Specific Book Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| book_name | false | int | Book Name |
| book_detail | false | varchar | Book detail |
| book_category | false | varchar | Book category |
| borrowed | false | bit | Borrow status |

##### METHOD

---

PUT

##### EXAMPLE

---

` ``
PUT index.php/book/1
` 

*** JSON EXAMPLE ***

    {
      "book_name": "Gone with the wind"
      "book_category": "novel"
      "book_detail": "Test"
      "borrowed": 1
    }


##### RESULT

---

*** JSON EXAMPLE ***

    {
      "book_id": 1
      "book_name": "Gone with the wind"
      "book_detail": "Test"
      "borrowed": 1
      "create_datetime": "2017/5/25"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid book ID |

####About other error codes，view Error List Below.

---

## DELETE book/id

---

DELETE Specific Book Information

##### Authorization

---

Yes

##### Parameters

---

None

##### METHOD

---

DELETE

##### EXAMPLE

---

` ``
DELETE index.php/book/1
` 


##### RESULT

---

*** JSON EXAMPLE ***

    {   
      "message": "Delete OK!"
    }


*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid book ID |

####About other error codes，view Error List Below.

---

## GET borrowed/

---

Get All Borrow Information

##### Authorization

---

Yes

##### Parameters

---

No Parameters

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/borrowed/
` ``

##### RESULT

---

*** JSON EXAMPLE ***

` ``

{

  {

  "borrowed_id": 1  

  "user_id": 1 

  "book_id": 2 

  "status": 1 

  "create_datetime": "2017/5/25"

  "return_datetime": ""

  };

  {

  "borrowed_id": 2 

  "user_id": 4

  "book_id": 1

  "status": 0

  "create_datetime": "2017/1/1"

  "return_datetime": "2017/2/2"

  }

}

` ``

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## GET borrowed/id

---

Get Specific Borrow Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| borrowed_id | true | int | Book ID |

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/borrowed/1
` ``

##### RESULT

---

*** JSON EXAMPLE ***

` ``

{

  "borrowed_id": 1  

  "user_id": 1 

  "book_id": 2 

  "status": 1

  "create_datetime": "2017/5/25"

  "return_datetime": ""

}

` ``

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid ID |

####About other error codes，view Error List Below.

---

## POST borrowed/

---

POST(Create) New Borrow Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| user_id | true | int | User ID |
| book_id | true | int | Book ID |
| status | true | int | Borrow status |
| create_datetime | true | datetime | Date of borrow |
| return_datetime | false | datetime | Date of return |
##### METHOD

---

POST

##### EXAMPLE

---

` ``
POST index.php/borrows/
` ``

*** JSON EXAMPLE ***

` ``

{

  "user_id": 1 

  "book_id": 2 

  "status": 1

  "create_datetime": "2017/5/25"

  "return_datetime": ""

}

` ``

##### RESULT

---

*** JSON EXAMPLE ***


` ``

{

  "borrowed_id": 3

  "user_id": 1 

  "book_id": 2 

  "status": 1

  "create_datetime": "2017/5/25"

  "return_datetime": ""

}

 
` ``

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## PUT borrowed/id

---

PUT Specific Borrow Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| user_id | false | int | User ID |
| book_id | false | int | Book ID |
| status | true | int | Borrow status |
| create_datetime | false | datetime | Date of borrow |
| return_datetime | false | datetime | Date of return |

##### METHOD

---

PUT

##### EXAMPLE

---

` ``
PUT index.php/borrowed/1
` ``

*** JSON EXAMPLE ***

` ``

{

  "user_id": 2 

  "book_id": 1 

  "status": 0

  "create_datetime": "2017/5/24"

  "return_datetime": "2017/5/25"

}

` ``

##### RESULT

---

*** JSON EXAMPLE ***


` ``

{


  "borrowed_id": 1,

  "user_id": 2 

  "book_id": 1 

  "status": 0

  "create_datetime": "2017/5/24"

  "return_datetime": "2017/5/25"

}
 
` ``

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid borrow ID |

####About other error codes，view Error List Below.

---

## DELETE borrowed/id

---

DELETE Specific Borrow Information

##### Authorization

---

Yes

##### Parameters

---

None

##### METHOD

---

DELETE

##### EXAMPLE

---

` ``
DELETE index.php/borrowed/1
` 


##### RESULT

---

*** JSON EXAMPLE ***


` 
{
  "message": "Delete OK!",
}
` 

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid borrow ID |

####About other error codes，view Error List Below.

---

## GET user/

---

Get All User Information

##### Authorization

---

Yes

##### Parameters

---

No Parameters

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/user/
` ``

##### RESULT

---

*** JSON EXAMPLE ***

` ``

    {
      {
        "user_id": 1,
        "user_name": "Soramaru",
        "password": "12345678"
        "real_name": "Sora Tokui"
        "user_email": "931163490@qq.com",
        "auth": 1
      };
      {
        "user_id": 2,
        "user_name": "LWezio",
        "password": "87654321"
        "real_name": "Jaina Proudmore"
        "user_email": "XXXXX@xx.com"
        "auth": 0
      }
    }

` ``

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---


## GET user/id

---

Get Specific User Information

##### Authorization

---

Yes

##### Parameters

---

None

##### METHOD

---

GET

##### EXAMPLE

---

    GET index.php/user/1

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "user_id": 1,
      "user_name": "Soramaru",
      "password": "12345678",
      "real_name": "Varian Wrynn",
      "user_email": "931163490@qq.com",
      "auth": 1
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid User ID |

####About other error codes，view Error List Below.

---

## POST user/

---

POST(Create) New User Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| user_name | true | varchar | User name |
| password | true | varchar | User password |
| real_name | true | varchar | User's real name |
| auth | true | int(1) | User's authorization level |

##### METHOD

---

POST

##### EXAMPLE

---

` ``
POST index.php/user/
` ``

*** JSON EXAMPLE ***

    {
      "user_name": "Nico",
      "password": "soramaru",
      "real_name": "Sora Tokui",
      "user_email": "931163490@qq.com",
      "auth": "0"
    }

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "user_id": "1",
      "user_name": "Nico",
      "password": "soramaru",
      "real_name": "Sora Tokui",
      "user_email": "931163490@qq.com",
      "auth": "0"
    }


*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## PUT user/id

---

PUT Specific User Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| user_name | true | varchar | User name |
| password | true | varchar | User password |
| real_name | true | varchar | User's real name |
| auth | true | int(1) | User's authorization level |

##### METHOD

---

PUT

##### EXAMPLE

---
    PUT index.php/user/1

*** JSON EXAMPLE ***

    {
      "user_name": "Nico",
      "password": "soramaru"
    }
##### RESULT


*** JSON EXAMPLE ***

    {
      "user_id": "1",
      "user_name": "Nico",
      "password": "soramaru",
      "real_name": "Sora Tokui",
      "user_email": "931163490@qq.com",
      "auth": "0"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid user ID |

####About other error codes，view Error List Below.

---

## DELETE user/id

---

DELETE Specific Book Information

##### Authorization

---

Yes

##### Parameters

---

None

##### METHOD

---

DELETE

##### EXAMPLE

---

    DELETE index.php/user/1

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "message": "Delete OK!"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid user ID |

####About other error codes，view Error List Below.

---

## Error List


| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | Bad Request | Request sucks |
| 401 | Unauthorized | Need login |
| 404 | Not Found | Invalid ID |
| 405 | Method Not Allowed | Trying to access with an invalid method |
| 500 | Internal Server Error | Server problem |
