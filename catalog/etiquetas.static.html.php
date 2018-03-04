<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
   require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "cataloging";
  $nav = "etiquetas";
  $helpPage = "etiquetas";
  //$focus_form_name = "cutter";
  $focus_form_field = "searchText";
  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);
?>

<?php
  echo "
  <script type=\"text/javascript\">
  function zPrint(oTgt)
  {
    oTgt.focus();
    oTgt.print();
            }
  function refreshIframe() {
    var ifr = top.document.getElementById(\"etiquetas\");
    console.log(ifr.src);
    ifr.contentWindow.location.href = ifr.src;
    //ifr.src = ifr.src;
  }
  </script>

   <body>
    <h3 style=\"display: inline;\">Etiquetas para identificaci&oacute;n&nbsp;</h3><input type='button' onclick='refreshIframe();' value='Refrescar' /><input type=\"button\" value=\"Imprimir\" onclick=\"zPrint(etiquetas);\" />
    <iframe name='etiquetas' id='etiquetas' width=\"100%\" height=\"100%\" frameborder=0 src=\"/www/catalog/etiquetas.html\"></iframe>
    </body>"
?>

<?php
?>

<?php include("../shared/footer.php");
