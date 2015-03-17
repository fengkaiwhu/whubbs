var Message = {
	set: function() { //最小化与恢复状态切换
		var set = this.minbtn.status == 1 ? [0, 1, 'block', this.char[0], '最小化'] : [1, 0, 'none', this.char[1], '展开'];
		this.minbtn.status = set [0];
		this.win.style.borderBottomWidth = set [1];
		this.content.style.display = set [2];
		this.minbtn.innerHTML = set [3]
		this.minbtn.title = set [4];
		this.win.style.top = this.getY().top;
	},
	close: function() { //关闭
		this.win.style.display = 'none';
		window.onscroll = null;
	},
	setOpacity: function(x) { //设置透明度
		var v = x >= 100 ? '' : 'Alpha(opacity=' + x + ')';
		this.win.style.visibility = x <= 0 ? 'hidden' : 'visible'; //IE有绝对或相对定位内容不随父透明度变化的bug
		this.win.style.filter = v;
		this.win.style.opacity = x / 100;
	}, 
	show: function() { //渐显
		clearInterval(this.timer2);
		var me = this,
			fx = this.fx(0, 100, 0.1),
			t = 0;
		this.timer2 = setInterval(function() {
			t = fx();
			me.setOpacity(t[0]);
			if (t[1] == 0) {
				clearInterval(me.timer2)
			}
		}, 10);
	}, 
	fx: function(a, b, c) { //缓冲计算
		var cMath = Math[(a - b) > 0 ? "floor" : "ceil"],
			c = c || 0.1;
		return function() {
			return [a += cMath((b - a) * c), a - b]
		}
	},
	getY: function() { //计算移动坐标
		var d = document,
			b = document.body,
			e = document.documentElement;
		var s = Math.max(b.scrollTop, e.scrollTop);
		var h = /BackCompat/i.test(document.compatMode) ? b.clientHeight : e.clientHeight;
		var h2 = this.win.offsetHeight;
		return {
			foot: s + h + h2 + 2 + 'px',
			top: s + h - h2 - 2 + 'px'
		}
	},
	moveTo: function(y) { //移动动画
		clearInterval(this.timer);
		var me = this,
			a = parseInt(this.win.style.top) || 0;
		var fx = this.fx(a, parseInt(y));
		var t = 0;
		this.timer = setInterval(function() {
			t = fx();
			me.win.style.top = t[0] + 'px';
			if (t[1] == 0) {
				clearInterval(me.timer);
				me.bind();
			} 
		}, 10);
	},
	bind: function() { //绑定窗口滚动条与大小变化事件
		var me = this,
			st, rt;
		window.onscroll = function() {
			clearTimeout(st);
			clearTimeout(me.timer2);
			me.setOpacity(0);
			st = setTimeout(function() {
				me.win.style.top = me.getY().top;
				me.show();
			}, 600);
		};
		window.onresize = function() {
			clearTimeout(rt);
			rt = setTimeout(function() {
				me.win.style.top = me.getY().top
			}, 100);
		}
	},
	init: function() { //创建HTML
		function $(id) {
			return document.getElementById(id)
		};
		this.win = $('msg_win');
		var set = {
			minbtn: 'msg_min',
			closebtn: 'msg_close',
			title: 'msg_title',
			content: 'msg_content'
		};
		for (var Id in set) {
			this[Id] = $(set [Id])
		};
		var me = this;
		this.minbtn.onclick = function() {
			me.set();
			this.blur()
		};
		this.closebtn.onclick = function() {
			me.close()
		};
		this.char = navigator.userAgent.toLowerCase().indexOf('firefox') + 1 ? ['_', '::', '×'] : ['0', '2', 'r']; //FF不支持webdings字体
		this.minbtn.innerHTML = this.char[0];
		this.closebtn.innerHTML = this.char[2];
		setTimeout(function() { //初始化最先位置
			me.win.style.display = 'block';
			me.win.style.top = me.getY().foot;
			me.moveTo(me.getY().top);
		}, 300);
		return this;
	}
};

var cssId = 'tc';  // you could encode the css path itself to generate id..
if (!document.getElementById(cssId))
{
    var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.id   = cssId;
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = 'tcstyle.css';
    link.media = 'all';
    head.appendChild(link);
}
var str = '<div id="msg_win"><div class="icos"><a id="msg_min" title="最小化" href="javascript:void 0">_</a><a id="msg_close" title="关闭" href="javascript:void 0">×</a></div>'
		+ '<div id="msg_title">通知</div><div id="msg_content">'
		+ '<div class="msg_item"><a href="/wForum/board.php?name=2014Graduate"><font color="blue">毕业啦！想知道哪些校友和你去向同一个地方吗？请关注 “2014届毕业生”版面各地去向贴</font></a></div>'
		+ '<div class="msg_item"><a href="/wForum/disparticle.php?boardName=2014Graduate&ID=148"><strong color="blue">珞珈山水BBS第一届“青春纪念册”毕业照征集评选活动</strong></a></div>'
		+ '<div class="msg_item"><a href="/wForum/disparticle.php?boardName=Notice&ID=6546&pos=1"><font color="red">校党委宣传部招聘学生摄影记者啦！有志于摄影事业的童鞋快来报名吧</font></a></div>'
		+ '<div class="msg_item"><a href="/wForum/disparticle.php?boardName=2014Graduate&ID=344&pos=3"><strong color="red">山水送你永恒的《站友证》，留下一影，此间的山水，此间的青春</strong></a></div>'
                            + '<div class="msg_item"><a href="/wForum/board.php?name=Football"><font color="red">世界杯每场比赛比分大预测，预测准确有奖！网友快来足球版参加哈！</font></a><img title="新消息" src="/wForum/pic/topnew2.gif"></div>'
		+ '</div></div>';
document.writeln(str);
Message.init(); 