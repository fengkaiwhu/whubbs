<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 20:11:52
         compiled from "./templates/modifyfavboards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171515966354980a886ac031-20719360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8627e3371a5d4730bb9472856be0195102085e3' => 
    array (
      0 => './templates/modifyfavboards.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171515966354980a886ac031-20719360',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54980a886f25e2_73923026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54980a886f25e2_73923026')) {function content_54980a886f25e2_73923026($_smarty_tpl) {?>     
<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript">
<!--
    writeStyleSheets();
    //-->
<?php echo '</script'; ?>
>
</head>
<?php echo '<script'; ?>
 language="javascript">
<!--
    var siteconf_SMS_SUPPORT = 0;
    var siteconf_BOARDS_PER_ROW = 3;
    var siteconf_SHOW_POST_UNREAD = 1;
    var siteconf_THREADSPERPAGE = 15;
    defineMenus();
    //-->
<?php echo '</script'; ?>
>


<div class="votecontainer">

<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <br />
    <?php echo $_smarty_tpl->getSubTemplate ("childnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo '<script'; ?>
 language="JavaScript">
<!--
    initTime(1419080923);
    //-->
    <?php echo '</script'; ?>
>
    <br />



    <form method="post" target="_self" action="savefavboards.php?select=0">
        <table class="table tabledefine">
            <tr>
                <th class="thdefine">本站系统</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Advice">
                                <a href="board.php?name=Advice">Advice (共建山水)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Announce">
                                <a href="board.php?name=Announce">Announce (站务公告)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSApp">
                                <a href="board.php?name=BBSApp">BBSApp (山水客户端)</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSHelp" checked="checked">
                                <a href="board.php?name=BBSHelp">BBSHelp (BBS使用技巧)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Blog">
                                <a href="board.php?name=Blog">Blog (山水Blog)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BlogApply">
                                <a href="board.php?name=BlogApply">BlogApply (Blog申请)</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Cherub">
                                <a href="board.php?name=Cherub">Cherub (匿名天使的家)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Death">
                                <a href="board.php?name=Death">Death (珞珈公墓)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Election">
                                <a href="board.php?name=Election">Election (本站选举与投票)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Honor">
                                <a href="board.php?name=Honor">Honor (名人堂)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Recommend">
                                <a href="board.php?name=Recommend">Recommend (推荐文章)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Rules">
                                <a href="board.php?name=Rules">Rules (站规讨论)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="sysop" checked="checked">
                                <a href="board.php?name=sysop">sysop (站务讨论)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Test">
                                <a href="board.php?name=Test">Test (测试版)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSActivity (BBS活动)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Anniversary">
                                            <a href="board.php?name=Anniversary">Anniversary (山水站庆)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="TShirt">
                                            <a href="board.php?name=TShirt">TShirt (山水站衫)</a></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSData (BBS统计数据)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BBSLists">
                                            <a href="board.php?name=BBSLists">BBSLists (本站的各类数据统计列表)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="notepad">
                                            <a href="board.php?name=notepad">notepad (酸甜苦辣)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="vote">
                                            <a href="board.php?name=vote">vote (各项投票与结果)</a>
                                        </td>
                                    </tr>
                                </table>


                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSDesign (BBS美工)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="TelnetArt">
                                            <a href="board.php?name=TelnetArt">TelnetArt (Telnet美工)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="WebArt">
                                            <a href="board.php?name=WebArt">WebArt (Web美工)</a></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BoardWork (版面版务工作)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BMApply">
                                            <a href="board.php?name=BMApply">BMApply (版务申请)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BMManage">
                                            <a href="board.php?name=BMManage">BMManage (版务管理)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BoardApply">
                                            <a href="board.php?name=BoardApply">BoardApply (版面申请)</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BoardManage">
                                            <a href="board.php?name=BoardManage">BoardManage (版面管理)</a>
                                        </td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">Complain (投诉与仲裁)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Appeal">
                                            <a href="board.php?name=Appeal">Appeal (投诉)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Arbitration">
                                            <a href="board.php?name=Arbitration">Arbitration (仲裁)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Penalty">
                                            <a href="board.php?name=Penalty">Penalty (处罚公告)</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="TableBody1" class="thdefine">武汉大学</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Freshman">
                                <a href="board.php?name=Freshman">Freshman (大一新生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NICNotice">
                                <a href="board.php?name=NICNotice">NICNotice (网络信息中心)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Notice">
                                <a href="board.php?name=Notice">Notice (校园海报栏)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PostGraduate">
                                <a href="board.php?name=PostGraduate">PostGraduate (研究生之家)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Teachers">
                                <a href="board.php?name=Teachers">Teachers (教工)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TMSATWHU">
                                <a href="board.php?name=TMSATWHU">TMSATWHU (武大附中)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHDXL">
                                <a href="board.php?name=WHDXL">WHDXL (武汉大学图书馆)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUCelebration">
                                <a href="board.php?name=WHUCelebration">WHUCelebration (武大校庆)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUCentury">
                                <a href="board.php?name=WHUCentury">WHUCentury (皇皇吾大)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUConnection">
                                <a href="board.php?name=WHUConnection">WHUConnection (部门直通车)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUExpress">
                                <a href="board.php?name=WHUExpress">WHUExpress (武大特快)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUResource">
                                <a href="board.php?name=WHUResource">WHUResource (校园网络资源)</a></td>
                        </tr>
                    </table>

                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">Graduation (毕业之声)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="2014Graduate">
                                            <a href="board.php?name=2014Graduate">2014Graduate (2014届毕业生)</a></td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">WHUAssociations (协会社团组织)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">WHUDepartments (院系风采)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="B.A.S">
                                            <a href="board.php?name=B.A.S">B.A.S (土木建筑工程学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.C.S">
                                            <a href="board.php?name=C.C.S">C.C.S (城市设计学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.E">
                                            <a href="board.php?name=C.E">C.E (教育科学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.H">
                                            <a href="board.php?name=C.H">C.H (历史学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.L">
                                            <a href="board.php?name=C.L">C.L (文学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.L.S">
                                            <a href="board.php?name=C.L.S">C.L.S (生命科学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.M.S">
                                            <a href="board.php?name=C.M.S">C.M.S (化学与分子科学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.P.M.E">
                                            <a href="board.php?name=C.P.M.E">C.P.M.E (动力与机械学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.S">
                                            <a href="board.php?name=C.S">C.S (计算机学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="D.A">
                                            <a href="board.php?name=D.A">D.A (艺术学系)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="D.P.P">
                                            <a href="board.php?name=D.P.P">D.P.P (印刷与包装系)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.E.S">
                                            <a href="board.php?name=E.E.S">E.E.S (电气工程学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.I.S">
                                            <a href="board.php?name=E.I.S">E.I.S (电子信息学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.M.S">
                                            <a href="board.php?name=E.M.S">E.M.S (经济与管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="F.L.S">
                                            <a href="board.php?name=F.L.S">F.L.S (外国语言文学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.M.S">
                                            <a href="board.php?name=I.M.S">I.M.S (信息管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.P">
                                            <a href="board.php?name=I.P">I.P (哲学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.S.S">
                                            <a href="board.php?name=I.S.S">I.S.S (国际软件学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="L.S">
                                            <a href="board.php?name=L.S">L.S (法学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="LIESMARS">
                                            <a href="board.php?name=LIESMARS">LIESMARS (测绘遥感国家重点实验室)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="M.S">
                                            <a href="board.php?name=M.S">M.S (医学部)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="M.S.S">
                                            <a href="board.php?name=M.S.S">M.S.S (数学与统计学院版)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="NERCMS">
                                            <a href="board.php?name=NERCMS">NERCMS (国家多媒体软件工程中心)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="P.S">
                                            <a href="board.php?name=P.S">P.S (物理科学与技术学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="P.S.P.M">
                                            <a href="board.php?name=P.S.P.M">P.S.P.M (政治与公共管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="R.E.S">
                                            <a href="board.php?name=R.E.S">R.E.S (资源与环境科学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="R.S.I.S">
                                            <a href="board.php?name=R.S.I.S">R.S.I.S (遥感信息工程院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="S.G.G">
                                            <a href="board.php?name=S.G.G">S.G.G (测绘学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="S.J.C">
                                            <a href="board.php?name=S.J.C">S.J.C (新闻与传播学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="SKLSE">
                                            <a href="board.php?name=SKLSE">SKLSE (软件工程国家重点实验室)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="W.H.S">
                                            <a href="board.php?name=W.H.S">W.H.S (水利水电学院)</a></td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">乡情校谊</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Anhui">
                                <a href="board.php?name=Anhui">Anhui (淮风皖韵·安徽)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BaShu">
                                <a href="board.php?name=BaShu">BaShu (巴山蜀水·巴蜀)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Beijing">
                                <a href="board.php?name=Beijing">Beijing (皇城幽幽·北京)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Fujian">
                                <a href="board.php?name=Fujian">Fujian (闽海观潮·福建)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Gansu">
                                <a href="board.php?name=Gansu">Gansu (陇上人家·甘肃)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guangdong">
                                <a href="board.php?name=Guangdong">Guangdong (岭南大地·广东)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guangxi">
                                <a href="board.php?name=Guangxi">Guangxi (八桂大地·广西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guizhou">
                                <a href="board.php?name=Guizhou">Guizhou (黔山秀水·贵州)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hebei">
                                <a href="board.php?name=Hebei">Hebei (慷慨燕赵·河北)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Henan">
                                <a href="board.php?name=Henan">Henan (逐鹿中原·河南)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hubei">
                                <a href="board.php?name=Hubei">Hubei (荆风楚韵·湖北)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hunan">
                                <a href="board.php?name=Hunan">Hunan (三湘四水·湖南)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Jiangsu">
                                <a href="board.php?name=Jiangsu">Jiangsu (吴韵汉风·江苏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Jiangxi">
                                <a href="board.php?name=Jiangxi">Jiangxi (江南西道·江西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NorthEast">
                                <a href="board.php?name=NorthEast">NorthEast (白山黑水·东北)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shaanxi">
                                <a href="board.php?name=Shaanxi">Shaanxi (策马秦川·陕西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shandong">
                                <a href="board.php?name=Shandong">Shandong (齐鲁大地·山东)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shanghai">
                                <a href="board.php?name=Shanghai">Shanghai (风情沪上·上海)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Wuhan">
                                <a href="board.php?name=Wuhan">Wuhan (江城风情)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Zhejiang">
                                <a href="board.php?name=Zhejiang">Zhejiang (诗画之江·浙江)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">电脑网络</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ACM_ICPC">
                                <a href="board.php?name=ACM_ICPC">ACM_ICPC (国际大学生程序设计竞赛)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSDev">
                                <a href="board.php?name=BBSDev">BBSDev (BBS安装与维护)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="CPlusPlus">
                                <a href="board.php?name=CPlusPlus">CPlusPlus (C++程序设计)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Database">
                                <a href="board.php?name=Database">Database (数据库)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Digital">
                                <a href="board.php?name=Digital">Digital (数码时代)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Google">
                                <a href="board.php?name=Google">Google (Google Camp)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hardware">
                                <a href="board.php?name=Hardware">Hardware (硬件天地)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="IBM">
                                <a href="board.php?name=IBM">IBM (IBM俱乐部)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Internet">
                                <a href="board.php?name=Internet">Internet (万维世界)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Java">
                                <a href="board.php?name=Java">Java (爪哇)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Linux_Unix">
                                <a href="board.php?name=Linux_Unix">Linux_Unix (Linux &amp; Unix)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Microsoft">
                                <a href="board.php?name=Microsoft">Microsoft (微软俱乐部)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="OS">
                                <a href="board.php?name=OS">OS (操作系统)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Programm">
                                <a href="board.php?name=Programm">Programm (程序人生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Security">
                                <a href="board.php?name=Security">Security (系统安全)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Software">
                                <a href="board.php?name=Software">Software (软件快递)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TeX">
                                <a href="board.php?name=TeX">TeX (TeX 和 LaTeX)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Theory">
                                <a href="board.php?name=Theory">Theory (计算机理论)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">科学技术</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Biology">
                                <a href="board.php?name=Biology">Biology (生物)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chemistry">
                                <a href="board.php?name=Chemistry">Chemistry (化学)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Economics">
                                <a href="board.php?name=Economics">Economics (经济学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Electronics">
                                <a href="board.php?name=Electronics">Electronics (电子电机)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Environment">
                                <a href="board.php?name=Environment">Environment (环境科学)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Geography">
                                <a href="board.php?name=Geography">Geography (地理)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="History">
                                <a href="board.php?name=History">History (历史)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Law">
                                <a href="board.php?name=Law">Law (法律)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Math">
                                <a href="board.php?name=Math">Math (数学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NumComp">
                                <a href="board.php?name=NumComp">NumComp (数值计算)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Physics">
                                <a href="board.php?name=Physics">Physics (物理)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Science">
                                <a href="board.php?name=Science">Science (科学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Sex">
                                <a href="board.php?name=Sex">Sex (人之初)</a></td>
                            <td width="33%"></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">文学艺术</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ASCIIart">
                                <a href="board.php?name=ASCIIart">ASCIIart (ASCII艺术)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chorus">
                                <a href="board.php?name=Chorus">Chorus (合唱艺术)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Classics">
                                <a href="board.php?name=Classics">Classics (古典及爵士音乐)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Comic">
                                <a href="board.php?name=Comic">Comic (漫画*动画*童话)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Emprise">
                                <a href="board.php?name=Emprise">Emprise (武侠世界)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="English">
                                <a href="board.php?name=English">English (英语天地)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="French">
                                <a href="board.php?name=French">French (浪漫法兰西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="MyStage">
                                <a href="board.php?name=MyStage">MyStage (舞台人生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Novels">
                                <a href="board.php?name=Novels">Novels (小说)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Photography">
                                <a href="board.php?name=Photography">Photography (珞珈摄影)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Poetry">
                                <a href="board.php?name=Poetry">Poetry (诗词歌赋)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Reader">
                                <a href="board.php?name=Reader">Reader (读书)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="S.F.">
                                <a href="board.php?name=S.F.">S.F. (幻之天空)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="SanGuo">
                                <a href="board.php?name=SanGuo">SanGuo (青梅煮酒)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="StoneStory">
                                <a href="board.php?name=StoneStory">StoneStory (红楼梦)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Story">
                                <a href="board.php?name=Story">Story (珞珈原创)</a></td>
                            <td width="33%"></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">休闲娱乐</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Astrology">
                                <a href="board.php?name=Astrology">Astrology (星座)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Automobile">
                                <a href="board.php?name=Automobile">Automobile (车元素)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="dancing">
                                <a href="board.php?name=dancing">dancing (舞迷之家)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Debate">
                                <a href="board.php?name=Debate">Debate (唇舌烽火)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Family">
                                <a href="board.php?name=Family">Family (寸草春晖)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Fashion">
                                <a href="board.php?name=Fashion">Fashion (格调生活)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Feeling">
                                <a href="board.php?name=Feeling">Feeling (心情故事)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="food">
                                <a href="board.php?name=food">food (饮食文化)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="FreeTalk">
                                <a href="board.php?name=FreeTalk">FreeTalk (无事闲聊)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Game">
                                <a href="board.php?name=Game">Game (计算机游戏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Humor">
                                <a href="board.php?name=Humor">Humor (幽默)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="IDstory">
                                <a href="board.php?name=IDstory">IDstory (ID故事)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="KeepFit">
                                <a href="board.php?name=KeepFit">KeepFit (瘦身塑体)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="KingKiller">
                                <a href="board.php?name=KingKiller">KingKiller (杀人游戏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Love">
                                <a href="board.php?name=Love">Love (情谊两心知)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Movie">
                                <a href="board.php?name=Movie">Movie (电影)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Mud">
                                <a href="board.php?name=Mud">Mud (泥巴乐园)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Picture">
                                <a href="board.php?name=Picture">Picture (贴图版)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PieFriends">
                                <a href="board.php?name=PieFriends">PieFriends (缘分的天空)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PopMusic">
                                <a href="board.php?name=PopMusic">PopMusic (流行音乐)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Riddle">
                                <a href="board.php?name=Riddle">Riddle (谜语天地)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Rock">
                                <a href="board.php?name=Rock">Rock (摇滚乐)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="single">
                                <a href="board.php?name=single">single (光辉岁月)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Think">
                                <a href="board.php?name=Think">Think (我思故我在)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Travel">
                                <a href="board.php?name=Travel">Travel (海天游踪)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TV">
                                <a href="board.php?name=TV">TV (电视)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Youth">
                                <a href="board.php?name=Youth">Youth (青涩时代)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">体育健身</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Badminton">
                                <a href="board.php?name=Badminton">Badminton (羽毛球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="baseball">
                                <a href="board.php?name=baseball">baseball (棒球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Basketball">
                                <a href="board.php?name=Basketball">Basketball (篮球)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Bicycle">
                                <a href="board.php?name=Bicycle">Bicycle (一骑绝尘)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Bridge">
                                <a href="board.php?name=Bridge">Bridge (桥牌)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chess">
                                <a href="board.php?name=Chess">Chess (珞珈棋缘)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Football">
                                <a href="board.php?name=Football">Football (足球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="GO">
                                <a href="board.php?name=GO">GO (黑白纵横)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Olympic2008">
                                <a href="board.php?name=Olympic2008">Olympic2008 (北京奥运会)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Sports">
                                <a href="board.php?name=Sports">Sports (休闲体育)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Tabletennis">
                                <a href="board.php?name=Tabletennis">Tabletennis (乒乓球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Tennis">
                                <a href="board.php?name=Tennis">Tennis (网球)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Volleyball">
                                <a href="board.php?name=Volleyball">Volleyball (鲲鹏展翅)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Yoga">
                                <a href="board.php?name=Yoga">Yoga (瑜伽)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">社会信息</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Abroad">
                                <a href="board.php?name=Abroad">Abroad (出国·他乡寻梦)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ADagent_TG">
                                <a href="board.php?name=ADagent_TG">ADagent_TG (代理与团购)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="EnglishTest">
                                <a href="board.php?name=EnglishTest">EnglishTest (英语考试)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Graduate">
                                <a href="board.php?name=Graduate">Graduate (毕业生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="House">
                                <a href="board.php?name=House">House (房屋租赁)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Job">
                                <a href="board.php?name=Job">Job (工作)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="JobInfo">
                                <a href="board.php?name=JobInfo">JobInfo (工作信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="kaoyan">
                                <a href="board.php?name=kaoyan">kaoyan (考研信息港)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Medicine">
                                <a href="board.php?name=Medicine">Medicine (医疗保健)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Military">
                                <a href="board.php?name=Military">Military (军事天地)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="MyWallet">
                                <a href="board.php?name=MyWallet">MyWallet (投资理财)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="News">
                                <a href="board.php?name=News">News (新闻)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PartTimeJob">
                                <a href="board.php?name=PartTimeJob">PartTimeJob (兼职信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Search">
                                <a href="board.php?name=Search">Search (失物招领)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="secondhand">
                                <a href="board.php?name=secondhand">secondhand (二手货交易市场)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TrafficInfo">
                                <a href="board.php?name=TrafficInfo">TrafficInfo (交通信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHU">
                                <a href="board.php?name=WHU">WHU (珞珈论坛)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Wish">
                                <a href="board.php?name=Wish">Wish (生日·祝福)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p align="center">
            <input type="submit" value="保存到顶层收藏夹目录" class="btn-info" />
        </p>
    </form>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
