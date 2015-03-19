<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 09:55:18
         compiled from ".\templates\setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:401454944c40b67ab9-73507259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f24eaa4ada8faa6c0ec53a204d1f30bf996aea70' => 
    array (
      0 => '.\\templates\\setting.tpl',
      1 => 1419005754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '401454944c40b67ab9-73507259',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54944c40bf8353_74424910',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54944c40bf8353_74424910')) {function content_54944c40bf8353_74424910($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'hello'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="settingcontainer">

<div id="user-setting-page">
    <h1>帐号设置</h1>

    <div>
        <form action="" method="post">
            <div class="setting-unit">
                <div class="unit-title">
                    基本资料
                </div>
                <table class="list">
                    <tbody>
                        <tr>
                            <td class="row-header">登录名：</td>
                            <td>
                                <input name="logname" class="input-area form-control" placeholder="luojiashanshui" >
                                
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span>2-12字符，可用字母或数字，开头必须为字母</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a id="alter-password">修改密码</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">性别：</td>
                            <td class="sex">
                                <label>
                                    <input type="radio" name="sex" value="f">
                                    男
                                </label>
                                <label>
                                    <input type="radio" name="sex" value="m">
                                    女
                                </label>
                                <label>
                                    <input type="radio" name="sex" value="s">
                                    保密
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">生日：</td>
                            <td class="birthday">
                                <input id="year" class="input-area form-control" maxlength="4" value>
                                <label>年</label>
                                <input class="input-area form-control" maxlength="2" value>
                                <label>月</label>
                                <input class="input-area form-control" maxlength="2" value>
                                <label>日</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">邮箱：</td>
                            <td><input class="input-area form-control" value>
                            </td>
                        </tr>
                    </tbody>    
                </table>
            </div>
            <div class="setting-unit">
                <div class="unit-title">
                    实名认证
                </div>
                <table class="list">
                    <tbody>

                        <tr>
                            <td class="row-header">真实姓名：</td>
                            <td>
                               <input name="username" class="input-area form-control"  placeholder="珞珈山水">

                                
                            </td>

                        </tr>
                      
                     
                         
                        <tr>
                            <td class="row-header">学号/工号：</td>
                            <td>
                                <input name="userID" class="input-area form-control" placeholder="2012302580001">
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">院系/部门：</td>
                            <td>
                                <input name="department" class="input-area form-control" placeholder="国际软件学院">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <span class="note">在校学生可自动实名认证</span>
                            </td>
                        </tr>
                    </tbody>    
                </table>
            </div>

            <button id="submit-setting" type="button" class="btn btn-primary">
                <strong>保存</strong>
            </button>
        </form>
    </div>

    
  </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
<?php }} ?>
