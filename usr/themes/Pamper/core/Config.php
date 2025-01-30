<?php
$GLOBALS['config'] = require_once "config.inc.php";
function CheckSetBack() {
		$db = Typecho_Db::get();
		$res = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $GLOBALS['config']['theme'] . 'bf'));
		if ($res) {
			return '<span style="color: #1462ff">模板已备份</span>';
		} else {
			return '<span style="color: red">未备份任何数据</span>';
		}
}
class EchoHtml extends Typecho_Widget_Helper_Layout {
	public function __construct($html) {
		$this->html($html);
		$this->start();
		$this->end();
	}
	public function start() {
	}
	public function end() {
	}
}
//主题静态资源的绝对地址
function themeConfig($form)
{
    ?>
    <link rel="stylesheet" href="<?php _getAssets('assets/typecho/config.css'); ?>">
    <script src="<?php _getAssets('assets/typecho/config.js'); ?>"></script>
    <?php 
    //侧边导航
    $form->addItem(new EchoHtml('<div class="flex allTab md:none"><div class="tab sticky md:sticky h-fit top-0">'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">关于主题</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">基础设置</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">首页设置</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">底部设置</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">开发设置</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">邮箱设置</div>'));
        $form->addItem(new EchoHtml('<div class="before:border-b my-15 word-keep w-f fz-15 align-left tabLinks relative">更多设置</div>'));
        $form->addItem(new EchoHtml('</div>'));
        // 关于主题
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
            $form->addItem(new EchoHtml('<img src="https://jsd.onmicrosoft.cn/gh/LWingYan/photos@latest/usr/uploads/2024/10/3927925836.png" height="350px" width="100%" style="object-fit:none;">'));
            $form->addItem(new EchoHtml('<h2 style="color:red;">更新</h2><ul><li>新增首页样式</li><li>前台友链自助申请</li></ul>'));
            $form->addItem(new EchoHtml('<h2 style="color:red;">提示</h2><ul><li>第三种样式支持缩略图，在没有图的情况下自动获取文件assets/Thumb里的图，这里前提是必须文件夹里图，默认是没有图片的，需要自己存图片进去，1到15张。格式为jpg。为png或其他的自动忽略。</li><li>前台友链自助申请不推荐使用，难免会有人恶意填写广告，没有添加广告判断，目前的技术还不支持我修改插件功能。所以在后台添加了一个是否使用的选择。当然，如果你觉得你可以接受的话另当别论。前台申请之后会在后台管理友情链接页显示，管理员只需要修改友链状态启用和禁用就可。前台申请的友链默认为禁用状态。插件请使用主题打包的插件，其他插件不行。之前的插件也不行。必须换新的。🙅‍♀️</li></ul>'));
        $form->addItem(new EchoHtml('</div>'));
        //基础设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
        
            //站标设置
            $Favicon = new Typecho_Widget_Helper_Form_Element_Text('Favicon', NULL, NULL, _t('博客ICO'), _t('请输入博客ICO地址'));
            $form->addInput($Favicon);
            
            //作者头像
            $作者头像 = new Typecho_Widget_Helper_Form_Element_Text('作者头像', NULL, 'https://q1.qlogo.cn/g?b=qq&nk=160860446&s=100', _t('自定义作者头像链接'), _t('填写作者头像链接'));
            $form->addInput($作者头像);
            
            //静态资源
            $AssetsURL = new Typecho_Widget_Helper_Form_Element_Text(
                'AssetsURL',
                NULL,
                NULL,
                '自定义静态资源CDN地址（非必填）',
                '介绍：自定义静态资源CDN地址，不填则走本地资源 <br />
                 教程：<br />
                 1. 将整个assets目录上传至你的CDN <br />
                 2. 填写静态资源地址访问的前缀 <br />
                 3. 例如：https://npm.elemecdn.com/typecho'
            );
            $form->addInput($AssetsURL);
  
            // 自定义头像源
            $CustomAvatarSource = new Typecho_Widget_Helper_Form_Element_Text(
            'CustomAvatarSource',
            NULL,
            NULL,
            '自定义头像源（非必填）',
            '介绍：用于修改全站头像源地址 <br>
                 例如：https://gravatar.ihuan.me/avatar/ <br>
                 其他：非必填，默认头像源为https://gravatar.helingqi.com/wavatar/ <br>
                 注意：填写时，务必保证最后有一个/字符，否则不起作用！'
          );
          $form->addInput($CustomAvatarSource);
  
        $form->addItem(new EchoHtml('</div>'));
    
        //首页设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
        
            $首页样式 = new Typecho_Widget_Helper_Form_Element_Select('首页样式', array('one' => '样式一（默认）', 'two' => '样式二' , 'three' => '样式三'), 'one', '首页文章样式', '介绍：切换首页文章列表样式');
            $form->addInput($首页样式->multiMode());
            
        $form->addItem(new EchoHtml('</div>'));
        
        //底部设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
        
            // 增加底部内容
            $Footer = new  Typecho_Widget_Helper_Form_Element_Textarea('Footer', NULL, NULL, _t('自定义增加底部内容（非必填）'), _t('可以添加备案或者统计代码等可以使用HTML来实现！！！'));
            $form->addInput($Footer);
            
        $form->addItem(new EchoHtml('</div>'));
        
        // 开发设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
        
            // 自定义CSS
            $CustomCSS = new  Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义CSS（非必填）'), _t('请填写自定义CSS内容，填写时无需填写style标签！！！'));
            $form->addInput($CustomCSS);
            
            // 增加css链接
            $CustomHeadEnd = new  Typecho_Widget_Helper_Form_Element_Textarea('CustomHeadEnd', NULL, NULL, _t('自定义增加&lt;head&gt;&lt;/head&gt;里内容（非必填）'), _t('此处用于在&lt;head&gt;&lt;/head&gt;标签里增加自定义内容！！！'));
            $form->addInput($CustomHeadEnd);
            
            // 自定义js
            $CustomScript = new Typecho_Widget_Helper_Form_Element_Textarea(
            'CustomScript',
            NULL,
            NULL,
            '自定义JS（非必填）',
            '介绍：请填写自定义JS内容，例如网站统计等，填写时无需填写script标签。'
          );
          $form->addInput($CustomScript);
 
            // 增加js链接
            $CustomBodyEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
            'CustomBodyEnd',
            NULL,
            NULL,
            '自定义&lt;body&gt;&lt;/body&gt;末尾位置内容（非必填）',
            '介绍：此处用于填写在&lt;body&gt;&lt;/body&gt;标签末尾位置的内容 <br>
                 例如：可以填写引入第三方js脚本等等'
          );
          $form->addInput($CustomBodyEnd);
            
        $form->addItem(new EchoHtml('</div>'));
        
        // 邮箱设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
            // 邮件通知
            $JCommentMail = new Typecho_Widget_Helper_Form_Element_Select('JCommentMail', array('off' => '关闭（默认）', 'on' => '开启'), 'off', '是否开启评论邮件通知', '介绍：开启后评论内容将会进行邮箱通知 <br />
                 注意：此项需要您完整无错的填写下方的邮箱设置！！ <br />
                 其他：下方例子以QQ邮箱为例，推荐使用QQ邮箱');
            $form->addInput($JCommentMail->multiMode());
            // 邮箱服务器地址
            $JCommentMailHost = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailHost', NULL, NULL, '邮箱服务器地址', '例如：smtp.qq.com');
            $form->addInput($JCommentMailHost->multiMode());
            $JCommentSMTPSecure = new Typecho_Widget_Helper_Form_Element_Select('JCommentSMTPSecure', array('ssl' => 'ssl（默认）', 'tsl' => 'tsl'), 'ssl', '加密方式', '介绍：用于选择登录鉴权加密方式');
            $form->addInput($JCommentSMTPSecure->multiMode());
            $JCommentMailPort = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailPort', NULL, NULL, '邮箱服务器端口号', '例如：465');
            $form->addInput($JCommentMailPort->multiMode());
            $JCommentMailFromName = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailFromName', NULL, NULL, '发件人昵称', '例如：帅气的象拔蚌');
            $form->addInput($JCommentMailFromName->multiMode());
            $JCommentMailAccount = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailAccount', NULL, NULL, '发件人邮箱', '例如：2323333339@qq.com');
            $form->addInput($JCommentMailAccount->multiMode());
            $JCommentMailPassword = new Typecho_Widget_Helper_Form_Element_Text('JCommentMailPassword', NULL, NULL, '邮箱授权码', '介绍：这里填写的是邮箱生成的授权码 <br>
                 获取方式（以QQ邮箱为例）：<br>
                 QQ邮箱 > 设置 > 账户 > IMAP/SMTP服务 > 开启 <br>
                 其他：这个可以百度一下开启教程，有图文教程');
            $form->addInput($JCommentMailPassword->multiMode());
            
        $form->addItem(new EchoHtml('</div>'));
        // 更多设置
        $form->addItem(new EchoHtml('<div class="none h-auto tabContent w-f px-30">'));
            // 字体设置
            $CustomFont = new Typecho_Widget_Helper_Form_Element_Text('CustomFont', NULL, NULL, _t('自定义网站字体（非必填）'), _t('字体URL链接（推荐使用woff格式的字体，网页专用字体格式），字体文件一般有几兆，建议使用cdn链接！！！'));
            $form->addInput($CustomFont);
            
            $form->addItem(new EchoHtml('<h3>音乐设置</h3>'));
            
            // 音乐
            $id = new Typecho_Widget_Helper_Form_Element_Text('id', NULL, '2856131956', _t('网易云歌单ID'));
            $form->addInput($id);
            
            $form->addItem(new EchoHtml('<h3>自助申请</h3>'));
            
            $Page_friend = new Typecho_Widget_Helper_Form_Element_Select(
            'Page_friend',
            array(
              '启动' => '启动',
              '关闭' => '关闭（默认）'
            ),
            '关闭',
            '友链',
            '介绍：是否启动友链页面自助申请'
            );
            $form->addInput($Page_friend);
            
        $form->addItem(new EchoHtml('</div>'));
        
        
        
    //结束
    $form->addItem(new EchoHtml('</div>'));
    
}