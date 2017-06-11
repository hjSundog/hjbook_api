### 注册
POST /users 将注册页面输入信息存入数据库中
#### 传入参数
|参数名|说明|
|:--|:--|
|user_email|用户邮箱|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|
|user_id|int|用户id|
|user_name|string|用户昵称|
|real_name|string|真实姓名|
|user_email|string|用户邮箱|
|auth|string|用户身份|

#### 例子
    {
	"user_id": "2",
	"user_name": "",
	"real_name": "",
	"user_email": "1101010@qq.com0",
	"auth": "undergraduate",
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE0OTcwMTA3NTAsImF1dGgiOiJ1bmRlcmdyYWR1YXRlIiwidXNlcl9pZCI6IjIifQ.FJOSGojP_gCIIveKDyARLDdPIJeSafPyc1UYtiVmjqk"
    }

### 登录
POST /users/signin 对数据库进行身份验证，并将其重定向到新的会话或重定向到登录
#### 传入参数
|参数名|说明|
|:--|:--|
|user_email|用户邮箱|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|
|user_id|int|用户id|
|user_name|string|用户昵称|
|real_name|string|真实姓名|
|user_email|string|用户邮箱|
|auth|string|用户身份|

#### 例子
    {
	"user_id": "2",
	"user_name": "",
	"real_name": "",
	"user_email": "1101010@qq.com0",
	"auth": "undergraduate",
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE0OTcwMTA3NTAsImF1dGgiOiJ1bmRlcmdyYWR1YXRlIiwidXNlcl9pZCI6IjIifQ.FJOSGojP_gCIIveKDyARLDdPIJeSafPyc1UYtiVmjqk"
    }
    
### 获取用户信息
GET /users 获取所有注册用户信息 （管理员权限）
GET /users/:id 获取id用户信息
#### 传入参数
|参数名|说明|
|:--|:--|
|id|用户id|

#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|user_id|int|用户id|
|user_name|string|用户昵称|
|real_name|string|真实姓名|
|user_email|string|用户邮箱|
|auth|string|用户身份|

#### 例子
	{
		"user_id": "1",
		"user_name": "",
		"real_name": "",
		"user_email": "110110@qq.com0",
		"auth": "undergraduate"
	},
	{
		"user_id": "2",
		"user_name": "",
		"real_name": "",
		"user_email": "1101010@qq.com0",
		"auth": "undergraduate"
	}
    
### 获取用户借书情况
GET /users/:id/books
#### 传入参数
|参数名|说明|
|:--|:--|
|id|用户id|

#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|record_id|int|借阅id|
|user_id|int|用户id|
|book_id|int|图书id|
|status|string|借阅状态|
|create_datetime|string|借出时间|
|return_datetime|string|归还时间|
#### 例子
	{
		"record_id": "5",
		"user_id": "19",
		"book_id": "1",
		"status": "0",
		"create_datetime": "0000-00-00 00:00:00",
		"return_datetime": null
	}

## GET books/

---

Get All Book Information

##### Authorization

---

No

##### Parameters

---

No Parameters

##### METHOD

---

GET

##### EXAMPLE

---

    GET index.php/books/

##### RESULT

---

*** JSON EXAMPLE ***
    
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
    
*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 404 | Couldn't find any book | No books |

####About other error codes，view Error List Below.

---


## GET books/id

---

Get Specific Book Information

##### Authorization

---

No

##### Parameters

---

