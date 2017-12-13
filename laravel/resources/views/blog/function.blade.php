@extends('layouts.blog')
@section('title','辅助函数')
@section('content')
<article class="blogs">
  <h1 class="t_nav"><a href="/" class="n1">网站首页</a><a href="/" class="n2">辅助函数</a></h1>
  <div class="index_about">
    <table class="table table-bordered table-condensed class" style="width:95%;">
      <center><h3>laravel辅助函数</h3></center>
      <thead>
      <tr>
        <th>函数名称</th>
        <th>类型</th>
        <th>作用</th>
        <th>用法</th>
        <th>返回实例</th>

      </tr>
      </thead>
      <tbody>
        <tr>
          <td>array_except()</td>
          <td>数组</td>
          <td>函数从数组中删除给定的键/值对：</td>
          <td>array_except($array, ['price']);</td>
          <td>--</td>
        </tr>
        <tr>
          <td>public_path()</td>
          <td>路径</td>
          <td>函数返回 public 目录的完整路径</td>
          <td>$path = public_path();</td>
          <td>/var/www/laravel/public</td>
        </tr>
        <tr>
          <td>str_limit()</td>
          <td>字符串</td>
          <td>函数按给定的长度截断给定的字符串：</td>
          <td>str_limit('lazydog',20);</td>
          <td>--</td>
        </tr>
        <tr>
          <td>info() logger()</td>
          <td>日记</td>
          <td>写入日记：</td>
          <td>str_limit('lazydog',20);</td>
          <td>info('this is log')</td>
        </tr>

      </tbody>
    </table>
  </div>
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
    <script type="text/javascript" id="bdshell_js"></script>
    <script type="text/javascript">
      document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script>
    <!-- Baidu Button END -->
    <div class="blank"></div>
    <div class="news">
      <h3>
        <p>栏目<span>最新</span></p>
      </h3>
      <ul class="rank">
        <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
        <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
        <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
        <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
        <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
        <li><a href="/" title="建站流程篇――教你如何快速学会做网站" target="_blank">建站流程篇――教你如何快速学会做网站</a></li>
        <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
        <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
      </ul>
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      <ul class="paih">
        <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
        <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
        <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
        <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
        <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
      </ul>
    </div>
    <div class="visitors">
      <h3>
        <p>最近访客</p>
      </h3>
      <ul>
      </ul>
    </div>
  </aside>
</article>
@stop