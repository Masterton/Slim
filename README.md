# Slim 框架的简单配置封装

------

## 1.目录结构

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
