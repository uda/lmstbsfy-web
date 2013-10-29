<?php defined('LMSTBSFY') or die('Wrong access.');
/**
 * This file has not been checked and is a simple fallback for no-js cases
 */

function go($url = './') {
  header('Location: ' . $url, 302, TRUE);
  exit;
}

$search_engines = array(
  'google' => 'https://www.google.com/#q=%s',
  'bing' => 'http://www.bing.com/search?q=%s',
  'ask' => 'http://www.ask.com/web?q=%s',
  'ddg' => 'https://duckduckgo.com/?q=%s',
  'yahoo' => 'http://search.yahoo.com/search?p=%s',
);
$selected_se = 'google';

$post = $_POST;

if (!empty($post) && isset($post['query']) && strlen($post['query']) >= 3) {
  // TODO: needs some xss checks
  $text = urlencode($post['query']);
  if (isset($post['engine']) && isset($search_engines[$post['engine']])) {
    $selected_se = $post['engine'];
  }

  $text .= '%20AND%20(debunk%20OR%20fake%20OR%20hoax%20OR%20quack)';
  $url = str_replace('%s', $text, $search_engines[$selected_se]);
  go($url);
}
