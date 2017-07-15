$(function(){
$('textarea').each(function(){
$(this).bind('keyup', hoge(this));
});
});

function hoge(elm){
var v, old = elm.value;
return function(){
if(old != (v=elm.value)){
old = v;
var area = $('#textarea').val();
		var tag_map = {
	  		//Header Grobal #tagCount_01~06
	  		'#tagCount_01':'<meta charset="UTF-8">',
	  		'#tagCount_02':'<meta name="viewport" content="width=device-width,initial-scale=1">',
	  		'#tagCount_03':'<?php if (function_exists("get_header_tag")) {get_header_tag();} ?>',
	  		'#tagCount_04':'<?php if (function_exists("canonical_url")) {canonical_url();} ?>',
	  		'#tagCount_05':'<?php home_url(); ?>',
	  		'#tagCount_06':'<?php if(!empty($sitetitle)) {echo $sitetitle;} ?>',
	  		//Block #tagCount_07~09
	  		'#tagCount_07':/\<\?php if \(file_exists\(\"include\/social.php\"\)\) \{require_once \$rootpass\.\'include\/social\.php\'.*\;.*\}.*\?.*\>/,
	  		'#tagCount_08':/d_block\(.*, \$BlockCount\,/,
	  		'#tagCount_09':/Copyright/i,
	  		//Top_Contents #tagCount_10~12
	  		'#tagCount_10':/\<\?php if \(\!empty\(\$pagetitle\[1\]\[1\]\)\).*\:.*\?\>.*\<.*\>.*\<\?php echo \$pagetitle\[1\]\[1\].*\;.*\?\>.*\<.*\>.*\<\?php endif.*\;.*\?\>.*/,
	  		'#tagCount_11':/\<\?php if \(\!empty\(\$top_original_content\)\).*\{.*echo \$top_original_content.*\;.*\}.*\?\>.*/,
	  		'#tagCount_12':/\<\?php if \(\!empty\(\$pageimage\[1\]\[1\]\)\) \{echo \'\<img.*src\=\"\'.*\..*\$read_home_url\.*..*\'images\/\'.*\..*\$pageimage\[1\]\[1\].*\..*\'\" alt\=\"\'.*\..*\$pagealt\[1\]\[1\].*\..*\'\" \/\>\'.*\;.*\}.*\?.*\>/,
	  		//Sub_Contents #tagCount_13~14
	  		'#tagCount_13':'<?php if (!empty($page_title)) {echo $page_title;}?>',
	  		'#tagCount_14':'<?php if (!empty($sub_content)) {echo $sub_content;}?>',
	  		//PR_Link #tagCount_75~84
	  		'#tagCount_75':/\<\?php if \(\!empty\(\$pr_link\[1\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[1\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_76':/\<\?php if \(\!empty\(\$pr_link\[2\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[2\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_77':/\<\?php if \(\!empty\(\$pr_link\[3\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[3\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_78':/\<\?php if \(\!empty\(\$pr_link\[4\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[4\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_79':/\<\?php if \(\!empty\(\$pr_link\[5\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[5\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_80':/\<\?php if \(\!empty\(\$pr_link\[6\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[6\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_81':/\<\?php if \(\!empty\(\$pr_link\[7\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[7\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_82':/\<\?php if \(\!empty\(\$pr_link\[8\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[8\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_83':/\<\?php if \(\!empty\(\$pr_link\[9\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[9\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		'#tagCount_84':/\<\?php if \(\!empty\(\$pr_link\[10\]\)\) \{echo \'\<.*\>\'\. \$pr_link\[10\] \. \'\<\/.*\>\'\; \}\?\>/,
	  		//Switching #tagCount_95~99
	  		'#tagCount_95':/\<\?php \/\/TOPページ@page_0@[\*]{100}[\n]?[\s]?if[\s]?\(\$filename == \"index\.php\"\) \: \?\>/,
	  		'#tagCount_96':/\<\?php \/\/内部ページ@end_page_0@@page_1@[\*]{120}[\n]?[\s]?else[\s]?\:\?\>/,
	  		'#tagCount_97':/\<\?php \/\/ページ分けおしまい@end_page_1@[\*]{98}[\n]?[\s]?endif\; \?\>/,
	  		'#tagCount_98':'<?php if (!empty($pr_link[1]) || !empty($pr_link[2]) || !empty($pr_link[3]) || !empty($pr_link[4]) || !empty($pr_link[5])) { ?>',
	  		'#tagCount_99':'<?php } ?>',
	  		'#tagCount_100':/src\=\"\<\?php home_url\(\)\; \?\>images\/.*\.jpg|jpeg|gif|png\"/,
	  	};

	$.each(tag_map, function(key, value){
	  		count = area.split(value).length - 1;
	  		ColorCount(key, count);
	  	})

	function ColorCount(key, count){
	   	$(key).html(count);
	   	switch(count){
	   		case 0 :
	   			$(key).css('background', '#e3e3e3');
	   			break;
	   		case 1 :
	   			$(key).css('background', '#ff8a80');
	   			break;
	   		case 2 :
	   			$(key).css('background', '#FFBD80');
	   			break;
	   		case 3 :
	   			$(key).css('background', '#FFEB80');
	   			break;
	   		case 4 :
	   			$(key).css('background', '#DCF57B');
	   			break;
	   		case 5 :
	   			$(key).css('background', '#63C574');
	   			break;
	   		default : 
	   			$(key).css('background', '#5B82A8');
	   			break;
	   	}
	}
}
}
}
