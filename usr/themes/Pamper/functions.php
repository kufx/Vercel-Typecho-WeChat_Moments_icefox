<?php
require_once "core/feature.php";
require_once "core/factory.php";
require_once "core/Parsedown.php";
require_once "core/Config.php";
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('tagshelper', 'tagslist');
class tagshelper {
    public static function tagslist()
    {      
    $tag="";$taglist="";$i=0;//循环一次利用到两个位置
Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=200')->to($tags);
while ($tags->next()) {
$tag=$tag."'".$tags->name."',";
$taglist=$taglist."<a id=".$i." onclick=\"$(\'#tags\').tokenInput(\'add\', {id: \'".$tags->name."\', tags: \'".$tags->name."\'});\">".$tags->name."</a>";
$i++;
}
?><style>.Posthelper a{cursor: pointer; padding: 0px 6px; margin: 2px 0;display: inline-block;border-radius:var(--radius)!important;text-decoration: none;}
.Posthelper a:hover{background:var(--theme);color:var(--main);}.fullscreen #tab-files{right: 0;}/*解决全屏状态下鼠标放到附件上传按钮上导致的窗口抖动问题*/
</style>
<script>
  function chaall () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'\n!['+file+'](' + url + ')\n':''+html+'';
   }else{
   html = isImage ? html+'<img src="' + url + '" alt="' + file + '" />\n':''+html+'';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
 
    function chaquan () {
   var html='';
 $("#file-list li .insert").each(function(){
   var t = $(this), p = t.parents('li');
   var file=t.text();
   var url= p.data('url');
   var isImage= p.data('image');
   if ($("input[name='markdown']").val()==1) {
   html = isImage ? html+'':html+'\n['+file+'](' + url + ')\n';
   }else{
   html = isImage ? html+'':html+'<a href="' + url + '"/>' + file + '</a>\n';
   }
    });
   var textarea = $('#text');
   textarea.replaceSelection(html);return false;
    }
function filter_method(text, badword){
    //获取文本输入框中的内容
    var value = text;
    var res = '';
    //遍历敏感词数组
    for(var i=0; i<badword.length; i++){
        var reg = new RegExp(badword[i],"g");
        //判断内容中是否包括敏感词        
        if (value.indexOf(badword[i]) > -1) {
            $('#tags').tokenInput('add', {id: badword[i], tags: badword[i]});
        }
    }
    return;
}
var badwords = [<?php echo $tag; ?>];
function chatag(){
var textarea=$('#text').val();
filter_method(textarea, badwords); 
}
  $(document).ready(function(){
    $('#file-list').after('<div class="Posthelper"><a class="w-100" onclick=\"chaall()\" style="background: var(--main);background-color:var(--theme);text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有图片</a><a class="w-100" onclick=\"chaquan()\" style="background: var(--main);background-color: var(--theme);text-align: center; padding: 5px 0; color: #fbfbfb; box-shadow: 0 1px 5px #ddd;">插入所有非图片附件</a></div>');
    $('#tags').after('<div style="margin-top: 35px;" class="Posthelper"><ul style="border-radius: var(--radius)!important;list-style: none;min-height:100px;padding: 6px 12px; max-height: 240px;overflow: auto;background-color: var(--theme);margin-bottom: 0;"><?php echo $taglist; ?></ul><a class="w-100" onclick=\"chatag()\" style="background: var(--main);background-color:var(--theme);text-align: center; padding: 5px 0; color: #fbfbfb;">检测内容插入标签</a></div>');
  }); 
  </script>
<?php
    }
}
/* 初始化主题 */
function themeInit(Widget_Archive $archive)
{
  //评论回复楼层最高999层.这个正常设置最高只有7层
  Helper::options()->commentsMaxNestingLevels = 999;
  //强制评论关闭反垃圾保护
  Helper::options()->commentsAntiSpam = false;
  //将最新的评论展示在前
  Helper::options()->commentsOrder = 'DESC';
  //关闭检查评论来源URL与文章链接是否一致判断
  Helper::options()->commentsCheckReferer = false;
  // 强制开启评论markdown
  Helper::options()->commentsMarkdown = '1';
  Helper::options()->commentsHTMLTagAllowed .= '<img class src alt><div class>';
  //评论显示列表
  Helper::options()->commentsListSize = 5;
}
  
