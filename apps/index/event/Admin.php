<?php
namespace app\index\event;

use app\common\controller\Addon;

class Admin extends Addon
{
	
	public function _initialize()
    {
		parent::_initialize();
	}

	public function index()
    {
        $themes = array();
        foreach( glob_basename('apps/index/theme/') as $value){
            $themes[$value] = $value;
        }
        $this->assign('themes', $themes);
        return $this->fetch('index@admin/index');
	}
    
    public function update()
    {
        $status = \daicuo\Op::write(input('post.'),'index', 'config', 'system' ,0, 'yes');
		if( !$status ){
		    $this->error(lang('fail'));
        }
        $this->success(lang('success'));
	}
}