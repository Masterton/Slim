# Slim 框架的简单配置封装

------

## 一、目录结构

> * public （应用程序的入口）

  >> * .htaccess
  >> * index.php （入口文件）

> * src （主要逻辑）

  >> * apps （定义路由）
  >> * controllers （控制器）
  >> * middlewares （中间件）
  >> * migrations （数据库迁移）
  >> * models （数据表模型）
  >> * validators （验证器）
  >> * dependencies.php （slim依赖配置）
  >> * functions.php （全局函数文件）
  >> * global_vars.php （全集变量文件）
  >> * middleware.php （中间件文件）
  >> * routes.php （路由文件）
  >> * settings.php （slim配置文件）

> * templates （视图模板）

  >> * test

> * tests （测试）

  >> * Debug
  >> * Dev （用于数据库的迁移）
  >> * Functional

> * composer.json
> * README.md

## 二、环境要求

> * PHP>=5.5.9 （需要的插件）

  >> * xmlwriter
  >> * xmlreader

> * nginx配置

```
server {
    listen 80;
    server_name example.com;
    index index.php;
    error_log /path/to/example.error.log;
    access_log /path/to/example.access.log;
    root /path/to/public; //指向public/目录

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SCRIPT_NAME $fastcgi_script_name;
        fastcgi_index index.php;
        fastcgi_pass 127.0.0.1:9000;
    }
}
```

> * PHP>=5.5.9
> * PHP>=5.5.9

## 三、二次开发&修改步骤

> * 配置好运行环境（和部署环境）
> * 更新 composer 包

```
composer indtall
composer update
```

> * 说明

  >> * 采用composer进行包管理，配置文件（composer.json）
  >> * 依赖的第三方库在确定兼容性前请勿跟换版本（require 节点下）
  
  >>> * psr-4 使用psr-4规范加载目录
  >>> * files 加载文件
  
  >> * 相关参考
  
  >>> * Migrations [数据库：迁移](http://d.laravel-china.org/docs/5.3/migrations)
  >>> * DB[数据库：入门](http://d.laravel-china.org/docs/5.3/database)、数据库：查询构造器](http://d.laravel-china.org/docs/5.3/queries)
  >>> * Model [Eloquent:入门](http://d.laravel-china.org/docs/5.3/eloquent)
