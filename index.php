<?php
/**
 * @file index.php
 *       main file and (only) page
 * @package LMSTBSFY
 * @author Yehuda T. Deutsch <yeh@uda.co.il>
 * @copyright (C) 2013, Yehuda T. Deutsch <yeh@uda.co.il>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
define('LMSTBSFY', TRUE);

if (!empty($_POST)) {
  require_once 'post.php';
}

$title = 'let me search that bullshit for you';
// TODO: add meta content, keywords, description
?>
<!DOCTYPE html>
<html class="no-js" dir="ltr" lang="en" xml:lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="img/bs_logo_16.png">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.css" media="screen">
    <link rel="stylesheet" href="css/app.css" media="screen">
  </head>
  <body>
    <div id="page">
      <div id="header-wrapper"><header id="header">
        <h1><a href="./" class="text-primary" title="go home"><?php echo $title; ?></a></h1>
      </header></div>
      <div id="content-wrapper" class="col-md-8 col-md-offset-2"><div id="content">
        <form id="lmstbsfy-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" role="form">
          <div id="query-field" class="form-collapse">
            <label for="lmstbsfy-engine">Search engine</label>
            <select name="engine" id="lmstbsfy-engine" class="form-control input-lg has-qtip" title="Select search engine">
              <option value="google">Google</option>
              <option value="bing">Bing</option>
              <option value="ask">Ask</option>
              <option value="ddg">DuckDuckGo</option>
              <option value="yahoo">Yahoo</option>
            </select>
            <label for="lmstbsfy-query">Query string</label>
            <input type="text" name="query" id="lmstbsfy-query" class="form-control input-lg has-qtip" title="Enter 3 characters at least" placeholder="<?php echo $title; ?>" autofocus>
            <button type="submit" id="lmstbsfy-submit" class="btn btn-default btn-lg has-qtip" title="Hit Go to search">Go</button>
          </div>
        </form>
      </div></div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.min.js"></script><![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>