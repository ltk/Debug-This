<?php
/**
 * @package Debug_This
 * @version 0.1
 */
/*
Plugin Name: Debug This
Plugin URI: http://jakedevelopment.com
Description: Adds the function debug_this() to the WordPress environment
Author: Lawson Kurtz
Version: 0.1

*/
global $debug_these;
$debug_these = array();

function debug_this($var = false, $showHtml = true, $showFrom = true) {
		global $debug_these;
		$file = '';
		$line = '';
		$lineInfo = '';
		if ($showFrom) {
			$calledFrom = debug_backtrace();
			$file = substr(str_ireplace(ABSPATH, '', $calledFrom[0]['file']), 1);
			$line = $calledFrom[0]['line'];
		
		$html = <<<HTML
<div class="debug-this-output">
%s
<pre class="debug-this">
%s
</pre>
</div>
HTML;
		$text = <<<TEXT
%s
########## DEBUG ##########
%s
###########################
TEXT;
		$template = $html;
		if (php_sapi_name() == 'cli' || $showHtml === false) {
			$template = $text;
			if ($showFrom) {
				$lineInfo = sprintf('%s (line %s)', $file, $line);
			}
		}
		if ($showHtml === null && $template !== $text) {
			$showHtml = true;
		}
		$var = print_r($var, true);
		if ($showHtml) {
			$template = $html;
			//$var = h($var);
			if ($showFrom) {
				$lineInfo = sprintf('<span><strong>%s</strong> (line <strong>%s</strong>)</span>', $file, $line);
			}
		}
		$debug_these[] = sprintf($template, $lineInfo, $var);
	}
}

function debug_these_output(){
	global $debug_these;
	if(!empty($debug_these)){
		$output = '';
		foreach($debug_these as $debug_this){
			$output .= $debug_this;
		}
		echo $output;
		echo "
	<style type='text/css'>
	.debug-this-output {
		margin:10px;
		padding:10px;
		border:1px solid #666;
		color:#333;
		background:rgba(250,225,0,0.5);
	}
	.debug-this-output span {
		display:inline-block;
		cursor:pointer;
	}
	.debug-this-output span.show {
		margin-bottom:5px;
		padding-bottom:5px;
		border-bottom:1px solid #666;
	}
	</style>
	";

	
}
function debug_these_js_output(){
	echo "
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js'></script>
	<script type='text/javascript'>
		(function($){
			$('.debug-this').hide();
			$('.debug-this-output span').on('click', function(event){
				$(this).toggleClass('show').next().toggle();
			});
		})(jQuery);	
	</script>
	";
	}
}

add_action( 'get_header', 'debug_these_output' );
add_action( 'get_footer', 'debug_these_js_output' );
?>
