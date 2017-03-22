<?php 

namespace App\Controllers;

use App\Models\Menu;


/**
* TestController
*/
class TestController extends ControllerBase {

	public function add( $request, $response, $args=[] ) {

		$params = $request->getParams();
		$data = array_get($params, 'data');
		$aa = [
			'json' => '1212121'
		];

		$menu = new Menu;

		$menu->uid = '987859263';
		$menu->name = '987859263';
		$menu->desc = '987859263';
		$menu->icon = '987859263';
		$menu->url = '987859263';

		$menu->save();

		return $response->withJson($aa);
	}

}