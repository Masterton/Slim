<?php

namespace App\Middlewares;

use \Illuminate\Database\Capsule\Manager as DB;

/**
 * 开发阶段-Rbac操作
 */
class DevRbacOperation extends Base {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, callable  $next) {
        $op_list = $this->container->get('globals')->get('operationList', []);
        // $pdo = $this->container->get('pdo');
        $this->request = $request;
        $this->response = $response;
        //$this->sync2db($op_list);

        $response = $next($request, $response);
        return $response;
    }

    /**
     * 同步程序中写的rbac操作到数据库中
     * @param $pdo PDO对象
     * @param $op_list 操作集合
     *
     */
    protected function sync2db($op_list) {
        $db = $this->container->get('db');
        $columns = DB::table('operations')->pluck('route_name');//查询单列的所有数据

        $request = $this->request;
        $can_debug = ($request->isGet() && $request->isXhr() == false);
        //////////////////debug-begin/////////////////////////////
        // 如果是非ajax的get请求，才输出调试信息
        if($can_debug) {
            foreach ($op_list as $route_name => $op_item) {
                $op_class = array_get($op_item, 'class');
                $op_name = array_get($op_item, 'name');
                if(!empty($route_name) && !empty($op_class) && !empty($op_name)) {
                    // 和数据库比对，并同步数据库中的数据，三种情况
                    // 1. operationList 中有，DB没有 --> db-insert
                    // 2. operationList 中有，DB也有 --> db-update
                    // 3. operationList 中没有，DB有 --> db-delete
                    if( in_array($route_name,$columns) ){
                        // 2.
                        //TODO   如果是相同的，不执行update
                        $up = DB::table('operations')->where('route_name', $route_name)
                              ->update(['op_class' => $op_class , 'op_name' => $op_name]);
                    } else {
                        // 1.
                        DB::table('operations')->insert([
                            ['route_name' => $route_name, 'op_name' => $op_name, 'op_class' => $op_class]
                        ]);
                    }
                }
            }
            //3.
            foreach ($columns as $route_name => $item) {
                if( !array_key_exists( $item, $op_list )){
                    DB::table('operations')->where('route_name', '=', $item)->delete();
                }
            }
            //////////////////debug-end/////////////////////////////
        }
    }
}