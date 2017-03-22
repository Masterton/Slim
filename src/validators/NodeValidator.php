<?php
namespace App\Validators;

/**
 * NodeValidator
 */
class NodeValidator extends BaseValidator
{
    // 数据添加验证
    public function add_validate(array $data)
    {
        $this->validate(
            [
                '节点名称'  => [ $data['node_name'] , 'required|min(2)|max(50)' ],
                '节点类型'  => [ $data['node_type'] , 'required|int' ],
                '节点描述'  => [ $data['node_desc'] , 'min(2)|max(250)' ],
                '从属流程'  => [ $data['flow_num']  , 'required|max(16)' ],
                '操作类型'  => [ $data['operating'] , 'required|int' ],
                '操作人员'  => [ $data['operator']  , 'required|max(16)' ],
                '表单控制'  => [ $data['controls']  , 'required' ],
            ]
        );
    }

    // 数据修改验证
    public function mod_validate(array $data)
    {
        $this->validate(
            [
                '节点类型' => [ $data['node_type'] , 'required|int' ],
                '节点描述' => [ $data['node_desc'] , 'min(2)|max(250)' ],
                '操作类型' => [ $data['operating'] , 'required|int' ],
                '操作人员' => [ $data['operator']  , 'required|max(16)' ],
                '表单控制' => [ $data['controls']  , 'required' ],
            ]
        );
    }
}