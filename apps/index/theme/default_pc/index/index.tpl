{extend name="apps/common/view/front.tpl" /}
<!-- -->
{block name="header_meta"}
<title>{:config('index.title')}－{:config('common.site_name')}</title>
<meta name="keywords" content="{:config('index.keywords')}" />
<meta name="description" content="{:config('index.description')}"  />
{/block}
<!--main -->
{block name="main"}
<nav class="navbar navbar-expand-md navbar-dark bg-purple">
<div class="container">
  <a class="navbar-brand" href="{$path_root}">{:config('common.site_name')}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  {if $user['user_id']}
    {assign name="navbars" value=":DcTermNavbar(['type'=>'navbar','status'=>['in','normal,private']])" /}
  {else/}
    {assign name="navbars" value=":DcTermNavbar(['type'=>'navbar','status'=>['in','normal,public']])" /}
  {/if}
  <div class="collapse navbar-collapse" id="nav">
    <ul class="navbar-nav ml-auto">
      {volist name="navbars" id="navbar" offset="0" length="99"}
      {if $navbar['_child']}
        <li class="nav-item dropdown {:DcDefault($module.$controll.$action, $navbar['navs_active'], 'active', 'nav-'.$key)}" id="{$navbar.navs_active|default='nav-'.$key}">
          <a class="nav-link dropdown-toggle" href="{$navbar.navs_link}" data-toggle="dropdown">{$navbar.navs_name|DcSubstr=0,6,false}</a>
          <div class="dropdown-menu mt-0">
            {volist name="navbar._child" id="navSon"}
            <a class="dropdown-item" href="{$navSon.navs_link}" target="{$navSon.navs_target}">{$navSon.navs_name|DcSubstr=0,6,false}</a>
            {/volist}
          </div>
        </li>
      {else/}
        <li class="nav-item {:DcDefault($module.$controll.$action, $navbar['navs_active'], 'active', '')}" id="{$navbar.navs_active}">
          <a class="nav-link" href="{$navbar.navs_link}" target="{$navbar.navs_target}">{$navbar.navs_name|DcSubstr=0,6,false}</a>
        </li>
      {/if}
      {/volist}
    </ul>
  </div>
</div>
</nav>
<div class="jumbotron rounded-0 border-0 mb-3">
  <div class="container text-center py-5">
    <h1 class="text-purple">{:config('index.title')}</h1>
    <hr class="my-4">
    <p class="lead">{:config('index.description')}</p>
  </div>
</div>
<div class="container">
    <div class="row">
    {volist name=":config('common.site_applys')" id="apply"}
    <div class="col-sm-6 mb-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{$apply.name|DcHtml|DcSubstr=0,20,false}</h5>
          <p class="card-text text-muted text-truncate">{$apply.info|DcHtml}</p>
          <a href="{:DcUrl($apply['module'].'/index/index','','')}" class="btn btn-purple btn-sm">{:lang('view')}</a>
        </div>
      </div>
    </div>
    {/volist} 
    </div>
    <p class="text-center">
      Powered by <a class="text-muted small" href="http://www.daicuo.net" target="_blank">{:lang('appName')} V {:config('daicuo.version')}</a>
    </p>
    <p class="text-center">
      Copyright © 2019-2022 {:config('common.site_domain')} All rights reserved
    </p>
</div>
{/block}
<!-- -->