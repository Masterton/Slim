<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:26:04
 *
 */

namespace App\Migrations;

/**
 * Base Migration
 *
 */
class Base extends \Illuminate\Database\Migrations\Migration
{
    # https://laravel-china.org/docs/laravel/5.3/database
    public function __construct($table_name, $schema)
    {
        $this->schema = $schema;
        $this->table_name = $table_name;
    }

    public function exists()
    {
        return $this->schema->hasTable($this->table_name);
    }

    public function down()
    {
        $this->schema->drop($this->table_name);
    }
}