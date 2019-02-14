<?php

namespace app\admin\controller\position;

use controller\BasicAdmin;
use think\Config;
use think\Db;

/**
 * 职位发布
 *
 * @icon fa fa-circle-o
 */
class Detail extends BasicAdmin
{

    /**
     * Detail模型对象
     * @var \app\admin\model\position\Detail
     */
    protected $model = null;
    protected $multiFields = 'status_switch';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\position\Detail;
        $site = Config::get('site');
        $this->view->assign('department', $site['department']);
        $this->view->assign('job_classify', $site['job_classify']);
        $this->view->assign('experience', $site['experience']);

    }

    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */

    protected function multiResult($data)
    {
        if ($data['status_switch'] == 1) {
            Db::table('fa_position_detail')->where('id', $data['id'])->update([
                'publish_time' => time()

            ]);
        }
    }


}
