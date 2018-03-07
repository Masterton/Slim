<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-7 17:16:56
 */

namespace App\Controllers;

use App\Models\Test;
use Slim\Http\Request;
use Slim\Http\Response;

/**
* TestController
*/
class TestController extends ControllerBase {

    public function add(Request $request, Response $response, $args=[])
    {
        // get parameter
        $params = $request->getParams();

        // get file
        $file = $request->getUploadedFiles();

        // C
        $test = new Test;
        $menu->uid = 'test';
        $menu->save();

        // R
        $result = Test::all();

        // U
        Test::where('id', 1)->update(['status' => 1]);

        // D
        Test::where('id', 1)->delete();

        // return
        return $response->withJson($aa);
    }
}