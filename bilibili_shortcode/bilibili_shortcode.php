bug
Warning: Invalid argument supplied for foreach() in /www/wwwroot/ue.tiktokssl.tk/wp-includes/shortcodes.php on line 586


<?php
/*
Plugin Name: WordPress通过短代码插入bilibili视频
Plugin URI: https://github.com/God-2077/bilibili_shortcode/
Description: 一个WordPress插件，用于使用短代码插入哔哩哔哩视频 & A WordPress plugin for inserting Bilibili videos using shortcodes.
Version: 2.1
Author: Space520
Author URI: https://space520.eu.org/
License: GPL3
*/

// 添加插入bilibili视频短代码
function vbilibili_shortcode( $atts, $content = null ) {

   // 解析短代码中的参数
   // $atts = shortcode_atts( $defaults, $atts );
  
   // 提取$content中的所有bv号和av号
    preg_match_all('/BV([a-zA-Z0-9]+)/', $content, $bv_matches);
    preg_match_all('/av([0-9]+)/', $content, $av_matches);
   
   // 构建iframe的HTML代码
   $iframes = '';
   
   // 生成bv号对应的iframe
if (!empty($bv_matches[1])) {
    foreach ($bv_matches[1] as $bv) {
        // ... 省略部分代码
    }
}
   
   // 生成bv号对应的iframe
   if (!empty($bv_matches[1])) {
       foreach ($bv_matches[1] as $bv) {
            
           $iframe_url = 'https://player.bilibili.com/player.html?bvid=' . $bv . '&amp;high_quality=1';
           $iframe = '<div style="position: relative; padding: 30% 45%;"><iframe src="' . $iframe_url . '" frameborder="no" scrolling="no" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts" allowfullscreen="allowfullscreen" style="position: absolute; width: 100%; height: 100%; left: 0; top: 0;"> </iframe></div><br>';
           $iframes .= $iframe;
       }
   }
   
   // 生成av号对应的iframe
   if (!empty($av_matches[1])) {
       foreach ($av_matches[1] as $av) {
       
            // 将$av转换为整数类型
            $av = intval($av);
       
           $iframe_url = 'https://player.bilibili.com/player.html?aid=' . $av . '&amp;high_quality=1';
           $iframe = '<div style="position: relative; padding: 30% 45%;"><iframe src="' . $iframe_url . '" frameborder="no" scrolling="no" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts" allowfullscreen="allowfullscreen" style="position: absolute; width: 100%; height: 100%; left: 0; top: 0;"> </iframe></div><br>';
           $iframes .= $iframe;
       }
   }

   // 返回所有iframe的HTML代码
   return $iframes;
}
add_shortcode( 'vbilibili', 'vbilibili_shortcode' );
