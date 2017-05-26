### 注册
POST /register 将注册页面输入信息存入数据库中
#### 传入参数
|参数名|说明|
|:--|:--|
|user_name|用户昵称|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|

#### 例子
    {
        token：13413s1fs3d1sd31ds3v13rev1e3r1f3e21v32esv
    }

### 登录
POST /register 对数据库进行身份验证，并将其重定向到新的会话或重定向到登录
#### 传入参数
|参数名|说明|
|:--|:--|
|user_name|用户昵称|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|

#### 例子
    {
        token：13413s1fs3d1sd31ds3v13rev1e3r1f3e21v32esv
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
|user_name|string|用户昵称|
|real_name|string|真实姓名|
|auth|int|用户权限|

#### 例子
    {
        user_name:张三
        real_name:王二
        auth：1
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
|book_id|int|书籍id|
|book_name|string|书籍名称|
|status|int|借阅状态|
|borrowed_time|string|借书时间|
|return_time|string|还书时间|
#### 例子
    {
        book_id:1,
        book_name:hello world,
        status:1,
        borrowed_time:2017/05/26 21:19:00
        return_time:2017/05/31 21:19:00
    }
    
    
