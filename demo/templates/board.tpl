{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}

<div class="usermailcontainer">


{include file="ad.tpl"}


    <table class="table" align="center" border="1">
        <tbody>
            <tr>
                <th height="25" width="100%" align="left" id="TableTitleLink" style="font-weight: normal">本版当前共有<b>19</b>人在线。今日帖子0。
    [<a href="favboard.php?bname=Jiangxi" title="收藏本版面到收藏夹顶层目录">收藏本版</a>]
    &nbsp;[<a href="doclear.php?boardName=Jiangxi" title="将本版所有文章标记成已读">清除未读</a>]
                    <span id="onboard_users"></span></th>
            </tr>
        </tbody>


    </table>

    <!---->

    <table class="table listtable">
        <tbody>
            <tr>
                <td width="110px">
                    <a href="postarticle.php?board=Jiangxi">
                        <div class="buttonClass1" border="0" title="发新帖">
                        </div>
                    </a>
                </td>
                <!--<td width="110"><a href=# onclick="alert('本功能尚在开发中！')"><div class="buttonClass2" border="0" title="发起新投票"></div></a></td>-->

                <td align="right">
                    <a title="本版 RSS" href="">
                        <img src="img/pic/xml.gif" align="top" width="36" alt="XML" border="0"></a> &nbsp;
                                <a href="elite.php?path=%2Fgroups%2FGROUP_2%2FJiangxi" title="查看本版精华区"><font color="#FF0000"><b>精华区</b></font></a>
                    <a href="boarddoc.php?name=Jiangxi&amp;ftype=1" title="查看本版文摘区"><font color="#FF00FF"><b>文摘区</b></font></a>
                    <a href="boarddoc.php?name=Jiangxi&amp;ftype=3" title="查看本版保留区"><font color="#FF00FF"><b>保留区</b></font></a>
                    &nbsp;&nbsp;<img src="img/pic/team2.gif" align="absmiddle">
                    <a href="dispuser.php?id=wad87812" target="_blank" title="点击查看该版主资料">wad87812</a>
                </td>
            </tr>

        </tbody>
    </table>



    <!---->

    <table class="table boardtable" border="1">
        <tbody>
            <tr>
                <th height="25" width="6%" class="thalign">状态</th>
                <th width="*" class="thalign">主 题  (点<img src="img/pic/plus.gif" align="absmiddle">即可展开贴子列表)</th>
                <th width="8%" class="thalign">作 者</th>
                <th width="8%" class="thalign">回复</th>
                <th width="30%" class="thalign">最后更新 | 回复人</th>
            </tr>
        
            <tr align="middle">
                <td width="32" height="27" align="center">
                    <img src="img/pic/istop.gif" title="固顶的主题"></td>
                <td align="left" width="*">
                    <img src="img/pic/nofollow.gif" id="followImg0"><a href="disparticle.php?boardName=WHU&amp;ID=1105624590&amp;pos=0" title="发表于2010-05-09 22:40:06">[版务] WHU版版规2010版  </a></td>
                <td width="80" align="center"><a href="dispuser.php?id=DarkTemplar" target="_blank">DarkTemplar</a></td>
                <td width="64" align="center">0</td>
                <td align="left" width="210">
                    <nobr>&nbsp;<a href="disparticle.php?boardName=WHU&amp;ID=1105624590&amp;pos=0&amp;page=1#a0">2010-05-09 22:40:06</a>&nbsp;<font color="#FF0000">|</font>&nbsp;<a href="dispuser.php?id=DarkTemplar" target="_blank">DarkTemplar</a></nobr>
                </td>
            </tr>
            <tr align="middle">
                <td width="32" height="27" align="center">
                    <img src="img/pic/istop.gif" title="固顶的主题"></td>
                <td align="left" width="*">
                    <img loaded="no" src="img/pic/plus.gif" id="followImg1105563173" style="cursor: hand;" onclick="loadThreadFollow('1105563173','WHU')" title="展开贴子列表"><a href="disparticle.php?boardName=WHU&amp;ID=1105563173&amp;pos=1" title="发表于2007-05-11 17:33:53">著名谣言和非谣言列表  </a>
                    <img src="img/pic/topnew2.gif" title="未读"></td>
                <td width="80" align="center"><a href="dispuser.php?id=DarkTemplar" target="_blank">DarkTemplar</a></td>
                <td width="64" align="center">8</td>
                <td align="left" width="210">
                    <nobr>&nbsp;<a href="disparticle.php?boardName=WHU&amp;ID=1105563173&amp;pos=1&amp;page=1#a8">2012-10-09 10:39:58</a>&nbsp;<font color="#FF0000">|</font>&nbsp;<a href="dispuser.php?id=wangjianming" target="_blank">wangjianming</a></nobr>
                </td>
            </tr>
            <tr style="display: none" id="follow1105563173">
                <td colspan="5" id="followTd1105563173" style="padding: 0px">
                    <div style="width: 240px; margin-left: 18px; border: 1px solid black; background-color: lightyellow; color: black; padding: 2px" onclick="loadThreadFollow('1105563173', 'WHU')">正在读取关于本主题的跟贴，请稍侯……</div>
                </td>
            </tr>
          
        </tbody>
    </table>



    <!--dddddddddddddddddddddd-->


    <!-- search box-->
    <table class="table">
        <tbody>
            <tr>
                <form method="GET" action="queryresult.php"></form>

                <input type="hidden" name="boardNames" value="Jiangxi">

                <td class="boardsearch">快速搜索：
            <input type="text" name="title">&nbsp;
            <input type="submit" value="搜索">
                </td>

                <td>
                    <div class="redirectchoice">
                        <select onchange="">
                            <option selected="selected">跳转论坛至...</option>
                            <option value="section.php?sec=0">╋本站系统</option>
                            <option value="board.php?name=Advice">&nbsp;&nbsp;├共建山水</option>
                            <option value="board.php?name=Announce">&nbsp;&nbsp;├站务公告</option>
                            <option value="board.php?name=BBSActivity">&nbsp;&nbsp;├BBS活动</option>
                            <option value="board.php?name=BBSApp">&nbsp;&nbsp;├山水客户端</option>
                            <option value="board.php?name=BBSData">&nbsp;&nbsp;├BBS统计数据</option>
                            <option value="board.php?name=BBSDesign">&nbsp;&nbsp;├BBS美工</option>
                            <option value="board.php?name=BBSHelp">&nbsp;&nbsp;├BBS使用技巧</option>
                            <option value="board.php?name=Blog">&nbsp;&nbsp;├山水Blog</option>
                            <option value="board.php?name=BlogApply">&nbsp;&nbsp;├Blog申请</option>
                            <option value="board.php?name=BoardWork">&nbsp;&nbsp;├版面版务工作</option>
                            <option value="board.php?name=Cherub">&nbsp;&nbsp;├匿名天使的家</option>
                            <option value="board.php?name=Complain">&nbsp;&nbsp;├投诉与仲裁</option>
                            <option value="board.php?name=Death">&nbsp;&nbsp;├珞珈公墓</option>
                            <option value="board.php?name=Election">&nbsp;&nbsp;├本站选举与投票</option>
                            <option value="board.php?name=Honor">&nbsp;&nbsp;├名人堂</option>
                            <option value="board.php?name=Recommend">&nbsp;&nbsp;├推荐文章</option>
                            <option value="board.php?name=Rules">&nbsp;&nbsp;├站规讨论</option>
                            <option value="board.php?name=sysop">&nbsp;&nbsp;├站务讨论</option>
                            <option value="board.php?name=Test">&nbsp;&nbsp;├测试版</option>
                            <option value="section.php?sec=1">╋武汉大学</option>
                            <option value="board.php?name=Freshman">&nbsp;&nbsp;├大一新生</option>
                            <option value="board.php?name=Graduation">&nbsp;&nbsp;├毕业之声</option>
                            <option value="board.php?name=NICNotice">&nbsp;&nbsp;├网络信息中心</option>
                            <option value="board.php?name=Notice">&nbsp;&nbsp;├校园海报栏</option>
                            <option value="board.php?name=PostGraduate">&nbsp;&nbsp;├研究生之家</option>
                            <option value="board.php?name=Teachers">&nbsp;&nbsp;├教工</option>
                            <option value="board.php?name=TMSATWHU">&nbsp;&nbsp;├武大附中</option>
                            <option value="board.php?name=WHDXL">&nbsp;&nbsp;├武汉大学图书馆</option>
                            <option value="board.php?name=WHUAssociations">&nbsp;&nbsp;├协会社团组织</option>
                            <option value="board.php?name=WHUCelebration">&nbsp;&nbsp;├武大校庆</option>
                            <option value="board.php?name=WHUCentury">&nbsp;&nbsp;├皇皇吾大</option>
                            <option value="board.php?name=WHUConnection">&nbsp;&nbsp;├部门直通车</option>
                            <option value="board.php?name=WHUDepartments">&nbsp;&nbsp;├院系风采</option>
                            <option value="board.php?name=WHUExpress">&nbsp;&nbsp;├武大特快</option>
                            <option value="board.php?name=WHUResource">&nbsp;&nbsp;├校园网络资源</option>
                            <option value="section.php?sec=2">╋乡情校谊</option>
                            <option value="board.php?name=Anhui">&nbsp;&nbsp;├淮风皖韵·安徽</option>
                            <option value="board.php?name=BaShu">&nbsp;&nbsp;├巴山蜀水·巴蜀</option>
                            <option value="board.php?name=Beijing">&nbsp;&nbsp;├皇城幽幽·北京</option>
                            <option value="board.php?name=Fujian">&nbsp;&nbsp;├闽海观潮·福建</option>
                            <option value="board.php?name=Gansu">&nbsp;&nbsp;├陇上人家·甘肃</option>
                            <option value="board.php?name=Guangdong">&nbsp;&nbsp;├岭南大地·广东</option>
                            <option value="board.php?name=Guangxi">&nbsp;&nbsp;├八桂大地·广西</option>
                            <option value="board.php?name=Guizhou">&nbsp;&nbsp;├黔山秀水·贵州</option>
                            <option value="board.php?name=Hebei">&nbsp;&nbsp;├慷慨燕赵·河北</option>
                            <option value="board.php?name=Henan">&nbsp;&nbsp;├逐鹿中原·河南</option>
                            <option value="board.php?name=Hubei">&nbsp;&nbsp;├荆风楚韵·湖北</option>
                            <option value="board.php?name=Hunan">&nbsp;&nbsp;├三湘四水·湖南</option>
                            <option value="board.php?name=Jiangsu">&nbsp;&nbsp;├吴韵汉风·江苏</option>
                            <option value="board.php?name=Jiangxi">&nbsp;&nbsp;├江南西道·江西</option>
                            <option value="board.php?name=NorthEast">&nbsp;&nbsp;├白山黑水·东北</option>
                            <option value="board.php?name=Shaanxi">&nbsp;&nbsp;├策马秦川·陕西</option>
                            <option value="board.php?name=Shandong">&nbsp;&nbsp;├齐鲁大地·山东</option>
                            <option value="board.php?name=Shanghai">&nbsp;&nbsp;├风情沪上·上海</option>
                            <option value="board.php?name=Wuhan">&nbsp;&nbsp;├江城风情</option>
                            <option value="board.php?name=Zhejiang">&nbsp;&nbsp;├诗画之江·浙江</option>
                            <option value="section.php?sec=3">╋电脑网络</option>
                            <option value="board.php?name=ACM_ICPC">&nbsp;&nbsp;├国际大学生程序设计竞赛</option>
                            <option value="board.php?name=BBSDev">&nbsp;&nbsp;├BBS安装与维护</option>
                            <option value="board.php?name=CPlusPlus">&nbsp;&nbsp;├C++程序设计</option>
                            <option value="board.php?name=Database">&nbsp;&nbsp;├数据库</option>
                            <option value="board.php?name=Digital">&nbsp;&nbsp;├数码时代</option>
                            <option value="board.php?name=Google">&nbsp;&nbsp;├Google Camp</option>
                            <option value="board.php?name=Hardware">&nbsp;&nbsp;├硬件天地</option>
                            <option value="board.php?name=IBM">&nbsp;&nbsp;├IBM俱乐部</option>
                            <option value="board.php?name=Internet">&nbsp;&nbsp;├万维世界</option>
                            <option value="board.php?name=Java">&nbsp;&nbsp;├爪哇</option>
                            <option value="board.php?name=Linux_Unix">&nbsp;&nbsp;├Linux &amp; Unix</option>
                            <option value="board.php?name=Microsoft">&nbsp;&nbsp;├微软俱乐部</option>
                            <option value="board.php?name=OS">&nbsp;&nbsp;├操作系统</option>
                            <option value="board.php?name=Programm">&nbsp;&nbsp;├程序人生</option>
                            <option value="board.php?name=Security">&nbsp;&nbsp;├系统安全</option>
                            <option value="board.php?name=Software">&nbsp;&nbsp;├软件快递</option>
                            <option value="board.php?name=TeX">&nbsp;&nbsp;├TeX 和 LaTeX</option>
                            <option value="board.php?name=Theory">&nbsp;&nbsp;├计算机理论</option>
                            <option value="section.php?sec=4">╋科学技术</option>
                            <option value="board.php?name=Biology">&nbsp;&nbsp;├生物</option>
                            <option value="board.php?name=Chemistry">&nbsp;&nbsp;├化学</option>
                            <option value="board.php?name=Economics">&nbsp;&nbsp;├经济学</option>
                            <option value="board.php?name=Electronics">&nbsp;&nbsp;├电子电机</option>
                            <option value="board.php?name=Environment">&nbsp;&nbsp;├环境科学</option>
                            <option value="board.php?name=Geography">&nbsp;&nbsp;├地理</option>
                            <option value="board.php?name=History">&nbsp;&nbsp;├历史</option>
                            <option value="board.php?name=Law">&nbsp;&nbsp;├法律</option>
                            <option value="board.php?name=Math">&nbsp;&nbsp;├数学</option>
                            <option value="board.php?name=NumComp">&nbsp;&nbsp;├数值计算</option>
                            <option value="board.php?name=Physics">&nbsp;&nbsp;├物理</option>
                            <option value="board.php?name=Science">&nbsp;&nbsp;├科学</option>
                            <option value="board.php?name=Sex">&nbsp;&nbsp;├人之初</option>
                            <option value="section.php?sec=5">╋文学艺术</option>
                            <option value="board.php?name=ASCIIart">&nbsp;&nbsp;├ASCII艺术</option>
                            <option value="board.php?name=Chorus">&nbsp;&nbsp;├合唱艺术</option>
                            <option value="board.php?name=Classics">&nbsp;&nbsp;├古典及爵士音乐</option>
                            <option value="board.php?name=Comic">&nbsp;&nbsp;├漫画*动画*童话</option>
                            <option value="board.php?name=Emprise">&nbsp;&nbsp;├武侠世界</option>
                            <option value="board.php?name=English">&nbsp;&nbsp;├英语天地</option>
                            <option value="board.php?name=French">&nbsp;&nbsp;├浪漫法兰西</option>
                            <option value="board.php?name=MyStage">&nbsp;&nbsp;├舞台人生</option>
                            <option value="board.php?name=Novels">&nbsp;&nbsp;├小说</option>
                            <option value="board.php?name=Photography">&nbsp;&nbsp;├珞珈摄影</option>
                            <option value="board.php?name=Poetry">&nbsp;&nbsp;├诗词歌赋</option>
                            <option value="board.php?name=Reader">&nbsp;&nbsp;├读书</option>
                            <option value="board.php?name=S.F.">&nbsp;&nbsp;├幻之天空</option>
                            <option value="board.php?name=SanGuo">&nbsp;&nbsp;├青梅煮酒</option>
                            <option value="board.php?name=StoneStory">&nbsp;&nbsp;├红楼梦</option>
                            <option value="board.php?name=Story">&nbsp;&nbsp;├珞珈原创</option>
                            <option value="section.php?sec=6">╋休闲娱乐</option>
                            <option value="board.php?name=Astrology">&nbsp;&nbsp;├星座</option>
                            <option value="board.php?name=Automobile">&nbsp;&nbsp;├车元素</option>
                            <option value="board.php?name=dancing">&nbsp;&nbsp;├舞迷之家</option>
                            <option value="board.php?name=Debate">&nbsp;&nbsp;├唇舌烽火</option>
                            <option value="board.php?name=Family">&nbsp;&nbsp;├寸草春晖</option>
                            <option value="board.php?name=Fashion">&nbsp;&nbsp;├格调生活</option>
                            <option value="board.php?name=Feeling">&nbsp;&nbsp;├心情故事</option>
                            <option value="board.php?name=food">&nbsp;&nbsp;├饮食文化</option>
                            <option value="board.php?name=FreeTalk">&nbsp;&nbsp;├无事闲聊</option>
                            <option value="board.php?name=Game">&nbsp;&nbsp;├计算机游戏</option>
                            <option value="board.php?name=Humor">&nbsp;&nbsp;├幽默</option>
                            <option value="board.php?name=IDstory">&nbsp;&nbsp;├ID故事</option>
                            <option value="board.php?name=KeepFit">&nbsp;&nbsp;├瘦身塑体</option>
                            <option value="board.php?name=KingKiller">&nbsp;&nbsp;├杀人游戏</option>
                            <option value="board.php?name=Love">&nbsp;&nbsp;├情谊两心知</option>
                            <option value="board.php?name=Movie">&nbsp;&nbsp;├电影</option>
                            <option value="board.php?name=Mud">&nbsp;&nbsp;├泥巴乐园</option>
                            <option value="board.php?name=Picture">&nbsp;&nbsp;├贴图版</option>
                            <option value="board.php?name=PieFriends">&nbsp;&nbsp;├缘分的天空</option>
                            <option value="board.php?name=PopMusic">&nbsp;&nbsp;├流行音乐</option>
                            <option value="board.php?name=Riddle">&nbsp;&nbsp;├谜语天地</option>
                            <option value="board.php?name=Rock">&nbsp;&nbsp;├摇滚乐</option>
                            <option value="board.php?name=single">&nbsp;&nbsp;├光辉岁月</option>
                            <option value="board.php?name=Think">&nbsp;&nbsp;├我思故我在</option>
                            <option value="board.php?name=Travel">&nbsp;&nbsp;├海天游踪</option>
                            <option value="board.php?name=TV">&nbsp;&nbsp;├电视</option>
                            <option value="board.php?name=Youth">&nbsp;&nbsp;├青涩时代</option>
                            <option value="section.php?sec=7">╋体育健身</option>
                            <option value="board.php?name=Badminton">&nbsp;&nbsp;├羽毛球</option>
                            <option value="board.php?name=baseball">&nbsp;&nbsp;├棒球</option>
                            <option value="board.php?name=Basketball">&nbsp;&nbsp;├篮球</option>
                            <option value="board.php?name=Bicycle">&nbsp;&nbsp;├一骑绝尘</option>
                            <option value="board.php?name=Bridge">&nbsp;&nbsp;├桥牌</option>
                            <option value="board.php?name=Chess">&nbsp;&nbsp;├珞珈棋缘</option>
                            <option value="board.php?name=Football">&nbsp;&nbsp;├足球</option>
                            <option value="board.php?name=GO">&nbsp;&nbsp;├黑白纵横</option>
                            <option value="board.php?name=Olympic2008">&nbsp;&nbsp;├北京奥运会</option>
                            <option value="board.php?name=Sports">&nbsp;&nbsp;├休闲体育</option>
                            <option value="board.php?name=Tabletennis">&nbsp;&nbsp;├乒乓球</option>
                            <option value="board.php?name=Tennis">&nbsp;&nbsp;├网球</option>
                            <option value="board.php?name=Volleyball">&nbsp;&nbsp;├鲲鹏展翅</option>
                            <option value="board.php?name=Yoga">&nbsp;&nbsp;├瑜伽</option>
                            <option value="section.php?sec=8">╋社会信息</option>
                            <option value="board.php?name=Abroad">&nbsp;&nbsp;├出国·他乡寻梦</option>
                            <option value="board.php?name=ADagent_TG">&nbsp;&nbsp;├代理与团购</option>
                            <option value="board.php?name=EnglishTest">&nbsp;&nbsp;├英语考试</option>
                            <option value="board.php?name=Graduate">&nbsp;&nbsp;├毕业生</option>
                            <option value="board.php?name=House">&nbsp;&nbsp;├房屋租赁</option>
                            <option value="board.php?name=Job">&nbsp;&nbsp;├工作</option>
                            <option value="board.php?name=JobInfo">&nbsp;&nbsp;├工作信息</option>
                            <option value="board.php?name=kaoyan">&nbsp;&nbsp;├考研信息港</option>
                            <option value="board.php?name=Medicine">&nbsp;&nbsp;├医疗保健</option>
                            <option value="board.php?name=Military">&nbsp;&nbsp;├军事天地</option>
                            <option value="board.php?name=MyWallet">&nbsp;&nbsp;├投资理财</option>
                            <option value="board.php?name=News">&nbsp;&nbsp;├新闻</option>
                            <option value="board.php?name=PartTimeJob">&nbsp;&nbsp;├兼职信息</option>
                            <option value="board.php?name=Search">&nbsp;&nbsp;├失物招领</option>
                            <option value="board.php?name=secondhand">&nbsp;&nbsp;├二手货交易市场</option>
                            <option value="board.php?name=TrafficInfo">&nbsp;&nbsp;├交通信息</option>
                            <option value="board.php?name=WHU">&nbsp;&nbsp;├珞珈论坛</option>
                            <option value="board.php?name=Wish">&nbsp;&nbsp;├生日·祝福</option>
                        </select>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- search end-->

    <table class="table" border="1">
        <tbody>
            <tr>
                <th class="ljsstlth">-=&gt; 珞珈山水BBS图例</th>
                <th nowrap="" width="20%" align="right">所有时间均为 - 北京时间 &nbsp;</th>
            </tr>
            <tr>
                <td colspan="2" class="table">
                    <table cellspacing="4" cellpadding="0" width="92%" border="0" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/pic/blue/folder.gif">
                                    开放的主题</td>
                                <td>
                                    <img src="img/pic/blue/hotfolder.gif">
                                    回复超过10贴</td>
                                <td>
                                    <img src="img/pic/blue/lockfolder.gif">
                                    锁定的主题</td>
                                <td>
                                    <img src="img/pic/istop.gif">
                                    固顶的主题 </td>
                                <!--<td><img src=pic/ztop.gif> 总固顶的主题 </td>-->
                                <td>
                                    <img src="img/pic/isbest.gif">
                                    精华帖子 </td>
                                <!--<td> <img src=pic/closedb.gif> 投票帖子 </td>-->
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</div>
{include file="footer.tpl"}
