{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}

<div class="usermailcontainer">

{include file="ad.tpl"}


{include file="navmenu.tpl"}


<form action="dosendmail.php" method="post" name="messager" id="messager" onkeydown="if(event.keyCode==13 &amp;&amp; event.ctrlKey){ obj=getRawObject('messager');obj.submit();} ">
    <table class="table" border="1">
        <tbody>
            <tr >
                <th colspan="3" class="emailth">
                    回复信件
                </th>
            </tr>
            <tr>
                <td class="TableBody1" valign="middle"><b>收件人:</b></td>
                <td class="TableBody1" valign="middle">
                    <input name="destid" maxlength="12" value="DarkTemplar" size="12" readonly="">
                </td>
            </tr>
            <tr>
                <td class="TableBody1" valign="top" width="15%"><b>标题：</b></td>
                <td class="TableBody1" valign="middle">
                    <input name="title" maxlength="50" size="50" value="Re: 著名谣言和非谣言列表（已更新） ">
                </td>
            </tr>
            <tr>
                <td class="TableBody1" valign="top" width="15%"><b>内容：</b></td>
                <td class="TableBody1" valign="middle">
                    <textarea class="emailcontent" name="content">
                 
                    </textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" class="TableBody1"><b>选项：</b></td>
                <td valign="middle" class="TableBody1">&nbsp;<select name="signature">
                    <option value="0" selected="selected">不使用签名档</option>
                </select>
                    [<a target="_balnk" href="bbssig.php">查看签名档</a>]<br>
                    <input type="checkbox" name="backup" checked="checked">备份到发件箱中
                </td>
            </tr>
            <tr>
                <td class="TableBody2" valign="middle" colspan="2" align="center">&nbsp;
              <input type="Submit" value="发送信件" name="Submit" class="btn-info">
                </td>
            </tr>

        </tbody>
    </table>
</form>

</div>


{include file="footer.tpl"}