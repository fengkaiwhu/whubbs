
{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}

<div class="usermailcontainer">


{include file="ad.tpl"}


<table class="table">
    <tbody>
        <tr>
            <th height="25">帖子预览</th>
        </tr>
        <tr>
            <td class="TableBody1" height="24"><b>Re: 我们居然捡到了Iphone！！！！ </b></td>
        </tr>
    </tbody>
</table>


<table class="table">
    <tbody>
        <tr>
            <td>点个赞
 <br>
                <img src="img/emot/em07.gif" border="0" align="middle"></td>
        </tr>
    </tbody>
</table>


</div>


{include file="footer.tpl"}