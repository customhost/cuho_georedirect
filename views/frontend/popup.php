<!-- cuho_georedirect - start -->
<script scr="{site_url}/system/expressionengine/third_party/cuho_georedirect/views/frontend/jquery.min.js"></script>
<script>
	jQuery( function($) {
		$(document).ready( function() {
			$(".cuho_georedirect_close_a").click( function() {
				$("#cuho_georedirect_popup").slideUp( 300 );
			});
			
			setTimeout(
				function() {
					$("#cuho_georedirect_popup").fadeIn( 500 );
				},
				1000
			);
		});
	});
</script>

<style>
	#cuho_georedirect_popup {
		position: absolute;
		width: 100%;
		
		padding-bottom: 20px;
		
		z-index: 200;
		
		display: none;
	}
	
	#cuho_georedirect_popup a {
		color: #00C8FF;
		text-decoration: underline;
	}
	
	#cuho_georedirect_popup a:hover {
		color: #00B3E4;
		text-decoration: none;
	}
	
	#cuho_georedirect_bg {
		position: absolute;
		width: 100%;
		height: 100%;
		background: #000000;
		opacity: 0.85;
		
		top: 0px;
		left: 0px;
		
		z-index: 210;
	}
	
	#cuho_georedirect_content {
		position: relative;
		padding: 0px 15%;
		
		color: #FFFFFF;
		z-index: 220;
	}
	
	#cuho_georedirect_content h4 {
		color: #FFFFFF;
		margin: 20px 0px 5px 0px ;
	}
	
	#cuho_georedirect_close {
		margin: 20px 0px;
	}
	
	#cuho_georedirect_close a {
		margin: 0px 10px;
	}
	
	#cuho_georedirect_close a.first {
		margin-left: 0px;
	}
	
	#cuho_georedirect_content .georedirect_message {
		font-size: inherit;
	}
	
	#cuho_georedirect_content .georedirect_notice {
		font-size: 90%;
		
		color: #BFBFBF;
	}
	
	#cuho_georedirect_content .georedirect_link {
		margin: 5px 0px;
		font-size: inherit;
	}
</style>

<div id="cuho_georedirect_popup">
	<div id="cuho_georedirect_content">
		<?php
			if( !empty( $title) ) {
				echo "<h4>{$title}</h4>";
			}
			
			$message = nl2br( $message );
			
			echo "<div class=\"georedirect_message\">{$message}</div>";
			echo "<div class=\"georedirect_link\">{$url}</div>";
		?>
		
		<div id="cuho_georedirect_close">
			<a class="first" href="{site_url}?cuho_georedirect=redirect"><?=lang('cuho_georedirect_module_redirect_me');?></a>
			|
			<a class="cuho_georedirect_close_a" href="#close"><?=lang('cuho_georedirect_module_not_now');?></a>
			|
			<a href="{site_url}?cuho_georedirect=never"><?=lang('cuho_georedirect_module_never_ask');?></a>
		</div>
		
		<div class="georedirect_notice">
			<?=lang('cuho_georedirect_module_notice'); ?>
			<br>
			<?=lang('cuho_georedirect_module_cookie'); ?>
		</div>
	</div>
	
	<div id="cuho_georedirect_bg"></div>
</div>
<!-- cuho_georedirect - end -->