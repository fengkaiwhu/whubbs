{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}



<div class="votecontainer">
    {include file="ad.tpl"}


{include file="childnav.tpl"}

    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户昵称
                </th>
            </tr>
            <tr>
                <td width="40%" align="right"><b>您的昵称：</b>
                <td width="60%">
                    <input type="text" name="nick" value="E时代专家" size="24">
                    &nbsp; &nbsp;
      <input type="checkbox" value="1" name="chkTmp">临时修改昵称（在线用户列表中有效）
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%" class="TableBody2">
                    <input type="Submit" value="修 改" class="btn-info">
                </td>
            </tr>

        </table>
    </form>
    <br>

    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户密码资料
                </th>
            </tr>
            <tr>
                <td width="40%"><b>旧密码确认</b>：<br>
                    如要修改请输入旧密码进入确认</td>
                <td width="60%">
                    <input type="password" name="oldpsw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码</b>：<br>
                    如要修改请直接输入新密码进入更新</td>
                <td width="60%">
                    <input type="password" name="psw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码确认</b>：<br>
                    再输一次新密码防止输入错误</td>
                <td width="60%">
                    <input type="password" name="psw2" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%">
                    <input type="Submit" value="更 新" name="Submit" class="btn-success">
                    &nbsp; 
            <input type="reset" name="Submit2" value="清 除" class="btn-danger">
                </td>
            </tr>

        </table>
    </form>
</div>
{include file="footer.tpl"}