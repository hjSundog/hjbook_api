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
    
    
