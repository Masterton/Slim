<?php

namespace App\Migrations;

/**
* User Table Migration
*/
class User extends Base
{    
    public function up()
    {
        $this->schema->create($this->table_name, function(\Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id')
                ->comment('主键ID');
            $table->string('ocode', 36)
                ->comment('组织编码');
            $table->string('oname', 128)
                ->comment('组织名称');
            $table->string('type', 36)
                ->comment('组织类型');
            $table->string('ucode', 16)
                ->comment('用户编码');
            $table->string('post', 32)
                ->comment('职务');
            $table->string('role', 64)
                ->comment('角色');
            $table->string('uname', 36)
                ->comment('用户名称');
            $table->string('name', 36)
                ->comment('姓名');
            $table->string('phone', 11)
                ->comment('手机号码');
            $table->string('photo', 255)
                ->comment('证件照');    
            $table->string('password', 32)
                ->comment('密码');
            $table->string('md5', 32)
                ->comment('用户名和密码生成的md5');
            $table->text('content')
                ->comment('内容');
            $table->string('card', 18)
                ->comment('身份证ID');
            $table->string('address', 11)
                ->comment('家庭住址');
            $table->string('landline', 11)
                ->comment('座机号码');
            $table->string('qq', 16)
                ->comment('QQ');
            $table->string('wechat', 32)
                ->comment('微信ID');
            $table->string('ding_id', 32)
                ->comment('钉钉员工唯一标识ID');
            $table->string('email', 32)
                ->comment('邮箱地址');
            $table->string('school', 128)
                ->comment('学校');
            $table->string('major', 128)
                ->comment('专业');
            $table->date('birthday', 11)
                ->comment('出生年月');
            $table->string('occupation', 128)
                ->comment('职业');
            $table->string('bankaccount', 128)
                ->comment('开户行');
            $table->string('account', 21)
                ->comment('账号');
            $table->string('baddress', 255)
                ->comment('开户地址');
            $table->string('receipt', 255)
                ->comment('收货地址');
            $table->text('remark')
                ->comment('备注');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}