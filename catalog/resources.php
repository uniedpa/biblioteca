<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
   require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "cataloging";
  $nav = "resources";
  $helpPage = "resources";
  //$focus_form_name = "cutter";
  $focus_form_field = "searchText";
  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  require_once("../vendor/php-markdown-lib-1.8.0/Michelf/Markdown.inc.php");
  require_once("../vendor/php-markdown-lib-1.8.0/Michelf/MarkdownExtra.inc.php");
  $loc = new Localize(OBIB_LOCALE,$tab);
?>

<?php
  echo "<h3>Recursos para Catalogación</h3>";
?>

<?php
  use Michelf\Markdown;  
  $text = file_get_contents('resources.md');
  $html = Markdown::defaultTransform($text);
  echo $html;
?>

<?php include("../shared/footer.php");
