{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=hello}

{include file="header.tpl"}

{include file="left.tpl"}

{include file="right.tpl"}

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
{include file="footer.tpl"}