/* 获取资源路径 */
function _getAssets($assets, $type = true)
{
  $assetsURL = "";
  // 是否本地化资源
  if (Helper::options()->AssetsURL) {
    $assetsURL = Helper::options()->AssetsURL . '/' . $assets;
  } else {
    $assetsURL = Helper::options()->themeUrl . '/' . $assets;
  }
  if ($type) echo $assetsURL;
  else return  $assetsURL;
}
// 文章缩略图
function _getThumbnails($item)
{
  $result = [];
  $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|jpeg|gif|png|webp))/i';
  $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|jpeg|gif|png|webp))/i';
  /* 如果填写了自定义缩略图，则优先显示填写的缩略图 */
  if ($item->fields->thumb) {
    $fields_thumb_arr = explode("\r\n", $item->fields->thumb);
    foreach ($fields_thumb_arr as $list) $result[] = $list;
  }
  /* 如果匹配到正则，则继续补充匹配到的图片 */
  if (preg_match_all($pattern, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  if (preg_match_all($patternMD, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  if (preg_match_all($patternMDfoot, $item->content, $thumbUrl)) {
    foreach ($thumbUrl[1] as $list) $result[] = $list;
  }
  /* 如果上面的数量不足3个，则直接补充3个随即图进去 */
  if (sizeof($result) < 4) {
    $custom_thumbnail = Helper::options()->Thumbnail;
    /* 将for循环放里面，减少一次if判断 */
    if ($custom_thumbnail) {
      $custom_thumbnail_arr = explode("\r\n", $custom_thumbnail);
      for ($i = 0; $i < 4; $i++) {
        $result[] = $custom_thumbnail_arr[array_rand($custom_thumbnail_arr, 1)] . "?key=" . mt_rand(0, 1000000);
      }
    } else {
      for ($i = 0; $i < 4; $i++) {
        $result[] = _getAssets('assets/Thumb/' . rand(1, 15) . '.jpg', false);
      }
    }
  }
  return $result;
}
/*人性化时间*/
function human_time_diff($from, $to = '') {
    if (empty($to)) {
        $to = time();
    }
    $diff = abs($to - $from);
    $day_diff = floor($diff / 86400);
    if ($day_diff >= 1) {
        if ($day_diff == 1) {
            return '昨天';
        }
        return ' ' . $day_diff . ' 天前';
    }
    $hour_diff = floor(($diff - $day_diff * 86400) / 3600);
    if ($hour_diff >= 1) {
        if ($hour_diff == 1) {
            return ' 1 小时前';
        }
        return ' ' . $hour_diff . ' 小时前';
    }
    $minute_diff = floor(($diff - $day_diff * 86400 - $hour_diff * 3600) / 60);
    if ($minute_diff >= 1) {
        if ($minute_diff == 1) {
            return ' 1 分钟前';
        }
        return ' ' . $minute_diff . ' 分钟前';
    }
    return ' 刚刚';
}
/**
 * 处理字符串超长问题
 */
function subText($text, $maxlen)
{
    if (mb_strlen($text) > $maxlen) {
        echo mb_substr($text, 0, $maxlen) . '...';
    } else {
        echo $text;
    }
}
/* 获取文章摘要 */
function _getAbstract($item, $num)
{
	$abstract = "";
	if ($item->password) {
		$abstract = "⚠️此文章已加密";
	} else {
		if ($item->fields->post_abstract) {
			$abstract = $item->fields->post_abstract;
		} else {
			$abstract = strip_tags($item->excerpt);
			$abstract = preg_replace('/\-o\-/', '', $abstract);
            $abstract = preg_replace('/{[^{]+}/', '', $abstract);
		}
	}
	if ($abstract === '') $abstract = "此文章暂无简介";
	return mb_substr($abstract, 0, $num);
}
/* 通过邮箱生成头像地址 
  <?php _getAvatarByMail($this->author->mail) ?>
  <?php _getAvatarByMail($comments->mail) ?>
*/
function _getAvatarByMail($mail)
{
  $gravatarsUrl = Helper::options()->CustomAvatarSource ? Helper::options()->CustomAvatarSource : 'https://gravatar.helingqi.com/wavatar/';
  $mailLower = strtolower($mail);
  $md5MailLower = md5($mailLower);
  $qqMail = str_replace('@qq.com', '', $mailLower);
  if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
    echo 'https://thirdqq.qlogo.cn/g?b=qq&nk=' . $qqMail . '&s=100';
  } else {
    echo $gravatarsUrl . $md5MailLower . '?d=mm';
  }
};
function get_comment_at($coid)
{//评论@函数
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ?', $coid));
    $parent = $prow['parent'];
    if (!empty($parent)) {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
if(!empty($arow['author'])){ $author = $arow['author'];
        $href   = '<a style="color:var(--c-red-500); " class="text-xs px-1 bg-tertiaryA text-gray rounded " href="#comment-' . $parent . '">@' . $author . '</a> ';
        return $href;
}else { return '';}
    } else {
        return '';
    }
}
/**
 * 判断当前是菜单否激活
 * @param $self
 * @return string
 */
function isActiveMenu($self, $slug) : string {
    $activeMenuClass = " active ";
    // 检查当前页面是否是分类页面且slug匹配
    if ($self->is("category") && $self->getArchiveSlug() === $slug) {
        return $activeMenuClass;
    }
    // 检查当前页面是否是文章页面且文章属于给定的分类slug
    if ($self->is("post") && in_array($slug, array_column($self->categories, "slug"))) {
        return $activeMenuClass;
    }
    // 如果都不是，‌返回空字符串
    return "";
}
/* 查询文章浏览量 */
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')->page(1,1)))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

/* 增加自定义字段 */
function themeFields($layout)
{
  $keywords = new Typecho_Widget_Helper_Form_Element_Text(
    'keywords',
    NULL,
    NULL,
    'SEO关键词（非常重要！）',
    '介绍：用于设置当前页SEO关键词 <br />
         注意：多个关键词使用英文逗号进行隔开 <br />
         例如：Typecho,Typecho主题,Typecho模板 <br />
         其他：如果不填写此项，则默认取文章标签'
  );
  $layout->addItem($keywords);

  $description = new Typecho_Widget_Helper_Form_Element_Textarea(
    'description',
    NULL,
    NULL,
    'SEO描述语（非常重要！）',
    '介绍：用于设置当前页SEO描述语 <br />
         注意：SEO描述语不应当过长也不应当过少 <br />
         其他：如果不填写此项，则默认截取文章片段'
  );
  $layout->addItem($description);
}
