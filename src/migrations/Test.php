<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:22:14
 *
 */

namespace App\Migrations;

/**
 * Test Table Migration
 *
 */
class Test extends Base
{    
    public function up()
    {
        $this->schema->create($this->table_name, function(\Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id')
                ->comment('主键ID');
            # https://laravel-china.org/docs/laravel/5.3/database
            # http://stackoverflow.com/questions/37662955/laravel-migration-default-value
            $table->string('test', 32)
                ->comment('测试');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}