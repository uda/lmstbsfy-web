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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap-theme.min.css" media="screen">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.css" media="screen">
    <link rel="stylesheet" href="css/app.css" media="screen">
  </head>
  <body>
    <div id="page-wrapper"><div id="page">
      <!-- Header -->
      <div id="header-wrapper"><header id="header">
        <h1><a href="./" class="text-primary" title="go home"><?php echo $title; ?></a></h1>
      </header></div>
      <!-- navigation -->
      <div id="navigation-wrapper"><nav class="navbar navbar-default navbar-fixed-top">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Credits <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>Developed by <a href="http://0x59.net/" target="_blank"><strong>Yehuda T. Deutsch</strong></a></li>
              <li class="divider"></li>
              <li>Based on work by <a href="http://galman33.com" target="_blank"><strong>Gal Pasternak</strong></a></li>
              <li class="divider"></li>
              <li>Idea of <a href="http://sharp-thinking.com" target="_blank"><strong>Gilad Diamant</strong></a></li>
              <li class="divider"></li>
              <li>Font <strong>Alef</strong> by <a href="http://alef.hagilda.com" target="_blank"><strong>Hagilda</strong></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="https://github.com/uda/lmstbsfy-web/issues" target="_blank"><strong>GitHub Issues</strong></a></li>
              <li class="divider"></li>
              <li>License <a href="http://www.opensource.org/licenses/mit-license.php" target="_blank"><strong>MIT License</strong></a></li>
            </ul>
          </li>
          <li class="dropdown hidden-sm hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="https://chrome.google.com/webstore/detail/let-me-search-that-bs-for/oohbmjeppkjjjfdjlkhpplceokggmgel" target="_blank"><strong>Chrome Extension</strong></a></li>
            </ul>
          </li>
        </ul>
      </nav></div>
      <!-- Content -->
      <div id="content-wrapper" class="col-md-8 col-md-offset-2"><div id="content">
        <form id="lmstbsfy-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" role="form">
          <div id="query-field" class="form-collapse">
            <div class="lmstbsfy-wrapper engine">
              <label for="lmstbsfy-engine">Search engine</label>
              <select name="engine" id="lmstbsfy-engine" class="form-control input-lg has-qtip" title="Select search engine">
                <option value="google">Google</option>
                <option value="bing">Bing</option>
                <option value="ask">Ask</option>
                <option value="ddg">DuckDuckGo</option>
                <option value="yahoo">Yahoo</option>
              </select>
            </div>
            <div class="lmstbsfy-wrapper query">
              <label for="lmstbsfy-query">Query string</label>
              <input type="text" name="query" id="lmstbsfy-query" class="form-control input-lg has-qtip" title="Enter 3 characters at least" placeholder="<?php echo $title; ?>" autofocus>
              <p id="lmstbsfy-beta">*Beta</p>
            </div>
            <div class="lmstbsfy-wrapper submit">
              <button type="submit" id="lmstbsfy-submit" class="btn btn-default btn-lg has-qtip" title="Hit Go to search">Go</button>
            </div>
          </div>
        </form>
      </div></div>
    </div></div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.min.js"></script><![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-url-parser/2.3.1/purl.min.js"></script>
    <script src="js/app.js"></script>
    <?php require_once 'analytics.php'; ?>
  </body>
</html>