None

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/books/2
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
| 404 | Book could not be found | Invalid Book ID |

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

    POST index.php/books/

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
      "book_name": "The Last Guardian",
      "book_category": "novel",
      "book_detail": "Test"
      "borrowed": 0
      "create_datetime": "2010/1/1"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | Cannot post with certain id | Please post without ID|
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## PUT books/id

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
PUT index.php/books/1
` 

*** JSON EXAMPLE ***

    {
      "book_name": "Gone with the wind"
      "book_category": "novel"
      "book_detail": "Test1"
      "borrowed": true
    }


##### RESULT

---

*** JSON EXAMPLE ***

    {
      "book_id": 1
      "book_name": "Gone with the wind"
      "book_detail": "Test1"
      "borrowed": "1"
      "create_datetime": "2017/5/25"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | Must put with ID | Must put with ID |
| 401 | Unauthorized | Need login |
| 404 | Book could not be found | Invalid book ID |

####About other error codes，view Error List Below.

---

## DELETE books/id

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
DELETE index.php/books/1
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
| 400 | An ID must be supplied to delete a book | add ID |
| 401 | Unauthorized | Need login |
| 404 | Book could not be found | Invalid book ID |

####About other error codes，view Error List Below.

---

## GET books/records/

---

Get All Borrow Record Information

##### Authorization

---

No

##### Parameters

---

No Parameters

##### METHOD

---

GET

##### EXAMPLE

---

    GET index.php/books/records

##### RESULT

---

*** JSON EXAMPLE ***

    
    {
      "record_id": "1",
      "user_id": "1",
      "book_id": "1",
      "status": "1",
      "create_datetime": "2017-06-11 13:19:37",
      "return_datetime": null
    },
    {
      "record_id": "2",
      "user_id": "1",
      "book_id": "2",
      "status": "1",
      "create_datetime": "2017-06-11 13:19:46",
      "return_datetime": null
    }
    
*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 404 | Couldn't find any record | No records |

####About other error codes，view Error List Below.

---


## GET books/records/id

---

Get Specific Borrow Record Information

##### Authorization

---

No

##### Parameters

---

None

##### METHOD

---

GET

##### EXAMPLE

---

` ``
GET index.php/books/records/1
` 

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "record_id": "1",
      "user_id": "1",
      "book_id": "1",
      "status": "1",
      "create_datetime": "2017-06-11 13:19:37",
      "return_datetime": null
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 404 | Record could not be found | Invalid Record ID |

####About other error codes，view Error List Below.

---

## POST books/records

---

POST(Create) New Borrow Record Information

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

    POST index.php/books/records

*** JSON EXAMPLE ***

    {
	   "user_id": 1,
	   "book_id": 4
	}

##### RESULT

---

*** JSON EXAMPLE ***

    {
      "record_id": "6",
      "user_id": "1",
      "book_id": "4",
      "status": "1",
      "create_datetime": "2017-06-11 13:19:52",
      "return_datetime": null
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | Cannot post with certain id | Bad request |
| 401 | Unauthorized | Need login |

####About other error codes，view Error List Below.

---

## PUT books/records/id

---

PUT(Update) Specific Borrow Record Information

##### Authorization

---

Yes

##### Parameters

---

| NAME | REQUIRED | TYPE | IMPLEMENT |
|:-------------:|:-------------|:-------------|:-------------|
| status | true | bit | Borrow Status |


##### METHOD

---

PUT

##### EXAMPLE

---

` ``
PUT index.php/books/records/1
` 

*** JSON EXAMPLE ***

    {
      "status": false
    }


##### RESULT

---

*** JSON EXAMPLE ***

    {
      "record_id": "1",
      "user_id": "1",
      "book_id": "4",
      "status": "0",
      "create_datetime": "2017-06-11 13:48:27",
      "return_datetime": "2017-06-11 13:56:51"
    }

*** ERRORS ***

| CODE | MESSAGE | IMPLEMENT |
|:-------------:|:-------------|
| 400 | must input status | Status not input |
| 401 | Unauthorized | Need login |
| 404 | record could not be found | Invalid book ID |

####About other error codes，view Error List Below.

---

## DELETE books/records/id

---

DELETE Specific Borrow Record Information

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
DELETE index.php/books/records/6
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
| 404 | record could not be found | Invalid book ID |

####About other error codes，view Error List Below.

---
    
