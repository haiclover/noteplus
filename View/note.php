<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Note Raw</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			overflow-x: auto;
		}
		td.hljs-ln-numbers {
			text-align: center;
			color: #ccc;
			border-right: 1px solid #999;
			vertical-align: top;
			padding-right: 5px;

			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		td.hljs-ln-code {
			padding-left: 10px;
		}

		code {
			white-space: pre-wrap;
			overflow: auto;
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/highlightjs@9.16.2/styles/monokai-sublime.min.css"> 
</head>
<body>
	<main>
		<div class="ui top attached header">
			<div class="ui left aligned grid">
				<?php echo @$name; ?>
			</div>
			<div class="ui right aligned grid">
				<div class="column">
					<a class="ui basic button" href="<?php echo @$homepage; ?>">
					  <i class="home icon"></i>
					  Home
					</a>
					<a class="ui basic button" href="<?php echo @$raw; ?>">
					  <i class="clipboard outline icon"></i>
					  RAW
					</a>
					<a class="ui basic button" href="<?php echo @$download; ?>">
					  <i class="download icon"></i>
					  DOWNLOAD
					</a>
					<a class="ui basic button" href="<?php echo @$embed; ?>">
					  <i class="share icon"></i>
					  EMBED
					</a>
					<a class="ui basic button" href="<?php echo @$print; ?>" target="_blank">
					  <i class="print icon"></i>
					  PRINT
					</a>
				</div>
			</div>

			<div class="ui one column">
				<div class="column">
					<pre><code class="javascript"><?php echo @$content ?></code></pre>
				</div>
			</div>
		</div>
		
	</main>
	
	<script src="https://cdn.jsdelivr.net/npm/highlightjs@9.16.2/highlight.pack.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.7.0/highlightjs-line-numbers.min.js"></script>
	<script>
		hljs.initHighlightingOnLoad();
		hljs.initLineNumbersOnLoad();
	</script>
</body>
</html>