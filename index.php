<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="master.css">
	<script type="text/javascript" src="preloader.html"></script>
	<title>JUSTRIGHT - Магазин рок-атрибутики </title>
  </head>
  <body>
  	<div class="preloader">
		<div class="preloader__loader">
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>
			<div class="preloader__line"></div>
			<div class="preloader__line"></div>
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>		
			<div class="preloader__line"></div>
			<div class="preloader__line"></div>
			<div class="preloader__line"></div>
		</div>
	</div>

	<div id="wrapper">

	  <!-- Шапка с логотипом и меню -->
	  <?php include 'modules/header/header.html' ?>


	  <!-- Список категорий товаров -->
	  <?php include 'modules/catalog_list/catalog_list.html' ?>
	  
	  
	  <div onclick="" id="content">
		<iframe id="iframe" src='modules/catalog_list/page.php?id=1'></iframe>
		<iframe id="preview" src="modules/catalog_list/previewGood.php" style="visibility: hidden;" height="98vh" width="98vw"></iframe>
	  </div>
	</div>
	<script type="text/javascript">
	function openPreview(id){
		preview.src = 'modules/catalog_list/previewGood.php?id=' + id;
		setTimeout("preview.style.visibility = 'visible'", 80);
	}

	function closeCart(){
		preview.style.visibility = 'hidden';
	}

	  var iframe_obj = document.getElementById('iframe');
	  var iframe_wrap = document.getElementById('content');

	  function heighIframe()
	  {
		iframe_wrap.style.height = 600;
		setTimeout("changeHeightIframe()", 500);
	  
	  }

	  function changeHeightIframe()
	  {
		var tmp = parseInt(window.frames[0].height) + 45;
		if (tmp > 800)
			iframe_wrap.style = 'height: ' + tmp + 'px';
		else
			iframe_wrap.style = 'height: ' + 200 + 'px';
	  }

	  document.addEventListener(`load`, function() {
			const pe = document.querySelector(`.preloader`);
			pe.style.display = 'none';
		}, 50);
	</script>
  </body>
</html>
