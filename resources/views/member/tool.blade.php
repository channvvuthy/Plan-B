@extends('layout.member.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/tool/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/tool/materialize.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>

@stop
@section('title')
    Member
@stop
@section('content')
    @include('layout.member.widget.header')
    @include('layout.member.widget.navbar')
    <div class="col-md-10" style="width:1100px;max-height:600px;overflow: auto;">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="/administrator/index"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('tool')}}"><i class="glyphicon glyphicon-hdd"></i> Tool</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        
        <div id="container">
            <div class="z-depth-1">
            <header class="green">
                <div id="headerInner">
                    <h1 style="padding-left:20px;">CODING_TOOL4.4 <small>for VSS ver.1.6.x</small></h1>
                </div>
            </header>

            <div class="button green">

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='headmenu'>Head</a>
            <ul id='headmenu' class='dropdown-content'>
                <li><input class="head_all" type="button" value="All Head Tag" /></li>
                <li class="divider"></li>
                <li><input class="meta_charset" type="button" value="meta_charset" /></li>
                <li><input class="viewport" type="button" value="viewport"/></li>
                <li><input class="header_tag" type="button" value="get_header_tag" /></li>
                <li><input class="canonical" type="button" value="canonical" /></li>

            </ul>

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='blockmenu'>Blocks</a>
            <ul id='blockmenu' class='dropdown-content'>
                <li><input class="home_url" type="button" value="home_url" /></li>
                <li><input class="sitetitle" type="button" value="site title" /></li>
                <li><input class="social" type="button" value="social" /></li>
                <li><input class="d_block" type="button" value="d_block" /></li>
                <li><input class="global_nav" type="button" value="global_nav" /></li>
                <li><input class="post_list" type="button" value="post_list" /></li>
                <li><input class="footer_link" type="button" value="footer_link" /></li>
                <li class="divider"></li>
                <li><input class="copyright" type="button" value="Copyright" /></li>
                <li><input class="copyright2" type="button" value="Copyright 2" /></li>
                <li><input class="copyright3" type="button" value="Copyright 3" /></li>
            </ul>

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='topmenu'>Top Contents</a>
            <ul id='topmenu' class='dropdown-content'>
                <li><input class="top_all" type="button" value="All Top Contents" /></li>
                <li class="divider"></li>
                <li><input class="page_title" type="button" value="Title" /></li>
                <li><input class="top_image" type="button" value="Image" /></li>
                <li><input class="top_image_class" type="button" value="Image (with class)" /></li>
                <li><input class="top_content" type="button" value="Contents" /></li>
            </ul>

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='submenu'>Sub Contents</a>
            <ul id='submenu' class='dropdown-content'>
                <li><input class="sub_all" type="button" value="All Sub Contents" /></li>
                <li class="divider"></li>
                <li><input class="sub_title" type="button" value="Title" /></li>
                <li><input class="sub_content" type="button" value="Contents" /></li>
            </ul>

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='linkmenu'>PR Link</a>
            <ul id='linkmenu' class='dropdown-content'>
                <li><input class="prLink01" type="button" value="PR_LINK_1" /></li>
                <li><input class="prLink02" type="button" value="PR_LINK_2" /></li>
                <li><input class="prLink03" type="button" value="PR_LINK_3" /></li>
                <li><input class="prLink04" type="button" value="PR_LINK_4" /></li>
                <li><input class="prLink05" type="button" value="PR_LINK_5" /></li>
                <li><input class="prLink06" type="button" value="PR_LINK_6" /></li>
                <li><input class="prLink07" type="button" value="PR_LINK_7" /></li>
                <li><input class="prLink08" type="button" value="PR_LINK_8" /></li>
                <li><input class="prLink09" type="button" value="PR_LINK_9" /></li>
                <li><input class="prLink10" type="button" value="PR_LINK_10" /></li>
            </ul>

            <a class='dropdown-button btn-flat' href='#' data-beloworigin="true" data-activates='switchmenu'>Switching</a>
            <ul id='switchmenu' class='dropdown-content'>
                <li><input class="topOnly" type="button" value="top_only" /></li>
                <li><input class="subOnly" type="button" value="inside_only" /></li>
                <li><input class="onlyEnd" type="button" value="end_switch" /></li>
                <li class="divider"></li>
                <li><input class="prLink01_05" type="button" value="pr_switch_start" /></li>
                <li><input class="prLinkEnd" type="button" value="pr_switch_end" /></li>
                <li class="divider"></li>
                <li><input class="blockmute" type="button" value="Block Mute" /></li>
            </ul>

            </div><!-- .button END -->
            </div> <!-- div.z-depth END-->

            <div id="wrap">
            <div id="main">
            <form class="col s8">
                <div class="input-field col s8">
                <textarea name="text_field" id="textarea" type="text"  class="materialize-textarea"></textarea>
                    </div>
            </form>
            </div>

            <div id="count_list" class="z-depth-1">

            <div class="clm1">
                <h4>ヘッダーと全般 <small>Header / Grobal Paramater</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp top_grp">
                <dt>meta charset</dt>
                <dd id="tagCount_01" class="bd_right">0</dd>
                <dt>viewport</dt>
                <dd id="tagCount_02">0</dd>
                </div>

                <div class="conclude_grp top_grp">
                <dt>get_header_tag</dt>
                <dd id="tagCount_03" class="bd_right">0</dd>
                <dt>canonical</dt>
                <dd id="tagCount_04">0</dd>
                </div>

                <div class="conclude_grp">
                <dt>home_url</dt>
                <dd id="tagCount_05" class="bd_right">0</dd>
                <dt>h1 site_title</dt>
                <dd id="tagCount_06">0</dd>
                </div>

                </dl><!-- .count_dl END -->

                <h4>ブロック <small>Content Blocks</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp top_grp">
                    <dt>Social</dt>
                    <dd id="tagCount_07" class="bd_right">0</dd>
                    <dt>BlockCount</dt>
                    <dd id="tagCount_08">0</dd>
                </div>

                <div class="conclude_grp">
                    <dt>Copyright</dt>
                    <dd id="tagCount_09" class="bd_right">0</dd>
                </div>
                </dl><!-- .count_dl END -->

                <h4>トップ記事 <small>Article on Home Page</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp top_grp">
                    <dt>top pagetitle</dt>
                    <dd id="tagCount_10" class="bd_right">0</dd>
                    <dt>top_original_content</dt>
                    <dd id="tagCount_11">0</dd>
                </div>
                <div class="conclude_grp">
                    <dt>top pageimage</dt>
                    <dd id="tagCount_12" class="bd_right">0</dd>
                </div>
                </dl>


                <h4>内部記事 <small>Articles on Sub-section Page</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp">
                    <dt>page_title</dt>
                    <dd id="tagCount_13" class="bd_right">0</dd>
                    <dt>sub_content</dt>
                    <dd id="tagCount_14">0</dd>
                </div>
                </dl>
            </div><!-- clm1 END -->

            <div class="clm2">
                <h4>PRリンクタグ <small>PR links</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp top_grp">
                    <dt>PR_LINK_1</dt>
                    <dd  class="bd_right" id="tagCount_75">0</dd>
                    <dt>PR_LINK_2</dt>
                    <dd id="tagCount_76">0</dd>
                </div>
                <div class="conclude_grp top_grp">
                    <dt>PR_LINK_3</dt>
                    <dd class="bd_right" id="tagCount_77">0</dd>
                    <dt>PR_LINK_4</dt>
                    <dd id="tagCount_78">0</dd>
                </div>
                <div class="conclude_grp top_grp">
                    <dt>PR_LINK_5</dt>
                    <dd class="bd_right" id="tagCount_79" class="last">0</dd>
                    <dt>PR_LINK_6</dt>
                    <dd id="tagCount_80">0</dd>
                </div>
                <div class="conclude_grp top_grp">
                    <dt>PR_LINK_7</dt>
                    <dd class="bd_right" id="tagCount_81">0</dd>
                    <dt>PR_LINK_8</dt>
                    <dd id="tagCount_82">0</dd>
                </div>
                <div class="conclude_grp">
                    <dt>PR_LINK_9</dt>
                    <dd class="bd_right" id="tagCount_83">0</dd>
                    <dt>PR_LINK_10</dt>
                    <dd id="tagCount_84" class="last">0</dd>
                </dl><!-- .count_dl END -->

                <h4>スイッチングタグ <small>Switching Code</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp top_grp">
                    <dt>top_only</dt>
                    <dd class="bd_right" id="tagCount_95">0</dd>
                    <dt>inside_only</dt>
                    <dd id="tagCount_96">0</dd>
                </div>
                <div class="conclude_grp top_grp">
                    <dt>end_switch</dt>
                    <dd class="bd_right" id="tagCount_97">0</dd>
                    <dt>pr_switch_start</dt>
                    <dd id="tagCount_98">0</dd>
                </div>
                <div class="conclude_grp">
                    <dt>pr_switch_end</dt>
                    <dd class="bd_right" id="tagCount_99" class="last">0</dd>
                </div>
                </dl><!-- .count_dl END -->

                <h4>画像 <small>images</small></h4>
                <dl class="count_dl">
                <div class="conclude_grp">
                    <dt>phpを経由しない画像の数 Images</dt>
                    <dd class="bd_right" id="tagCount_100" class="last">0</dd>
                </div>
                </dl>
            </div><!-- clm2 END -->
            </div><!-- #count_list END -->
            </div><!-- #wrap END -->
            </div><!-- #container END -->

            <script>
            $(textarea_box).keydown(function(e){
                if (e.keyCode === 9) {
                    e.preventDefault();
                    var elem = e.target;
                    var val = elem.value;
                    var pos = elem.selectionStart;
                    elem.value = val.substr(0, pos) + '\t' + val.substr(pos, val.length);
                    elem.setSelectionRange(pos + 1, pos + 1);
                }
            });
            </script>
    </div>
@stop
@section('script')
    <script src="{{asset('js/jquery.selection.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/CountTags.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/changePHP.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/materialize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/')}}" type="text/javascript"></script>
@stop