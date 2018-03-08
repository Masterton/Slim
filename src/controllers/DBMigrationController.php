<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:57:57
 *
 */

namespace App\Controllers;

use \Slim\Http\Request;
use \Slim\Http\Response;

/**
 * DBMigration
 *
 */
class DBMigrationController extends ControllerBase
{
    // 根据表名获取对象
    protected function get_object($table_name, $db)
    {
        $obj = null;
        switch ($table_name) {
            case 'test':
                $obj = new \App\Migrations\Test($table_name, $db->schema());
                break;
            # add <table name> with extra `case` here
            default:
                if (empty($table_name)) {
                    $obj = 'parameter [table] not provided';
                } else {
                    $obj = sprintf('table [%s] not supportted', $table_name);
                }
                break;
        }

        return $obj;
    }

    // 创建表
    public function up(Request $request, Response $response, $args = [])
    {
        $table_name = array_get($args, 'table');
        $db = $this->ci->get('db');
        $obj = $this->get_object($table_name, $db);
        if ($obj instanceof \App\Migrations\Base) {
            if (!$obj->exists()) {
                $obj->up();
                $response->getBody()->write(sprintf('create table [%s] ok', $table_name));
            } else {
                $response->getBody()->write(sprintf('table [%s] existed', $table_name));
            }
        } else {
            $response->getBody()->write($obj);
        }

        return $response;
    }

    // 销毁表
    public function down(Request $request, Response $response, $args = [])
    {
        $table_name = array_get($args, 'table');
        $db = $this->ci->get('db');
        $obj = $this->get_object($table_name, $db);
        if ($obj instanceof \App\Migrations\Base) {
            if ($obj->exists()) {
                $obj->down();
                $response->getBody()->write(sprintf('drop table [%s] ok', $table_name));
            } else {
                $response->getBody()->write(sprintf('table [%s] not exists', $table_name));
            }
        } else {
            $response->getBody()->write($obj);
        }

        return $response;
    }
}