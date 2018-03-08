<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:24:06
 *
 */

namespace App\Models;

/**
 * Test Model
 *
 */
class Test extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     *
     */
    protected $table = 'test';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     *
     */
    public $timestamps = true;
    protected $datas = ['deleted_at'];
}