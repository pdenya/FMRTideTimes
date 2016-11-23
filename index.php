<?
	$api_url = "http://api.wunderground.com/api/e5e2af67a7de2540/tide/q/CA/Moss_Beach.json";

	$curl = curl_init();
	curl_setopt ($curl, CURLOPT_URL, $api_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);
	curl_close($curl);
	
	$result = json_decode($result, true);

?>
<html>
	<head>
		<title>Good Times to Visit Fitzgerald Marine Reserve</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Good Times to Visit Fitzgerald Marine Reserve</h1>

			<hr>
			<table class="table table-bordered text-center">
			<tr>
				<td>
					<p><b>Time/Date</b></p>
				</td>
				<td>
					<p><b>Predicted tide level</b></p>
				</td>
			</tr>

			<? foreach($result['tide']['tideSummary'] as $i => $tide) { ?>
				<? if ($tide['data']['height'] && intval($tide['data']['height']) < 2) { ?>
					<tr class="<?= (intval($tide['data']['height']) > 0) ? 'not-as-good' : 'bg-success' ?>">
						<td>
							<p><?= $tide['date']['pretty'] ?></p>
						</td>
						<td>
							<p><?= $tide['data']['height'] ?></p>
						</td>
					</tr>
				<? } ?>
			<? } ?>	
			</table>
		</div>
		<style type="text/css">
			.not-as-good {
				color: #999;
			}
		</style>
		<script type="text/javascript">//<![CDATA[
        // Google Analytics for WordPress by Yoast v4.3.3 | http://yoast.com/wordpress/google-analytics/
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11178484-2']);
			            _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        //]]></script>
	</body>
</html>