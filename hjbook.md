### 注册
POST /users 将注册页面输入信息存入数据库中
#### 传入参数
|参数名|说明|
|:--|:--|
|user_name|用户昵称|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|
|id|int|用户id|
|user_name|string|用户昵称|

#### 例子
    {
        token：13413s1fs3d1sd31ds3v13rev1e3r1f3e21v32esv
        id:12
        user_name:老王
    }

### 登录
POST /users/signin 对数据库进行身份验证，并将其重定向到新的会话或重定向到登录
#### 传入参数
|参数名|说明|
|:--|:--|
|user_name|用户昵称|
|password|用户密码|
#### 返回值

|参数名|类型|说明|
|:--|:--|:--|
|token|string|加密信息|
|id|int|用户id|
|user_name|string|用户昵称|

#### 例子
    {
        token：13413s1fs3d1sd31ds3v13rev1e3r1f3e21v32esv
        id:12
        user_name:老王
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
|auth|string|用户权限|

#### 例子
    {
        user_name:张三
        real_name:王二
        auth：student
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
无
#### 例子
无
    
    
