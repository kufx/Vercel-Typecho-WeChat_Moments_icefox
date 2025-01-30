<?php
/**
 * 
 * 单栏手绘风格主题
 * 
 * <div class="PamperStyle"><a style="width:fit-content" id="Pamper">版本检测中..</div>&nbsp;</div><style>.PamperStyle{margin-top: 5px;}.PamperStyle a{background:#ea605e;padding: 5px;color: #fff;}</style>

 * <script>var simversion="2.0.3";function update_detec(){var container=document.getElementById("Pamper");if(!container){return}var ajax=new XMLHttpRequest();container.style.display="block";ajax.open("get","https://api.github.com/repos/LWingYan/Pamper/releases/latest");ajax.send();ajax.onreadystatechange=function(){if(ajax.readyState===4&&ajax.status===200){var obj=JSON.parse(ajax.responseText);var newest=obj.tag_name;if(newest>simversion){container.innerHTML="发现新主题版本："+obj.name+''+"<br>您目前版本:"+String(simversion)+"。"+'<a target="_blank" href="'+obj.html_url+'">👉查看新版亮点</a>'}else{container.innerHTML="您目前使用的是最新版"}}}};update_detec();</script>
 * 
 * @package Pamper
 * @author 林厌
 * @version 2.0.2
 * @link //ouyu.me
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
        
        <section class="mt-8">
            
            <!--<div class="gap-8 grid-cols-2 grid " style="padding: 2rem 0.5rem;">-->
            
            <!--            $randomIndex = array_rand($bg_color);-->
            <!--            $alignIndex = array_rand($align);-->
            <!--            $randomClass = $bg_color[$randomIndex];-->
            <!--            $alignClass = $align[$alignIndex];-->
            <!--           ?>-->
            <!--            <article class="card transition rotate-3deg <?php echo $randomClass;?>">-->
            <!--                <div class="card-inner flex flex-col border-solid border-2 border-black rounded-2xl p-2 bg-white night:bg-white relative">-->
            <!--                    <span class="card-pin"></span>-->
            <!--                    <div class="rounded-2xl relative hidden " style="aspect-ratio:4/3;">-->
            <!--                        <img src="<?php $this->options->作者头像() ?>" class="absolute w-full top-1/2 left-1/2 translate-50%">-->
            <!--                    </div>-->
            <!--                    <div>-->
            <!--                        <div class="flex items-center justify-between p-2" style="padding-top:0.75rem;">-->
            <!--                            <span class="text-xs font-medium text-gray-500"><?php echo human_time_diff($this ->created);?></span>-->
            <!--                            <button class="flex items-center border bg-transparent " style="padding:0;line-height:0;"><i class="ri-link text-base p-1 rounded-full bg-black text-white" style="width:35px;height:35px;"></i></button>-->
            <!--                        </div>-->
            <!--                        <a href="<?php $this->permalink();?>">-->
            <!--                            <h2 class="night:text-gray-100 text-base font-semibold" style="margin-top:0.25rem;padding-bottom:0.5rem;"><?php subText($this->title, 10);?></h2>-->
            <!--                        </a>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </article>-->
            <!--        </div>-->
            
            <!-- 开始循环遍历最近文章 -->
            <?php if ($this->have()):?>
            <?php if ($this->options->首页样式 === 'one') : ?>
                <article class="grid gap-2 grid-cols-2 md:grid-cols-1 my-2" style="padding-bottom:10px;">
                <?php while ($this->next()):?>
                    <?php
                    // 背景颜色数组
                    $card_bg = [];
                    $bg_color = [
                        'bg1',
                        'bg2',
                        'bg3',
                        'bg4',
                        'bg5',
                    ];
                    // 随机选择背景颜色和对齐方式
                    $randomIndex = array_rand($bg_color);
                    $randomClass = $bg_color[$randomIndex];
                   ?>
                    
                        <div class="mt-8 transition w-full <?php echo $randomClass;?> ">
                            <div class="transition rounded-2xl relative card-inner_one p-4 border-2 border-solid bg-white night:bg-white ">
                            <div class="flex gap-2">
                                <img src="<?php $this->options->作者头像() ?>" class="md:none hidden relative rounded-2xl" width="60px" height="60px" style="flex-shrink:0;">
                                    
                                <div class="flex flex-col w-full items-center">
                                        <div class="w-full flex items-center justify-between" style="margin-top:0;margin-left:0.5rem;">
                                            <a href="<?php $this->permalink()?>">
                                                <h2 class="text-base font-semibold" style="margin-top:0.25rem;padding-bottom:0.5rem;"><?php subText($this->title, 15)?></h2>
                                            </a>
                                            <button class="flex items-center border bg-transparent " style="padding:0;line-height:0;"><i class="ri-link text-base p-1 rounded-full bg-black text-white" style="width:35px;height:35px;"></i></button>
                                        </div>
                                        <div class="w-full flex gap-2 ">
                                            <time class="text-xs font-medium night:text-gray-300 text-gray-500"><?php echo human_time_diff($this->created);?></time>
                                            <span class="text-xs font-medium night:text-gray-300 text-gray-500" ><?php $this->category(','); ?></span>
                                            <span class="text-xs font-medium night:text-gray-300 text-gray-500"><?php get_post_view($this) ?>°</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="info relative">
                                <center class="absolute w-full" style="bottom:5px;">
                                    <?php echo _getAbstract($this,12);?>...
                                </center>
                                
                            </div>
                        </div>
                        </div>
                    
                <?php endwhile;?>
                </article>
                
                <?php elseif ($this->options->首页样式 === 'two') : ?>
                
                <?php while ($this->next()):?>
                    <?php
                    // 背景颜色数组
                    $card_bg = [];
                    $bg_color = [
                        'bg1',
                        'bg2',
                        'bg3',
                        'bg4',
                        'bg5',
                    ];
                    // 对齐方式数组
                    $align = [
                        'left',
                        'right',
                    ];
                    // 随机选择背景颜色和对齐方式
                    $randomIndex = array_rand($bg_color);
                    $alignIndex = array_rand($align);
                    $randomClass = $bg_color[$randomIndex];
                    $alignClass = $align[$alignIndex];
                   ?>
                    <article class="my-2 card transition w-full rotate--3deg <?php echo $randomClass;?> <?php echo $alignClass;?>" style="padding: 2rem 1.8rem;">
                            <div class="transition card-inner p-4 items-center flex-row border-solid border-2 border-black rounded-2xl relative bg-white night:bg-white">
                                <span class="card-pin simple bg-gray-900 absolute z-1 " style="width:12px;height:12px;"></span>
                                <div class="flex gap-2">
                                    <img src="<?php $this->options->作者头像() ?>" class="md:none hidden relative rounded-2xl" width="60px" height="60px" style="flex-shrink:0;">
                                    
                                    <div class="flex flex-col w-full items-center">
                                        <div class="w-full flex items-center justify-between" style="margin-top:0;margin-left:0.5rem;">
                                            <a href="<?php $this->permalink()?>">
                                                <h2 class="text-base font-semibold" style="margin-top:0.25rem;padding-bottom:0.5rem;"><?php subText($this->title, 15)?></h2>
                                            </a>
                                            <button class="flex items-center border bg-transparent " style="padding:0;line-height:0;"><i class="ri-link text-base p-1 rounded-full bg-black text-white" style="width:35px;height:35px;"></i></button>
                                        </div>
                                        <div class="w-full flex items-center justify-between">
                                            <p><?php echo _getAbstract($this,20);?></p>
                                            <time class="text-xs font-medium text-gray-500"><?php echo human_time_diff($this->created);?></time>
                                        </div>
                                    </div>
                                </div>
                                <span class="card-pin simple bg-gray-900 absolute z-1"></span>
                            </div>
                        </article>
                    <?php endwhile;?>
                <?php elseif ($this->options->首页样式 === 'three') : ?>
                    <?php while ($this->next()):?>
                    <?php
                    // 背景颜色数组
                    $card_bg = [];
                    $bg_color = [
                        'bg1',
                        'bg2',
                        'bg3',
                        'bg4',
                        'bg5',
                    ];
                    // 对齐方式数组
                    $align = [
                        'left',
                        'right',
                    ];
                    // 随机选择背景颜色和对齐方式
                    $randomIndex = array_rand($bg_color);
                    $alignIndex = array_rand($align);
                    $randomClass = $bg_color[$randomIndex];
                    $alignClass = $align[$alignIndex];
                   ?>
                        <article class="my-4 card transition w-full <?php echo $randomClass;?> <?php echo $alignClass;?>">
                            <div class="three-card rounded-2xl hidden relative">
                                <img src="<?php echo _getThumbnails($this)[0] ?>" class=""  width="100%" height="100%">
                                <div class="absolute top bottom right left justify-content flex items-center">
                                    <a href="<?php $this->permalink();?>">
                                        <h2 class="links night:text-gray-100 text-base font-semibold" style="margin-top:0.25rem;padding-bottom:0.5rem;">阅读</h2>
                                </div>
                                <div class="absolute bottom right left flex" style="left:.5em;">
                                    <h6 class="night:text-gray-100 text-base font-semibold ell"><?php subText($this->title, 6);?></h6>
                                </div>
                            </div>
                        </article>
                   <?php endwhile;?>
                <?php endif;?>
                    
            
                
            <?php else:?>
                <center class="text-xl night:text-gray-100">
                    <p>你在搞什么？跟我回去！</p>
                    <div class="my-7">
                        <a href="<?php $this->options->siteUrl(); ?>">
                            <button class="bg-transparent p-4 transition night:text-gray-100 border-2 border-solid" style="border-radius: 255px 15px 225px 15px/15px 225px 15px 255px;box-shadow: 2px 8px 4px -6px rgba(0, 0, 0, 0.3);width:180px;">
                                首页
                            </button>
                        </a>
                    </div>
                </center>
            <?php endif;?>
        </section>
    
        <section class="mt-8 flex relative page_next justify-content" style="height:50px;" >
            <?php $this->pageLink('<i class="ri-arrow-right-wide-line"></i>','next'); ?>
            <?php $this->pageLink('<i class="ri-arrow-left-wide-line"></i>'); ?>
        </section>
    </main>

<?php $this->need('footer.php'); ?>




