<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>.:: Sistema de Gestão de Membros ::.</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('default');
		echo $html->css('themes_dock/default');
		echo $html->css('themes_dock/alphacube');
		echo $html->css('themes_prototype/default');
		echo $html->css('themes_prototype/lighting');
		echo $html->css('themes_prototype/mac_os_x');
		echo $html->css('jquery.fancybox-1.2.6');
		
		echo $html->script('jquery');
		echo $html->script('jquery.form');
		echo $html->script('jquery.jqDock');
		echo $html->script('prototype');
		echo $html->script('effects');
		echo $html->script('window');
		echo $html->script('window_effects');
		echo $html->script('debug');
	?>
	<script>
	WindowUtilities._oldGetPageSize = WindowUtilities.getPageSize;
	WindowUtilities.getPageSize = function() {
		var size = WindowUtilities._oldGetPageSize();
		var dockHeight = $('menu').getHeight();

		size.pageHeight -= dockHeight;
		size.windowHeight -= dockHeight;
		return size;
	}; 
	jQuery(document).ready(function($){
		// set up the options to be used for jqDock...
		var dockOptions =
			{ align: 'bottom' // horizontal menu, with expansion UP from a fixed BOTTOM edge
			, labels: true  // add labels (defaults to 'tl')
			};
		// ...and apply...
		$('#menu').jqDock(dockOptions);
	});
	function win(janela,url){
		
		var win = new Window({className: "mac_os_x", blurClassName: "blur_os_x", title: "Sample"+janela, width:700, height:400, top: 10, left:10,destroyOnClose: false, hideEffect:Element.hide,showEffect:Element.show, maximizable: false}); 
		win.setContent('win'+janela, true, true);
		win.setDestroyOnClose(); 
		win.showCenter();
		win.setConstraint(true, {left:10, right:20})
		win.toFront
		myObserver = { 
			onDestroy: function(eventName, win) { 
				if (win == contentWin) { 
					$('container').appendChild($('win'+janela)); 
					contentWin = null; 
					Windows.removeObserver(this); 
				} debug(eventName + " on " + win.getId()) 
			} 
		} 
		Windows.addObserver(myObserver);
		
		
		
	}
	</script>
</head>
<body>
<?php echo $content_for_layout; ?>
</body>
</html>