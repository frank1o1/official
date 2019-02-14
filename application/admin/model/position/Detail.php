<?php

namespace app\admin\model\position;

use think\Model;

class Detail extends Model
{
    // 表名
    protected $name = 'position_detail';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'publish_time_text'
    ];
    

    



    public function getPublishTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['publish_time']) ? $data['publish_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setPublishTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


}
