{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}



<div class="votecontainer">
{include file="ad.tpl"}


{include file="childnav.tpl"}

<form action="saveuserparam.php" method=POST name="theForm">
        <table cellpadding=3 cellspacing=1 border="1" align=center class="table">
            <tr> 
                  <th colspan="2" width="100%">用户个人参数</th>
             </tr> 
            <tr>
                    <td width="40%" ><B>让好友呼叫</B>：<BR>当呼叫器关闭时是否允许好友呼叫</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_6" value="1" checked >是			
                        <input type="radio" name="user_define_6" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>接受所有人的讯息</B>：<BR>是否允许所有人给您发短消息？</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_15" value="1" checked >是		
                        <input type="radio" name="user_define_15" value="0"  >否       
                    </td>   
            </tr>
            <tr>    
                    <td width="40%"><B>接受好友的讯息</B>：<BR>是否好友给您发短消息？</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_16" value="1" checked >是			<input type="radio" name="user_define_16" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%" ><B>收到讯息发出声音</B>：<BR>收到短信后是否以声音提醒您？</td>   
                    <td width="60%" >    
            			<input type="radio" name="user_define_17" value="1" checked >是			
                        <input type="radio" name="user_define_17" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>显示详细用户信息</B>：<BR>是否允许他人看到您的性别、生日、联系方式等资料</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_29" value="1" checked >允许		
                    	<input type="radio" name="user_define_29" value="0"  >不允许        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>显示真实用户信息</B>：<BR>是否允许他人看到您的真实姓名、地址等资料</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_30" value="1"  >允许	
                    	<input type="radio" name="user_define_30" value="0" checked >不允许       
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>隐藏 IP</B>：<BR>是否发文和被查询的时候隐藏自己的 IP 信息</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define1_0" value="1" checked >隐藏		
                    	<input type="radio" name="user_define1_0" value="0"  >不隐藏       
                     </td>   
            </tr>
            <tr>
                    <td width="40%"><B>发信时保存信件到发件箱</B>：<BR>是否发信时自动选择保存到发件箱</td>   
                    <td width="60%">    
            			<input type="radio" name="mailbox_prop_0" value="1" checked >保存		
                    	<input type="radio" name="mailbox_prop_0" value="0"  >不保存       
                    </td>   
            </tr>
            <tr>
                    <td width="40%" ><B>删除信件时不保存到垃圾箱</B>：<BR>是否删除信件时不保存到垃圾箱</td>   
                    <td width="60%" >    
            			<input type="radio" name="mailbox_prop_1" value="1"  >不保存	
                		<input type="radio" name="mailbox_prop_1" value="0" checked >保存      
                    </td>   
            </tr>
            <tr align="center"> 
                <td colspan="2" width="100%" class=TableBody2>
                     <input type=Submit value="更 新" name="Submit" class="btn-info"> &nbsp;
                     <input type="reset" name="Submit2" value="清 除" class="btn-danger">
                </td>
            </tr>
        </table>
</form>

</div>

{include file="footer.tpl"}