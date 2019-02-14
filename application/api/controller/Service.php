<?php
/**
 * Created by PhpStorm.
 * User: SNB-HH
 * Date: 2019/1/12
 * Time: 18:29
 */

namespace app\api\controller;


use app\common\controller\Api;
use think\Db;

/**
 * 服务范围
 * Class Service
 * @package app\api\controller
 */
class Service extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 详情
     * @param int $id 服务id
     */
    public function detail()
    {
        $id = input('id/d');
        $result = Db::table('fa_service')->find($id);
        $result['image'] = $this->request->domain() . $result['image'];
        $otherService = Db::table('fa_service')->where('id', '<>', $id)->field('id,title,image,summary')->limit(3)->select();
        if (!empty($otherService)) {
            foreach ($otherService as &$value) {
                $value['image'] = $this->request->domain() . $value['image'];
            }
        }
        $result['other_service'] = $otherService;

        $this->success('获取成功', $result);
    }

    /**
     * 换一批
     */
    public function change()
    {
        $result =  Db::table('fa_service')->field('id,title,image,summary')->orderRaw('rand()')->limit(3)->select();
        if(!empty($result)){
            foreach($result as &$value){
                $value['image'] = $this->request->domain() . $value['image'];
            }
        }

        $this->success('获取成功',$result);
    }
}