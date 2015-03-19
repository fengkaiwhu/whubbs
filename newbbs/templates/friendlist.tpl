{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}
<script type="text/javascript">
<!--
    writeStyleSheets();
    //-->
</script>
</head>
<script language="javascript">
<!--
    var siteconf_SMS_SUPPORT = 0;
    var siteconf_BOARDS_PER_ROW = 3;
    var siteconf_SHOW_POST_UNREAD = 1;
    var siteconf_THREADSPERPAGE = 15;
    defineMenus();
    //-->
</script>


<div class="votecontainer">
    {include file="ad.tpl"}


    <br />
    {include file="childnav.tpl"}
    <script language="JavaScript">
<!--
    initTime(1419080923);
    //-->
    </script>
    <br />
    <!--
<table class="table">
<tr>
<th width=14% height=25 id=TableTitleLink><a href=usermanagemenu.php>控制面板首页</a></th>
<th width=14%  id=TableTitleLink><a href=modifyuserdata.php>基本资料修改</a></th>
<th width=14%  id=TableTitleLink><a href=changepasswd.php>昵称密码修改</a></th>
<th width=14%  id=TableTitleLink><a href=userparam.php>用户自定义参数</a></th>
<th width=14%  id=TableTitleLink><a href=usermailbox.php>用户信件服务</a></th>
<th width=14%  id=TableTitleLink><a href=friendlist.php>编辑好友列表</a></th>
<th width=14%  id=TableTitleLink><a href=modifyfavboards.php>收藏版面管理</a></th>
</tr>
</table>
-->

    {include file="navmenu.tpl"}

    <br>
    <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
        <tr>
            <th valign="middle" width="10%" height="25">序号</th>
            <th valign="middle" width="20%">用户账号</th>
            <th valign="middle" width="*">好友说明</th>
            <th valign="middle" width="10%">操作</th>
        </tr>
        <tr>
            <td align="right" valign="middle" colspan="4" class="TableBody2">
                <font color="gray">[第一页]</font>
                <font color="gray">[上一页]</font>
                <font color="gray">[下一页]</font>
                <font color="gray">[最后一页]</font>
                <br>
                您共有 <b>0</b> 位好友。
            </td>
        </tr>
    </table>
    <form method="GET" action="friendlist.php">
        <table align="center">
            <tr>
                <td>
                    <input type="text" name="addfriend">&nbsp;<input type="submit" name="submit" value="添加好友">
                </td>
            </tr>
        </table>
    </form>


</div>

{include file="footer.tpl"}

