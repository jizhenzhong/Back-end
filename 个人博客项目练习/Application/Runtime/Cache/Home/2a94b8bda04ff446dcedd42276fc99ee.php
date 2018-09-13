<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BIGDOG's个人博客</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/base.css">
    <link href="//at.alicdn.com/t/font_l8fb5t7tbgt7f1or.css" rel="stylesheet">
</head>
<body id="body">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10" id="nav">
            <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.css">
<script src="/Public/bootstrap/js/jquery.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.js"></script>

<nav class="navbar navbar-default">
    <div class="col-sm-12">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#fold_target">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="/Public/Img/my_logo.png" class="img-circle hidden-md hidden-sm nav-brand" alt="">
        </div>
        <div class="collapse navbar-collapse text-center" id="fold_target">
            <ul class="nav navbar-nav">
                <?php if(($curCatId) == ""): ?><li><a href="<?php echo U('Index/index');?>" class="nav_active">首页</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Index/index');?>">首页</a></li><?php endif; ?>
                
                <?php if(is_array($catList)): $i = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $__FOR_START_30425__=0;$__FOR_END_30425__=$countChildCat;for($i=$__FOR_START_30425__;$i < $__FOR_END_30425__;$i+=1){ if(($vo["cat_id"]) == $catChildList[$i]['parent_id']): ?><li class="dropdown">
                                <?php if(($t) == $vo["cat_id"]): ?><a href="#" class="dropdown-toggle nav_active"
                                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php echo ($vo["cat_name"]); ?><span class="caret"></span>
                                    </a>
                                    <?php else: ?>
                                    <a href="#" class="dropdown-toggle"
                                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php echo ($vo["cat_name"]); ?><span class="caret"></span>
                                    </a><?php endif; ?>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <?php if(is_array($catChildList)): $i = 0; $__LIST__ = $catChildList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if(($vo["cat_id"]) == $vo2["parent_id"]): ?><li class="text-center"><a
                                                    href="<?php echo U('Category/view?cat_id='.$vo2['cat_id'].'&t='.$vo2['parent_id']);?>"><?php echo ($vo2["cat_name"]); ?></a>
                                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php $i = $countChildCat; endif; ?>
                        <?php if($i == $countChildCat-1): if(($curCatId) == $vo["cat_id"]): ?><li><a href="<?php echo U('Category/view?cat_id='.$vo['cat_id']);?>" class="nav_active"><?php echo ($vo["cat_name"]); ?></a>
                                </li>
                                <?php else: ?>
                                <li><a href="<?php echo U('Category/view?cat_id='.$vo['cat_id']);?>"><?php echo ($vo["cat_name"]); ?></a></li><?php endif; endif; } endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</nav>








        </div>
    </div>
    <div class="row hidden-xs" id="search">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="row">
                <div class="col-sm-1">
                    <a href=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                </div>
                <div class="col-sm-11">
                    <form class="form-inline" action="<?php echo U('Category/search');?>" method="post">
                        <div class="from-group">
                            <div class="col-sm-9">
                                <input type="text" name="searchField" placeholder="请输入文章分类或标题" class="form-control"
                                       id="search_text">
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="form-control" value="搜一下">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="bar">
        <div class="col-sm-offset-1 col-sm-10" id="head_img">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-4">
                    <h2>BIGDOG</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-3 ">
                    <h3>&nbsp;&nbsp;的&nbsp;个&nbsp;人&nbsp;博&nbsp;客</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="main_body">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-2 hidden-xs">
            <div class='row' id="my_self">
    <div class='col-sm-12'>
        <h3 id='logo_title'>BIGDOG</h3>
    </div>
    <div class='col-sm-offset-1 col-sm-10 text-center' id='al_tubiao'>
        <a href='#' data-toggle='tooltip' data-placement='top' title='QQ:1643978671' class="col-sm-6 col-md-3"><i
                class='iconfont icon-QQ'></i></a>
        <a href='#' data-toggle='tooltip' data-placement='top' title='暂时保密' class="col-sm-6 col-md-3"><i
                class='iconfont icon-qietu08'></i></a>
        <a href='#' data-toggle='tooltip' data-placement='top' title='Zhenzhong Ji' class="col-sm-6 col-md-3"><i
                class='iconfont icon-Facebook'></i></a>
        <a href='#' data-toggle='tooltip' data-placement='top' title='暂时保密' class="col-sm-6 col-md-3"><i
                class='iconfont icon-2em'></i></a>
    </div>
    <div class='col-sm-12'>
        <p id='logo_motto'><i><strong>回忆</strong>曾经的<strong>美好</strong></i>!</p>
    </div>
