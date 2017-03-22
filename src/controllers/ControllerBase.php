<?php
namespace App\Controllers;

use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\Model;
//use \Illuminate\Database\Capsule\Manager as DB;
//use Slim\Http\Request;
//use Slim\Http\Response;

/**
 * ControllerBase
 * @property Builder $db
 */
class ControllerBase
{
    protected $ci;
    /** @var Builder $db */
    protected $db;

    public function __construct(\Interop\Container\ContainerInterface $ci)
    {
        $this->ci = $ci;
        // 加载DB容器
        $this->db = $ci->get('db');
    }
}