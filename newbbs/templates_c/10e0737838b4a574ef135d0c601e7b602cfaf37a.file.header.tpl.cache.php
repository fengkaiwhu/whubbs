<?php /* Smarty version Smarty-3.1.18, created on 2014-12-29 04:47:26
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2205548841b6c17ac6-85182535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1419824825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2205548841b6c17ac6-85182535',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548841b6c23653_28799730',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548841b6c23653_28799730')) {function content_548841b6c23653_28799730($_smarty_tpl) {?>
<!--header begin--> 
<div id="header" role="navigation">
    <a id="logo" href="./index.php" title="珞珈山水BBS">
        <img width="100" height="100" src="img/logo.png" alt="珞珈山水BBS">
    </a>

    <ul class="breadcrumb" id="breadcrumb">
      <li id="breadcrumb-1"><a href="./index.php">珞珈山水BBS</a> <span class="divider">/</span></li>
      <li id="breadcrumb-2"><a href="javascript:void(0);">测试1层</a> <span class="divider">/</span></li>
      <li class="active" id="breadcrumb-3">测试2层</li>
    </ul>

    <ul id="nav" class="nav-main">
        <li class="items" id="li-1">
            <a id="message" href="javascript:void(0);" title="私信">
                <img  src="img/icon-message.png" alt="私信">
            </a>
        </li>

        <li class="items">
            <a id="setting" href="./usermanagemenu.php" title="设置">
                <img  src="img/icon-setting.png" alt="设置">
            </a>
        </li>

        <li class="items">
            <a id="login" href="#loginModal" data-toggle="modal" title="登录">
                登录
            </a>
        </li>

        <li class="items" >
            <a id="register" href="#registerModal" data-toggle="modal" title="注册">
                注册
            </a>
        </li>

    </ul>

    
    <div id="box-1" class="hidden-box hidden-loc-index">
            <ul>
                <li><a href="./usermailbox.php"><span>私信</span>
                 <span title="" class="whitespacelittle" >
                                  22
                  </span></a>
                    
                </li>
                <li><span>回复</span>
                   <span title="" class="whitespacelittle" >
                       1
                  </span>
                </li>
                <li><span>@我</span>
                   <span title="" class="whitespacelittle" >
                          322
                  </span>
                </li>
            </ul>

            <div class=""></div>
        </div>

        
    <div id="online-numbers">
        <p>在线人数: <span>212</span></p>
    </div>
</div>
<!-- header end -->



<!-- login 模态框 begin -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="珞珈山水BBS">
            <h3>珞珈山水BBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="loginForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">用户名</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="用户名">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="密码">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox"> 记住我
              </label>
              <button id="login-btn" type="submit" class="button">登录</button>
              <button id="login-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">取消</button>
              <a id="anonymity" href="javascript:void(0);">匿名登录>></a>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- login 模态框 end -->



<!-- register 模态框 begin -->
<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="珞珈山水BBS">
            <h3>珞珈山水BBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="registerForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">用户名</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="用户名">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="密码">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button id="register-btn" type="submit" class="button">注册</button>
              <button id="register-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">取消</button>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- register 模态框 end -->
<?php }} ?>