</div>
<div class="row" id="link_others">
    <div class="col-sm-12">
        <p><strong><span class="glyphicon glyphicon-paperclip"></span>&nbsp;友情链接:</strong></p>
    </div>
    <div class="col-sm-offset-1 col-sm-10">
        <a href="https://nxmup.com">nxmup</a>
    </div>
    <div class="col-sm-offset-1 col-sm-10">
        <a href="https://www.ycjcl.cc">信鑫-King</a>
    </div>
    <div class="col-sm-offset-1 col-sm-10">
        <a href="http://bestwing.me">Swing</a>
    </div>
</div>

        </div>
        <div class="col-sm-8" id="arc_body">
            <?php if(is_array($msgList)): $i = 0; $__LIST__ = $msgList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media">
                    <div class="media-body">
                        <h5 class="media-heading"><strong><?php echo ($vo["msg_title"]); ?></strong></h5>
                        <p><?php echo (msubstr($vo["msg_content"],0,162,'utf-8',true)); ?></p>
                        <div id="arc_icon">
                            <strong><span
                                    class="glyphicon glyphicon-time"></span>&nbsp;<?php echo ($vo["msg_time"]); ?></strong>
                            <?php if(($vo["cat_name"]) != ""): ?><strong><span
                                        class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo ($vo["cat_name"]); ?></strong>
                                <?php else: ?>
                                <strong><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;无</strong><?php endif; ?>
                            <a href="<?php echo U('Article/view?cat_id='.$curCatId.'&msg_id='.$vo['msg_id']);?>" id="arc_more">
                                <button>更多</button>
                            </a>
                        </div>
                    </div>
                    <div class="media-right hidden-xs hidden-sm">
                        <a href=""><img class="media-object img-thumbnail" src="/<?php echo ($vo["msg_img"]); ?>" alt=""></a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="row">
        <nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        <?php if(($p) != "1"): ?><li><a href="<?php echo U($curControl.'?p=1&cat_id='.$curCatId);?>">首页</a></li>
            <?php else: ?>
            <li class="disabled"><a href="#">首页</a></li><?php endif; ?>
        <li>
            <?php if(($p) != "1"): ?><li><a href="<?php echo U($curControl.'?p='.($p-1).'&cat_id='.$curCatId);?>">上页</a></li>
        <?php else: ?>
        <li class="disabled"><a href="javascript:">上页</a></li><?php endif; ?>
        <?php $__FOR_START_26782__=1;$__FOR_END_26782__=$page+1;for($i=$__FOR_START_26782__;$i < $__FOR_END_26782__;$i+=1){ if(($i) == $p): ?><li class="active"><a href="<?php echo U($curControl.'?p='.$i.'&cat_id='.$curCatId);?>"><?php echo ($i); ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo U($curControl.'?p='.$i.'&cat_id='.$curCatId);?>"><?php echo ($i); ?></a></li><?php endif; } ?>
        <?php if(($p) != $page): ?><li><a href="<?php echo U($curControl.'?p='.($p+1).'&cat_id='.$curCatId);?>">下页</a></li>
            <?php else: ?>
            <li class="disabled"><a href="javascript:">下页</a></li><?php endif; ?>
        <?php if(($p) != $page): ?><li><a href="<?php echo U($curControl.'?p='.$page.'&cat_id='.$curCatId);?>">尾页</a></li>
            <?php else: ?>
            <li class="disabled"><a href="#">尾页</a></li><?php endif; ?>
    </ul>
</nav>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="footer">
        <div class="col-md-12">
            <p><strong>本站本站由©BIGDOG&nbsp;&nbsp;&nbsp;陕ICP备17006878号</strong></p>
        </div>
    </div>
</div>
</body>
</html>