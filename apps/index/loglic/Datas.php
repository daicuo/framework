<?php
namespace app\index\loglic;

class Datas
{
    //批量写入插件初始配置
    public function insertConfig()
    {
        return model('common/Config','loglic')->install([
            'theme'       => 'default_pc',
            'theme_wap'   => 'default_wap',
            'title'       => 'DaiCuo首页',
            'keywords'    => 'DaiCuo,呆错,后台框架,后台模板',
            'description' => '呆错（DaiCuo）是一款基于ThinkPHP、Bootstrap、Jquery的自适应后台管理框架！',
        ],'index');
    }
    
    //批量添加动态语言包
    public function insertLang()
    {
        return model('common/Lang','loglic')->install([
            'index_widget_pc'          => '首页小组件（默认）',
            'index_widget_wap'         => '首页小组件（移动）',
            'index_widget_placeholder' => '首页需要加载的组件，一行一个完整模板路径',
        ],'index','zh-cn');
    }
    
    //批量添加路由伪静态
    public function insertRoute()
    {
        return model('common/Route','loglic')->install([
            [
                'rule'        => '/',
                'address'     => 'index/index/index',
                'method'      => 'get',
            ],
            [
                'rule'        => '/test',
                'address'     => 'index/index/test',
                'method'      => 'get',
            ],
        ],'index');
    }
    
    //批量写入插件动态字段
    public function insertField()
    {
        return model('common/Field','loglic')->install([
            [
                'op_name'     => 'term_tpl',
                'op_value'    => json_encode([
                    'type'         => 'text',
                    'relation'     => 'eq',
                    'data-visible' => false,
                    'data-filter'  => false,
                ]),
                'op_module'   => 'index',
                'op_controll' => 'category',
                'op_action'   => 'index',
            ],
            [
                'op_name'     => 'term_limit',
                'op_value'    => json_encode([
                    'type'         => 'text',
                    'relation'     => 'eq',
                    'data-visible' => false,
                    'data-filter'  => false,
                ]),
                'op_module'   => 'index',
                'op_controll' => 'tag',
                'op_action'   => 'index',
            ]
        ]);
    }
    
    //批量添加后台菜单
    public function insertMenu()
    {
        //批量添加后台一级菜单
        $result = model('common/Menu','loglic')->install([
            [
                'term_name'   => '首页',
                'term_slug'   => 'index',
                'term_info'   => 'fa-home',
                'term_module' => 'index',
            ],
        ]);
        
        //批量添加后台二级菜单
        $result = model('common/Menu','loglic')->install([
            [
                'term_name'   => '首页设置',
                'term_slug'   => 'index/admin/index',
                'term_info'   => 'fa-gear',
                'term_module' => 'index',
            ],
            [
                'term_name'   => '分类管理',
                'term_slug'   => 'admin/category/index?parent=index&term_module=index',
                'term_info'   => 'fa-list',
                'term_module' => 'index',
            ],
            [
                'term_name'   => '标签管理',
                'term_slug'   => 'admin/tag/index?parent=index&term_module=index',
                'term_info'   => 'fa-tags',
                'term_module' => 'index',
            ],
            [
                'term_name'   => '字段管理',
                'term_slug'   => 'admin/field/index?parent=index&op_module=index',
                'term_info'   => 'fa-cube',
                'term_module' => 'index',
            ],
            /*[
                'term_name'   => '导航菜单',
                'term_slug'   => 'admin/navs/index?parent=index&navs_module=index',
                'term_info'   => 'fa-navicon',
                'term_module' => 'index',
            ],
            [
                'term_name'   => '语言管理',
                'term_slug'   => 'admin/lang/index?parent=index&op_module=index',
                'term_info'   => 'fa-commenting',
                'term_module' => 'index',
            ],*/
        ],'首页');
        
        return true;
    }
    
    
    //批量添加分类/标签/导航
    public function insertTerm()
    {
        //批量添加前台导航
        $result = model('common/Navs','loglic')->install([
            [
                'navs_name'       => '返回首页',
                'navs_url'        => 'index/index/index',
                'navs_type'       => 'navbar',
                'navs_module'     => 'index',
            ],
        ]);
        
        //批量添加分类
        $result = model('common/Category','loglic')->install([
            [
                'term_name'       => '分类1',
                'term_slug'       => 'category1',
                'term_type'       => 'navbar',
                'term_module'     => 'index',
            ],
            [
                'term_name'       => '分类2',
                'term_slug'       => 'category2',
                'term_type'       => 'navbar',
                'term_module'     => 'index',
            ],
        ]);
        
        //批量添加标签
        $result = model('common/Tag','loglic')->install([
            [
                'term_name'       => '标签1',
                'term_slug'       => 'tag1',
                'term_module'     => 'index',
            ],
            [
                'term_name'       => '标签2',
                'term_slug'       => 'tag2',
                'term_module'     => 'index',
            ],
        ]);
        
        return true;
    }
    
}