<!DOCTYPE HTML>
<!--
    Broadcast by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>{{ $g->g_title }} {{ Config::get('constants.general.site_name_upper_1') }} - {{ trans('message.site_title.2') }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../css/main.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-KK6BKBHN2Z"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-KK6BKBHN2Z');
		</script>
		<style type="text/css">
			html, body {
				height: 100%;
				margin: 0;
				background-color: #000;
			}
			#iframe-wrapper {
				padding-top: 15px !important;
				min-height: 100%;
				min-width: 100%;
				height: 100% !important;
			}
			#iframe-wrapper-landscape {
				padding-top: 15px !important;
				min-height: 100%;
				min-width: 100%;
				height: 100% !important;
			}
			#ifr_play_game_m {
				width: 100% !important;
				height: 100% !important;
			}
    	</style>
		
    </head>
    <body onload="openFullscreen">

	@if ($g->g_dimension == 0)
		<div id="iframe-wrapper-landscape"><iframe id="ifr_play_game_m" seamless="true" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" webkit-playsinline="true" frameborder="0" scrolling="no" src="{{ $g->g_link }}"></iframe></div>	
	@else
		<div id="iframe-wrapper"><iframe id="ifr_play_game_m" seamless="true" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" webkit-playsinline="true" frameborder="0" scrolling="no" src="{{ $g->g_link }}"></iframe></div>
	@endif	
		<!-- <img src="../images/icons/ic-player.png" id="btn_play_game" onclick="openFullscreen('{{ getOrientationMode($g->g_dimension) }}');" /> -->

	</body>
	
</html>