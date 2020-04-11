<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $ApplicationName . ($PageName == "" ? "" : " - " . $PageName) ?></title>
<meta name="theme-color" content="#343A40">

<link rel="stylesheet" href="/src/lib/bootstrap-4.4.1-dist/css/bootstrap.min.css">

<script src="/src/lib/JQuery-3.4.1/JQuery.min.js"></script>
<script src="/src/lib/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script src="/src/lib/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
<style>
  @font-face {
    font-family: siteFont;
    src: url(<?= $LOCATION ?>"/src/font.ttf");
  }

  body{
    /*font-family: siteFont ;*/
  }
</style>
<style type="text/css" media="print">
  @page { size: auto;  margin: 0mm; }

  @media print{@page {size: landscape}}
</style>
