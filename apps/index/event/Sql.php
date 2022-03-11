<?php
namespace app\index\event;

class Sql
{
    /**
    * 安装时触发
    * @return bool 只有返回true时才会往下执行
    */
	public function install()
    {
        //批量写入插件动态配置
        model('index/Datas','loglic')->insertConfig();
        
        //批量写入插件动态语言
        model('index/Datas','loglic')->insertLang();
        
        //批量添加路由伪静态
        model('index/Datas','loglic')->insertRoute();
        
        //批量写入插件动态字段
        model('index/Datas','loglic')->insertField();
        
        //批量添加后台菜单
        model('index/Datas','loglic')->insertMenu();
        
        //批量添加前台导航/分类/标签
        model('index/Datas','loglic')->insertTerm();
        
        //清空缓存
        \think\Cache::clear();
        
        //返回结果
        return true;
	}
    
    /**
    * 升级时触发
    * @return bool 只有返回true时才会往下执行
    */
    public function upgrade()
    {
        \daicuo\Op::delete_module('index');
        
        $this->install();
        
        \daicuo\Apply::updateStatus('index', 'enable');
        
        return true;
    }
    
    /**
    * 卸载时触发
    * @return bool 只有返回true时才会往下执行
    */
    public function remove()
    {
        return $this->unInstall();
    }
    
    /**
    * 删除时触发
    * @return bool 只有返回true时才会往下执行
    */
    public function unInstall()
    {
        //删除插件配置表
        \daicuo\Op::delete_module('index');
        //删除插件队列表
        \daicuo\Term::delete_module('index');
        //删除插件用户表
        //\daicuo\User::delete_module('index');
        //清空缓存
        \think\Cache::clear();
        //直接返回结果
        return true;
	}
	
}