<?php

/* ------------------------------------
 * CSS・JS の読み込み
 * ------------------------------------ */
function add_files()
{
	//キャッシュ無効（開発時はこちらをコメント解除）
	// $cache = date('YmdHis');
	//キャッシュ有効（公開後はこちらをコメント解除）
	$cache = 1.0;

	// WordPress提供のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	// jQueryの読み込み
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', "", $cache, false);

	// Swiper（CSS・JS）
	wp_enqueue_style('swiper', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), $cache);
	wp_enqueue_script('swiper-js', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), $cache, true);

	// サイト共通（CSS・JS）
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', "", $cache);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array('swiper-js'), $cache, true);
}
add_action('wp_enqueue_scripts', 'add_files');


/* ------------------------------------
 * アイキャッチ画像（投稿サムネイル）有効化
 * ------------------------------------ */
function gym_theme_setup()
{
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'gym_theme_setup');


/* ------------------------------------
 * NEWS のパーマリンクを /news/ID/ に変更
 * ------------------------------------ */
function news_post_type_link($link, $post)
{
	if ($post->post_type === 'news') {
		return home_url('/news/' . $post->ID . '/');
	}
	return $link;
}
add_filter('post_type_link', 'news_post_type_link', 10, 2);

function news_rewrite_rules()
{
	add_rewrite_rule('news/([0-9]+)/?$', 'index.php?post_type=news&p=$matches[1]', 'top');
}
add_action('init', 'news_rewrite_rules');


/* ------------------------------------
 * CATALOG のパーマリンクを /catalog/ID/ に変更
 * ------------------------------------ */
function catalog_post_type_link($link, $post)
{
	if ($post->post_type === 'catalog') {
		return home_url('/catalog/' . $post->ID . '/');
	}
	return $link;
}
add_filter('post_type_link', 'catalog_post_type_link', 10, 2);

function catalog_rewrite_rules()
{
	add_rewrite_rule('catalog/([0-9]+)/?$', 'index.php?post_type=catalog&p=$matches[1]', 'top');
}
add_action('init', 'catalog_rewrite_rules');
