<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title><?=$site_name?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php foreach($styles as $file_style): ?>
            <?=html::style($file_style)?>
        <?php endforeach?>
        <?php foreach($scripts as $file_script): ?>
            <?=html::script($file_script)?>
        <?php endforeach?>
</head>
<body>
   
<div id="wrapper">
   
    <div id="header">
        
        <div id="headerCont">
            
            <h1><?=$site_name?><br><?=$site_description?></h1>
            <?php if(isset($block_headerRight)):?>
                <div id="headerIn">
                    <?php foreach($block_headerRight as $k => $v):?>
                        <?=$v?>
                    <?php endforeach?>
                </div>
            <?php endif?>
        </div>
    </div>


    <div id="conUp">
        <div id="container">
                <?php if (isset($block_left)): ?>
                    <div id="left">
                        <ul>
                            <?php foreach($block_left as $name => $href): ?>
                                <?=$href?>
                            <?php endforeach?>
                        </ul>
                    </div>
                <?php endif?>
            <div id="center">
                <?php if(isset($block_center)):?>
                    <h2><?=$page_title?></h2>
                    <?php foreach($block_center as $cblock): ?>
                        <?=$cblock?>
                    <?php endforeach?>
                <?php endif;?>
            </div>
                <?php if(isset($block_right)):?>
                    <div id="right">
                            <?php foreach($block_right as $rblock): ?>
                                <?=$rblock?>
                            <?php endforeach?>
                    </div>
                <?php endif;?>
            <div closs="clear"></div>
        </div>
    </div>
</div>
    <div id="footer"><?=$page_footer?></div>
</body>
</html>
