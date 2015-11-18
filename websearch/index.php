<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "websearch";
  $nav = "home";
  $helpPage = "websearch";
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE, $tab);
  require_once("../opac/header_opac.php");
?>

<h1><?php echo $loc->getText("websearch_Header");?></h1>
<?php echo $loc->getText("websearch_WelcomeMsg");?>

<table class="primary">
<tr>
<td>
<div>
<a href="https://scholar.google.com/" target="_blank">
<img style="border:none;float:left;margin-right:10px;margin-top: 20px;" src="images/logo-google-scholar.png"></a>
<div style="float:left;width:400px;margin-top: 30px;">
<!--"https://scholar.google.com/scholar?hl=es&q=andragog%C3%ADa&btnG=&lr=" -->
<label for="basicSearchBox" style="font-size:8pt;font-weight:bold;color:#444444;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;">Busca Art&iacute;culos y Libros en Google Acad&eacute;mico</label>
<form id="basicSearch" name="basicSearch" action="https://scholar.google.com/scholar?hl=es" method="get" target="_blank">
<input name="q" id="basicSearchBox" type="text" value="" maxlength="200" placeholder="Entre una o mas palabras">
<input type="submit" value="Buscar" style="background-color:#E5E3CB;border-color:#CAC594;border-style:solid;border-width:0pt 1px 1px 0pt;color:#71672D;font-size:.85em;margin:3px 2px;padding:0.0em;text-decoration:none;"/>
</form>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div>
<a href="http://www.scielo.org/" target="_blank">
<img style="margin-top:10px; border:none;float:left;margin-right:10px;" src="images/logo-scielo.jpg">
</a>
<div style="float:left;width:500px;margin-top:10px;">
<label for="basicSearchBox" style="font-size:8pt;font-weight:bold;color:#444444;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;">Busca en SciELO</label>
<form name="searchForm" id="searchForm" action="http://search.scielo.org/" method="GET" target="_blank">
<div class="searchForm">
<input name="output" id="output" value="site" type="hidden">
<input name="lang" id="lang" value="es" type="hidden">
<input name="from" id="from" value="0" type="hidden">
<input name="sort" id="sort" value="" type="hidden">
<input name="format" id="format" value="abstract" type="hidden">
<input name="count" id="count" value="20" type="hidden">
<input name="fb" id="fb" value="" type="hidden">
<input name="page" id="page" value="1" type="hidden">
<select name="index" class="inputText" id="selectIndex">
<option value="" selected="true">Todos los índices</option>
<option value="year_cluster">Año</option>
<option value="ab">Resumen</option>
<option value="au">Autor</option>
<option value="sponsor">Financiador</option>
<option value="ta">Periódico</option>
<option value="ti">Título</option>
</select>
<input name="q" id="q" class="inputText" title="Entre una o mas palabras" placeholder="Entre una o mas palabras" type="text">
<input type="submit" value="Buscar" style="background-color:#E5E3CB;border-color:#CAC594;border-style:solid;border-width:0pt 1px 1px 0pt;color:#71672D;font-size:.85em;margin:3px 2px;padding:0.0em;text-decoration:none;"/>
<br>
<label for="selectWhere" class="hide">Elija el campo de búsqueda</label>
<select name="where" class="inputText" id="selectWhere">

<option value="ORG" selected="true">Regional</option>

<option value="ARG">Argentina</option>

<option value="SCL">Brasil</option>

<option value="CHL">Chile</option>

<option value="COL">Colombia</option>

<option value="CRI">Costa Rica</option>

<option value="CUB">Cuba</option>

<option value="ESP">España</option>

<option value="MEX">México</option>

<option value="PER">Perú</option>

<option value="PRT">Portugal</option>

<option value="VEN">Venezuela</option>

<option value="SPA">Salud Pública</option>

<option value="SSS">Social Sciences</option>

<option value="SZA">Sudáfrica</option>
</select>
<div class="actions">
<a href="http://search.scielo.org/advanced/?lang=es" target="_blank">Búsqueda Avanzada</a>
</div>
</div>
</form>
</div>
</div>
  </td>
  </tr>
<tr>
	<td>
<div>
<a href="http://www.jstor.org" target="_blank">
<img style="border:none;float:left;margin-right:10px;margin-top: 10px;" src="http://widgets.jstor.org/wsearch/jstor_logo_small.gif">
</a>
<div style="float:left;width:400px;margin-top:20px;">
<!--"Your use of the JSTOR Search Widget indicates your acceptance of JSTOR's Terms and Conditions of Use available at http://www.jstor.org/page/info/about/policies/terms.jsp. In particular, please be aware of Sections 3.3 and 5.3 of our Terms  and Conditions of Use as these pertain to Access Software." -->
<label for="basicSearchBox" style="font-size:8pt;font-weight:bold;color:#444444;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;">Busca Art&iacute;culos en JSTOR</label>
<form id="basicSearch" name="basicSearch" action="http://widgets.jstor.org/wsearch/searchredirect" method="get" target="_blank">
<input name="searchTerms" id="basicSearchBox" type="text" value="" maxlength="200" placeholder="Entre una o mas palabras">
<input type="submit" value="Buscar" style="background-color:#E5E3CB;border-color:#CAC594;border-style:solid;border-width:0pt 1px 1px 0pt;color:#71672D;font-size:.85em;margin:3px 2px;padding:0.0em;text-decoration:none;"/>
<!-- set proxy info here, if present (e.g. "http://myuniversity.edu/proxy/?url=").If you don't have one, leave blank.-->
<input type="hidden" name="proxyinfo" value=""/>
<!-- count specifies the number of results per page -->
<input type="hidden" name="count" value="25"/> 
<!-- sorigin should be changed to reflect the domain name of your institution (e.g. "umich.edu" or "jstor.org")-->
<input type="hidden" name="sorigin" value="uniedpa.net"/>
</form>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div>
<a href="http://www.redalyc.org/" target="_blank">
<img style="margin-top:40px; border:none;float:left;margin-right:10px;" src="images/logo-redalyc.png">
</a>
<div style="float:left;width:500px;margin-top:20px;">
<!--"200 cortpo 343 ancho" -->
<label for="basicSearchBox" style="font-size:8pt;font-weight:bold;color:#444444;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;">Busca en REDALYC</label>
<iframe src="http://www.redalyc.org/buscador.oa?css=343&amp;embedded=true" style="width: 400px; height: 100px; border: none;" scrolling="no"></iframe>
</div>
</div>
	</td>
	</tr>
</table>
<?php include("../shared/footer.php");
