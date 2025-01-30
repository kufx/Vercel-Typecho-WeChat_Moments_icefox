<?php
/**
 * 
 * 链接 🔗
 * 
 * @package custom
 * 
 * @author  林孽
 * 
 * @time 2024.10.19
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main>
    <section>
        <h1 class="font-bold night:text-gray-100">
        <?php $this->options->title();?>
        </h1>
        <p style="margin-top:0.375em;" class="text-base text-gray-500"> 
        <?php $this->options->description() ;?>
        </p>
    </section>
    <section class="relative transition z-1">
        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <div class="search-inner h-16 flex items-center border-solid border-2 border-black rounded-2xl mt-8 relative w-full text-base bg-white night:bg-white transition">
                    <center class="absolute w-full o-0 text-xs text-gray-500" style="top:-25px;">宁可少字也不愿有错字</center>
                    <button type="submit" class="h-full bg-gray-100 w-20 transition border border-right-style searchA p-1 flex justify-content items-center" style="border-radius:15px 0 0 15px;"><?php _e('<i class="ri-search-line text-xl "></i>'); ?></button>
                    <input type="text" id="s" name="s" class="p-1 text bg-white night:bg-white px-4 w-full h-full border" style="border-radius:0 15px 15px 0;" placeholder="<?php _e('输入关键字搜索'); ?>" />
                </div>
            </form>
    </section>
    <nav id="nav-menu" class="mt-8 flex flex-col gap-2 " style="padding-bottom:0.75rem;">
        <div class="flex gap-2 p-1 overflow">
            <a style="padding: 0 0.5rem;" class="no-wrap text-base relative z-1 night:text-gray-100 <?php if($this->is('index')): ?> font-bold active <?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <a style="padding: 0 0.5rem;" class="no-wrap text-base relative z-1 night:text-gray-100 <?php if($this->is('page', $pages->slug)): ?> font-bold active <?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>
        </div>
        <span class="relative" style="display:inline;"></span>
    </nav>
    <section class="mt-8 post_article">
        <?php
                    // 背景颜色数组
                    $card_bg = [];
                    $bg_color = [
                        'border-bottom-left-radius: 15px 255px;
    border-bottom-right-radius: 225px 15px;
    border-top-left-radius: 255px 15px;
    border-top-right-radius: 15px 225px;',
                        'border-bottom-left-radius: 185px 25px;
    border-bottom-right-radius: 20px 205px;
    border-top-left-radius: 125px 25px;
    border-top-right-radius: 10px 205px;',
                        'border-bottom-left-radius: 225px 15px;
    border-bottom-right-radius: 15px 255px;
    border-top-left-radius: 15px 225px;
    border-top-right-radius: 255px 15px;',
                        'border-bottom-left-radius: 25px 115px;
    border-bottom-right-radius: 155px 25px;
    border-top-left-radius: 15px 225px;
    border-top-right-radius: 25px 150px;',
                        'border-bottom-left-radius: 20px 115px;
    border-bottom-right-radius: 15px 105px;
    border-top-left-radius: 250px 15px;
    border-top-right-radius: 25px 80px;',
                        'border-bottom-left-radius: 15px 225px;
    border-bottom-right-radius: 20px 205px;
    border-top-left-radius: 28px 125px;
    border-top-right-radius: 100px 30px;',
                        'border-bottom-left-radius: 15px 255px;
    border-bottom-right-radius: 225px 15px;
    border-top-left-radius: 255px 15px;
    border-top-right-radius: 15px 225px;',
                        'border-bottom-left-radius: 185px 25px;
    border-bottom-right-radius: 20px 205px;
    border-top-left-radius: 125px 25px;
    border-top-right-radius: 10px 205px;',
                        '    border-bottom-left-radius: 225px 15px;
    border-bottom-right-radius: 15px 255px;
    border-top-left-radius: 15px 225px;
    border-top-right-radius: 255px 15px;',
                        'border-bottom-left-radius: 25px 115px;
    border-bottom-right-radius: 155px 25px;
    border-top-left-radius: 15px 225px;
    border-top-right-radius: 25px 150px;',
    
                    ];
                    // 随机选择背景颜色和对齐方式
                    $randomIndex = array_rand($bg_color);
                    $randomClass = $bg_color[$randomIndex];
                   ?>
            
                <article class="my-4 card transition w-full rotate--3deg " style="">
                    <div class="page-links shadow-lg p-4 border-solid border-2 border-black rounded-2xl relative bg-white night:bg-white" style="<?php echo $randomClass;?>">
                        <div class="post-content post-links">
                            <?php article_changetext($this, $this->user->hasLogin()) ?>
                        </div>
                        <div class="Page_friend">
                            <?php if ($this->options->Page_friend== "启动") : ?>
                            <div class="xm_link" role="form">
                                <form action="/link_xm" method="post" class="flex gap-2 flex-col">
                                    <label for="name">网站名称:</label>
                                    <input type="text" id="name" name="name" required>
                            
                                    <label for="url">网站地址:</label>
                                    <input type="url" id="url" name="url" required>
                                    
                                    <label for="email">友链邮箱:</label>
                                    <input type="email" id="email" name="email" required>
                                    
                                    <label for="image">友链图片:</label>
                                    <input type="text" id="image" name="image" required>
                            
                                    <label for="description">网站描述:</label>
                                    <textarea id="description" name="description"></textarea>
                                    
                                    <button type="submit">
                                        <span>提交友链</span>
                                    </button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <div class="column md:column">
                <?php
                            $mypattern = <<<eof
                            
                            <article class="my-4 card transition w-full rotate--3deg " style="">
                    <div class="page-links shadow-lg p-4 border-solid border-2 border-black rounded-2xl relative bg-white night:bg-white" style="<?php echo $randomClass;?>">
                        <div class="post-links">
                            <div class="flex gap-2 items-center">
                                <img src="{image}" class="roundedaA border-2 border-solid" width="40px" height="40px">
                                <a href="{url}" target="_blank" >
                                    <div class="link_body_name">{name}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                            
                            
eof;
                            Links_Plugin::output($mypattern, 0, "");
                            ?>
                            
                
                
            </div>
        
    </section>
    <section class="mt-8 ">
        <?php $this->need('comments.php'); ?>
    </section>
</main>

<?php $this->need('footer.php'); ?>




