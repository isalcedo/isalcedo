<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// parameters (template)
$modernizr = $this->params->get('modernizr');
$bootstrap = $this->params->get('bootstrap');
$zurb = $this->params->get('zurb');
$zurbicons = $this->params->get('zurbicons');
$pie = $this->params->get('pie');

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css.php?b='.$bootstrap.'&amp;z='.$zurb.'&amp;zi='.$zurbicons.'&amp;v=1');
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js'); // <- this script must be in the head

// unset scripts, put them into /js/template.js.php to minify http requests
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php?b='.$bootstrap.'&amp;z='.$zurb.'&amp;v=1'; ?>"></script>
  <jdoc:include type="head" />
  <link href='http://fonts.googleapis.com/css?family=Kotta+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> <!-- mobile viewport -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <?php if ($pie==1) : ?>
    <!--[if lte IE 8]>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
      <![endif]-->
    <?php endif; ?>
    <!--Analytics -->
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35657202-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    </script>
    <!-- End Analytics-->
  </head>

  <body class="<?php echo $pageclass; ?>">
    <!--<jdoc:include type="modules" name="debug" />-->
    <div class="row">
      <header class="twelve columns">
            <h1 class="titulo"><?php echo $app->getCfg('sitename'); ?></h1>
            <h2 class="sub-titulo">[ Diseño Web Personalizado para Joomla ]</h2>
      </header>
    </div>
    <div class="row">
      <div class="twelve columns">
            <jdoc:include type="modules" name="menu" />
      </div>
    </div>
    <div class="cien">
      <div class="row">
        <div class="twelve columns">
          <jdoc:include type="modules" name="slogan" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        <jdoc:include type="modules" name="banner" />
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        <jdoc:include type="modules" name="bread" />
      </div>
    </div>
    <div class="row contenedor">
      <div class="eight columns principal">
        <jdoc:include type="component" />
      </div>
      <div class="four columns side">
        <jdoc:include type="modules" name="der-1" style="xhtml" />
      </div>
    </div>
    <div class="row">
      <footer>
          <jdoc:include type="modules" name="footer" />
      </footer>
    </div>
  </body>

  </html>

