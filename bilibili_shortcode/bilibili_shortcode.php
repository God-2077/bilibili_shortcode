<?php
/*
Plugin Name: WordPress通过短代码插入bilibili视频
Plugin URI: https://github.com/God-2077/bilibili_shortcode/
Description: 一个WordPress插件，用于使用短代码插入哔哩哔哩视频 & A WordPress plugin for inserting Bilibili videos using shortcodes.
Version: 1.0
Author: space520
Author URI: https://space520eu.org/
License: GPL3
*/

// 添加插入bilibili视频短代码
function vbilibili_shortcode( $atts, $content = null ) {
   // 默认参数值
   $defaults = array(
       'av' => '',
       'bv' => '',
   );

   // 解析短代码中的参数
   $atts = shortcode_atts( $defaults, $atts );
   
   // 如果参数 av 和 bv 都为空，则返回错误信息
   if ( empty( $atts['av'] ) && empty( $atts['bv'] ) ) {
       return '<p>av 或 bv 不可为空</p>';
   }

   // 如果参数 av 和 bv 同时存在，则返回错误信息
   if ( ! empty( $atts['av'] ) && ! empty( $atts['bv'] ) ) {
       return '<p>av 和 bv 不可同时存在</p>';
   }

   // 根据参数 av 或 bv 构建 iframe 的 URL
   if ( ! empty( $atts['av'] ) ) {
       $iframe_url = 'https://player.bilibili.com/player.html?aid=' . esc_attr( $atts['av'] ) . '&amp;high_quality=1';
   } elseif ( ! empty( $atts['bv'] ) ) {
       $iframe_url = 'https://player.bilibili.com/player.html?bvid=' . esc_attr( $atts['bv'] ) . '&amp;high_quality=1';
   }

   // 构建 iframe 的 HTML 代码
   $iframe = '<div style="position: relative; padding: 30% 45%;"><iframe src="' . $iframe_url . '" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" style="position: absolute; width: 100%; height: 100%; left: 0; top: 0;"> </iframe></div><br>';

   // 返回 iframe 的 HTML 代码
   return $iframe;
}
add_shortcode( 'vbilibili', 'vbilibili_shortcode' );
