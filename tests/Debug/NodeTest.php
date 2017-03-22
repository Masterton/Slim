<?php

namespace App\Tests\Debug;

/**
 * NodeTest
 */
class NodeTest extends \App\Controllers\ControllerBase {
    // query
    public function query(\Slim\Http\Request  $request, \Slim\Http\Response  $response, $args=[]) {
        $this->ci->get('db');
        $pdo = $this->ci->get('pdo');
        $result = $pdo->query("SELECT * FROM `node`;")->fetchAll(\PDO::FETCH_ASSOC);
        $args['node_list'] = $result;
        return $this->ci->get('view')->render($response, 'test/node-list.twig', $args);
    }

    // add
    public function add(\Slim\Http\Request  $request, \Slim\Http\Response  $response, $args=[]) {
        $response->getBody()->write('add');
        return $response;
    }
}