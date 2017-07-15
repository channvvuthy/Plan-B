//javascript/jQuery
$(function(){
	var tag_insert = {
		//Head
		'.head_all':'<!DOCTYPE html>\n<!-- area_all.php  for ver 1.6 -->\n<html lang="ja">\n<head>\n<meta charset="UTF-8">\n<meta name="viewport" content="width=device-width,initial-scale=1">\n\n<?php if (function_exists("get_header_tag")) {get_header_tag();} ?>\n<?php if (function_exists("canonical_url")) {canonical_url();} ?>\n\n<link rel="stylesheet" href="<?php home_url(); ?>css/style.css">\n</head>',
		'.meta_charset':'<meta charset="UTF-8">',
		'.viewport':'<meta name="viewport" content="width=device-width,initial-scale=1">',
		'.header_tag':'<?php if (function_exists("get_header_tag")) {get_header_tag();} ?>" />',
		'.canonical':'<?php if (function_exists("canonical_url")) {canonical_url();} ?>',
		//Blcok
		'.home_url':'<?php home_url(); ?>',
		'.sitetitle':'<?php if(!empty($sitetitle)) {echo $sitetitle;} ?>',
		'.social':'<?php if (file_exists("include/social.php")) {require_once $rootpass.\'include/social.php\';} ?>',
		'.d_block':'<?php if(function_exists("d_block")) {\n\td_block(1, $BlockCount,\n\tarray(\n \t\t\'Variation\' => 0,\n \t\t\'Skip\'      => 1,\n \t\t\'BlockTag\'  => \'\',\n \t\t\'BlockCss\'  => \'\',\n \t\t\'TitleCss\'  => \'\',\n \t\t\'ImageCss\'  => \'\',\n \t\t\'DigestCss\' => \'\',\n \t\t\'PrCss\'     => \'\',\n \t\t\'MoreCss\'   => \'\',\n \t\t\'MoreText\'  => \'\',\n \t\t\t)\n \t\t);\n } ?>', 
		'.global_nav':'<?php if(function_exists("global_nav")) {global_nav($BlockCount,\'\') ;} ?>',
		'.post_list':'<?php if(function_exists("post_list")) {post_list($BlockCount, \'\');} ?>',
		'.footer_link':'<?php if(function_exists("footer_link") || (!empty($ft)))  {footer_link($BlockCount);} ?>',
		'.copyright':'Copyright&copy; 2015 <?php if(!empty($sitetitle)) {echo $sitetitle;} ?> All Rights Reserved.',
		'.copyright2':'Copyright\&copy\; 2015 <a href="<?php home_url(); ?>"><?php if(!empty($sitetitle)) {echo $sitetitle;} ?></a>All Rights Reserved.',
		'.copyright3':'\&copy\; <a href="<?php home_url(); ?>"><?php if(!empty($sitetitle)) {echo $sitetitle;} ?></a>All Rights Reserved. 2015 ',

		//Top_Contents
		'.top_all':'<?php if (!empty($pagetitle[1][1])):?> <h><?php echo $pagetitle[1][1]; ?></h> <?php endif;?>\n <?php if (!empty($pageimage[1][1])) {echo \'<img  src="\' .$read_home_url. \'images/\' .$pageimage[1][1]. \'" alt="\' .$pagealt[1][1]. \'" />\';} ?>\n <?php if (!empty($pr_link[6])) {echo \'<p class="pr_link">\'. $pr_link[6] . \'</p>\'; }?>\n <?php if (!empty($pr_link[7])) {echo \'<p class="pr_link">\'. $pr_link[7] . \'</p>\'; }?>\n <?php if (!empty($top_original_content)) {echo $top_original_content; }?>\n <?php if (!empty($pr_link[8])) {echo \'<p class="pr_link">\'. $pr_link[8] . \'</p>\'; }?>\n <?php if (!empty($pr_link[9])) {echo \'<p class="pr_link">\'. $pr_link[9] . \'</p>\'; }?>\n <?php if (!empty($pr_link[10])) {echo \'<p class="pr_link">\'. $pr_link[10] . \'</p>\'; }?>',
		'.page_title':'<?php if (!empty($pagetitle[1][1])):?> <h><?php echo $pagetitle[1][1]; ?></h> <?php endif;?>',
		'.top_image':'<?php if (!empty($pageimage[1][1])) {echo \'<img  src="\' .$read_home_url. \'images/\' .$pageimage[1][1]. \'" alt="\' .$pagealt[1][1]. \'" />\';} ?>',
		'.top_image_class':'<?php if (!empty($pageimage[1][1])) {echo \'<img class="hoge" src="\' .$read_home_url. \'images/\' .$pageimage[1][1]. \'" alt="\' .$pagealt[1][1]. \'" />\'."\\n";} ?>',
		'.top_content':'<?php if (!empty($top_original_content)) {echo $top_original_content; }?>',
		//Sub_Contents
		'.sub_all':'<h><?php if (!empty($page_title)) {echo $page_title;}?></h>\n<?php if (!empty($sub_content)) {echo $sub_content;}?>',
		'.sub_title':'<h><?php if (!empty($page_title)) {echo $page_title;}?></h>',
		'.sub_content':'<?php if (!empty($sub_content)) {echo $sub_content;}?>',
		//PR_LINK
		'.prLink01':"<?php if (!empty($pr_link[1])) {echo '<li>'. $pr_link[1] . '</li>'; }?>",
		'.prLink02':"<?php if (!empty($pr_link[2])) {echo '<li>'. $pr_link[2] . '</li>'; }?>",
		'.prLink03':"<?php if (!empty($pr_link[3])) {echo '<li>'. $pr_link[3] . '</li>'; }?>",
		'.prLink04':"<?php if (!empty($pr_link[4])) {echo '<li>'. $pr_link[4] . '</li>'; }?>",
		'.prLink05':"<?php if (!empty($pr_link[5])) {echo '<li>'. $pr_link[5] . '</li>'; }?>",
		'.prLink06':"<?php if (!empty($pr_link[6])) {echo '<p>'. $pr_link[6] . '</p>'; }?>",
		'.prLink07':"<?php if (!empty($pr_link[7])) {echo '<p>'. $pr_link[7] . '</p>'; }?>",
		'.prLink08':"<?php if (!empty($pr_link[8])) {echo '<p>'. $pr_link[8] . '</p>'; }?>",
		'.prLink09':"<?php if (!empty($pr_link[9])) {echo '<p>'. $pr_link[9] . '</p>'; }?>",
		'.prLink10':"<?php if (!empty($pr_link[10])) {echo '<p>'. $pr_link[10] . '</p>'; }?>",
		//Switching
		'.topOnly':'<?php //TOPページ@page_0@****************************************************************************************************\nif ($filename == "index.php") : ?>',
		'.subOnly':'<?php //内部ページ@end_page_0@@page_1@************************************************************************************************************************\nelse :?>',
		'.onlyEnd':'<?php //ページ分けおしまい@end_page_1@**************************************************************************************************\nendif; ?>',
		'.prLink01_05':'<?php if (!empty($pr_link[1]) || !empty($pr_link[2]) || !empty($pr_link[3]) || !empty($pr_link[4]) || !empty($pr_link[5])) { ?>',
		'.prLinkEnd':'<?php } ?>',
		'.blockmute':'<?php if (5 <= $BlockCount) : ?>\n<?php endif; ?>',
	}

	$.each(tag_insert, function(key, value){
		$(key).click(function(){
		  var point = $('textarea').scrollTop();
		  $('#textarea')
		    .selection('replace', {text: value})
			var h = $('textarea');
			h.scrollTop(point); 
		});
	})
});