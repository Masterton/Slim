# 做课流程管理系统-制课流程管理

## 部署环境要求
* **php** >= 5.5.9
* **apache**
* *apache模块*
    - `rewrite`
* **mysql**
* *php扩展*
    - `pdo_mysql`
    - `mbstring`
        + `apt-get install php7.0-mbstring` (`apt-get install libapache2-mod-php7.0`)
        + `apt-get install php5-mbstring` (`apt-get install libapache2-mod-php5`)
    - `openssl`
    - `SPL`
    - `Zend OPcache`
* **composer**

## 部署步骤
1. 配置apache虚拟目录，指向`public/`
2. 配置项目数据库连接 `src/settings.php`

    ```php
    <?php
    // ...
    // MySQL
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=cp_fms', // 数据库地址、数据库名
        'username' => 'root', // 数据库用户名
        'password' => 'root', // 数据库密码
        'attributes' => array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_SILENT,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
        ),
    ]
    // ...
    ```

## 二次开发&修改步骤
1. 配置好运行环境(同部署环境)
2. 更新composer包

    ```shell
    composer update
    ```
    
*说明*
* 采用**composer**进行包管理，配置文件(`composer.json`)
* 依赖的第三方库在确定兼容性前请勿更换版本(`require`节点下)
* 自定义加载文件(`autoload`节点下)
    - `psr-4` 使用psr-4规范加载目录
    - `files` 加载文件
* 相关参考：
    - **Migrations** [数据库：迁移](https://laravel-china.org/docs/5.3/migrations)
    - **DB** [数据库：入门](https://laravel-china.org/docs/5.3/database)、[数据库：查询构造器](https://laravel-china.org/docs/5.3/queries)
    - **Model** [Eloquent: 入门](https://laravel-china.org/docs/5.3/eloquent)

## 开发设计说明、模块划分与部分文件说明
* 开发设计说明
    - 框架: [Slim](http://www.slimframework.com/) v3
        + 基于 [Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton)
    - 模板: [Twig](http://twig.sensiolabs.org/)
    - RBAC: [PHP-RBAC](http://phprbac.net/)
    - *补充*:
        + Slim捕获了全局错误，无法使用自定义try-catch，只能配置`errorHandler`来捕获(`public/index.php`中)，开发调试时，可以使用`unset($container['errorHandler']);`来取消设置，使错误显现出来;
        + Slim 使用中间件来扩展功能，在`src/middleware.php`中统一加载，加载-释放顺序类似于栈调用(最后加载的，其`__invoke`方法会最先被调用)，参见文件中的注释;
    - 请求模式:
        * 同时具有增、删、改、查4种操作的, 采用RESTful的方式, 分别对应(POST、DELETE、PUT、GET)
        * 只具有修改、查询操作的，采用普通http方式, 分别对应(POST、GET)
        * 只具有查询操作的，可以任选GET或POST方法
        * URL带有ID等参数才能确定的资源, 一般都支持表单参数, 详见*API文档*
* 目录与模块划分说明(斜体且非粗体的，表示不在git仓库，但是运行项目必须的)
    - **public/** 公开访问目录
        - index.php 主入口文件
    - **src/** php源码目录
        - middlewares/ 中间件目录
        - dependencies.php 依赖(默认引擎和日志处理器配置)
        - functions.php 自己封装的全局函数
        - global_vars.php 全局变量, 用于依赖注入挂载到container上
        - routes.php 注册apps/entry.php中的路由
        - settings.php 主要配置文件
        
    - **templates/** twig模板文件目录, 采用了模板继承, 具体可参考Twig官方文档
    - **tests/** 测试文件目录
    - **composer.json** composer配置文件
    - *vendor/* composer管理的项目依赖的php库
    - *logs* 日志目录
    - *cache/twig/* twig缓存目录