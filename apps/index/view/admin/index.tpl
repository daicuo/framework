{extend name="apps/common/view/admin.tpl" /}
<!-- -->
{block name="header_meta"}
<title>{:lang("index/admin/index")}－{:lang('appName')}</title>
{/block}
{block name="header_addon"}
<link href="{$path_root}{$path_addon}view/theme.css">
<script src="{$path_root}{$path_addon}view/theme.js"></script>
{/block}
<!-- -->
{block name="main"}
<h6 class="border-bottom pb-2 text-purple">
  {:lang("index/admin/index")}
</h6>
{:DcBuildForm([
    'class'    => 'bg-white px-2 py-2',
    'action'   => DcUrlAddon(['module'=>'index','controll'=>'admin','action'=>'update'],''),
    'method'   => 'post',
    'ajax'     => true,
    'submit'   => lang('submit'),
    'reset'    => lang('reset'),
    'close'    => false,
    'disabled' => false,
    'callback' => '',
    'items'    => [
        [
            'type'        => 'text',
            'name'        => 'title',
            'id'          => 'title',
            'value'       => config('index.title'),
            'title'       => lang('title'),
            'placeholder' => lang('title_placeholder'),
            'readonly'    => false,
            'disabled'    => false,
            'required'    => true,
        ],
        [
            'type'        => 'text',
            'name'        => 'keywords',
            'id'          => 'keywords',
            'value'       => config('index.keywords'),
            'title'       => lang('keywords'),
            'placeholder' => lang('keywords_placeholder'),
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
        ],
        [
            'type'        => 'text',
            'name'        => 'description',
            'id'          => 'description',
            'value'       => config('index.description'),
            'title'       => lang('description'),
            'placeholder' => lang('description_placeholder'),
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
        ],
        [
            'type'        => 'custom',
            'name'        => 'theme',
            'id'          => 'theme',
            'value'       => config('index.theme'),
            'title'       => lang('theme'),
            'placeholder' => lang('theme_placeholder'),
            'option'      => $themes,
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
            'multiple'    => false,
        ],
        [
            'type'        => 'custom',
            'name'        => 'theme_wap',
            'id'          => 'theme_wap',
            'title'       => lang('theme_wap'),
            'value'       => config('index.theme_wap'),
            'placeholder' => lang('wap_theme_placeholder'),
            
            'option'      => $themes,
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
            'multiple'    => false,
        ],
        [
            'type'        => 'textarea',
            'name'        => 'widget_pc',
            'id'          => 'widget_pc',
            'value'       => config('index.widget_pc'),
            'rows'        => 5,
            'title'       => lang('index_widget_pc'),
            'placeholder' => lang('index_widget_placeholder'),
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
        ],
        [
            'type'        => 'textarea',
            'name'        => 'widget_wap',
            'id'          => 'widget_wap',
            'value'       => config('index.widget_wap'),
            'rows'        => 5,
            'title'       => lang('index_widget_wap'),
            'placeholder' => lang('index_widget_placeholder'),
            'readonly'    => false,
            'disabled'    => false,
            'required'    => false,
        ],
    ]
])}
{/block}