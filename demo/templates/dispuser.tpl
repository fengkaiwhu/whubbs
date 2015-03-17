{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}


{include file="left.tpl"}

{include file="right.tpl"}

<div class="votecontainer">

{include file="ad.tpl"}

<table class="table">
    <tbody>
        <tr>
            <td>
                <img src="img/userface/image0.gif" align="absmiddle/"><b>qhylyh</b>
            </td>
            <td align="right">
                <b>
                    <a href="sendmail.php?receiver=qhylyh" title="给该用户发信">发信问候</a> | 
                    <a href="friendlist.php?addfriend=qhylyh" title="将该用户添加到好友列表">加为好友</a>
                </b>
            </td>
        </tr>
    </tbody>
</table>

<table class="table" border="1">
    <colgroup>
        <col width="20%">
        <col width="*">
        <col width="40%">
    </colgroup>
    <tbody>
        <tr>
            <th colspan="2" align="left" height="25">基本资料</th>
            <td rowspan="8" align="center"  width="40%" valign="top">
                <font color="gray">无</font></td>
        </tr>
        <tr>
            <td  width="20%" align="right">昵 称：</td>
            <td >samuel </td>
        </tr>

        <tr>
            <td  width="20%" align="right">性 别：</td>
            <td >男 </td>
        </tr>
        <tr>
            <td  width="20%" align="right">星 座：</td>
            <td >
                <img src="img/star/z10.gif" alt="魔羯座">
                魔羯座</td>
        </tr>
        <tr>
            <td  width="20%" align="right">Ｑ Ｑ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td  width="20%" align="right">ＩＣＱ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td width="20%" align="right">ＭＳＮ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td width="20%" align="right">主 页：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
    </tbody>
</table>


<table class="table" border="1">
    <tbody>
        <tr>
            <th align="left" colspan="6" height="25">论坛属性</th>
        </tr>
        <tr>
            <td  width="15%" align="right">论坛职务：</td>
            <td width="35%" ><b>站务总监 </b></td>
            <td width="15%" align="right" >帖子总数：</td>
            <td width="35%" ><b>1115</b> 篇</td>
        </tr>
        <tr>
            <td  width="15%" align="right">门  派：</td>
            <td width="35%" ><b>无门无派 </b></td>
            <td  width="15%" align="right">登录次数：</td>
            <td width="35%" ><b>1592</b>
            </td>
        </tr>
        <tr>
            <td  width="15%" align="right">经验值：</td>
            <td width="35%" ><b>4560 </b></td>
            <td  width="15%" align="right">经验等级：</td>
            <td width="35%" ><b>本站元老</b>
            </td>
        </tr>
        <tr>
            <td  width="15%" align="right">生命力：</td>
            <td width="35%" ><b>999</b></td>
            <td width="15%" align="right" >上次登录：</td>
            <td width="35%" ><b>2014-12-19 17:29:02</b></td>
        </tr>
        <tr>
            <td  width="15%" align="right">同门：</td>
            <td width="35%"  colspan="3"><b>
                <a href="dispuser.php?id=0">0</a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp; </b></td>
        </tr>
        <tr>
            <td width="50%"  colspan="2" align="center"><b>目前不在站上</b></td>
            <td width="15%" align="right" >最后来访IP：</td>
            <td width="35%" ><b>202.114.74.*</b></td>
        </tr>
    </tbody>
</table>


<form method="GET" action="dispuser.php">
    <table class="table dispusertablesearch" >
        <tbody>
            <tr>
                <td>请输入用户名:
                    <input type="text" name="id">&nbsp;<input type="submit" value="查询用户" class="btn-info">
                </td>
            </tr>
        </tbody>
    </table>
</form>





</div>