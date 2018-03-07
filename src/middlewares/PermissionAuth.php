<?php
namespace App\Middlewares;

use \Illuminate\Database\Capsule\Manager as DB;
use PhpRbac\Rbac;

class PermissionAuth extends Base {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, callable  $next) {
        $db = $this->container->get('db');
        $route = $request->getAttribute('route');

        if(isset($route)) {
            // 获取当前路由
            $name = $route->getName();
            $pass = false;


            //验证token
            $token =  $request->getHeader('X-Token');
            if( $token ){
                //var_dump($token);
                //exit();
            }





            $user_role = [3];
            $op_list = []; //角色拥有的操作list
            $rbac = new Rbac();
            //角色对应的权限list
            $perm_list = [];
            foreach ($user_role as $key => $value) {
                $res = $rbac->Roles->permissions( $value );
                //TODO  数组合并.....
                foreach ($res as $key => $value) {
                    $perm_list[] = $value;
                }
            }
            $perm_list = array_unique($perm_list);
            foreach ($perm_list as $key => $value) {
                // 每个权限对应的操作list，存入$op_list
                $temp = DB::table('perm_operate')->where('PermId',$value)->pluck('OperateId');
                foreach ($temp as $key => $value) {
                    $op_list[] = $value;
                }
            }
            foreach ($op_list as $key => $value) {
                $operate = DB::table('operations')->where('id',$value)->get();
                //判断当前路由是否在 操作list里
                if( $operate[0]->route_name == $name ){
                    $pass = true;
                    break;
                }
            }
            if ( $pass ) {
                // echo "有权限"; exit();
            } else {
                // echo "没有权限"; exit();
            }

        }
        $response = $next($request, $response);
        return $response;

    }

}

