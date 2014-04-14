<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

	<title>/{{ $board }}/.fap.webm | Porn of the future</title>
	<meta name="description" content="WebM aggregator from 4chan. Welcome to porn of the future." />

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,700" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.3/css/normalize.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.3/css/foundation.min.css" />

	<link rel="stylesheet" href="{{ asset('css/core.css') }}" />
	<link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" />

	<script src="{{ asset('js/library/modernizr.js') }}"></script>

	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body ng-controller="MainCtrl" itemscope itemtype="http://schema.org/WebPage">

<!-- HEADER -->
<div id="header" class="clearfix">
	<nav class="small-12 columns text-center" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<a href="/" id="logo" class="hide-for-small left" itemprop="url">
			<span itemprop="name">fap.webm</span>
		</a>

		<a href="/" data-title="Animated Gif" {{ Nav::isActive('/', 'gif') }} itemprop="url">
			<i class="fa fa-home"></i> 
			<span itemprop="name">/gif/</span>
		</a>

		<a href="/hc/" data-title="Hardcore" {{ Nav::isActive('hc') }} itemprop="url">
			<span itemprop="name">/hc/</span>
		</a>

		<a href="/b/" data-title="Random" {{ Nav::isActive('b') }} itemprop="url">
			<span itemprop="name">/b/</span>
		</a>

		<a href="/s/" data-title="Sexy Beautiful Women" {{ Nav::isActive('s') }} itemprop="url">
			<span itemprop="name">/s/</span>
		</a>

		<a href="/hm/" data-title="Handsome Men" {{ Nav::isActive('hm') }} itemprop="url">
			<span itemprop="name">/hm/</span>
		</a>

		<a href="/h/" data-title="Hentai" {{ Nav::isActive('h') }} itemprop="url">
			<span itemprop="name">/h/</span>
		</a>

		<a href="/d/" data-title="Hentai/Alternative" {{ Nav::isActive('d') }} itemprop="url">
			<span itemprop="name">/d/</span>
		</a>

		<a href="/u/" data-title="Yuri" {{ Nav::isActive('u') }} itemprop="url">
			<span itemprop="name">/u/</span>
		</a>

		<a href="/y/" data-title="Yaoi" {{ Nav::isActive('y') }} itemprop="url">
			<span itemprop="name">/y/</span>
		</a>

		<a href="/r/" data-title="Request" {{ Nav::isActive('r') }} itemprop="url">
			<span itemprop="name">/r/</span>
		</a>

		<form action="javascript:;" method="post" class="hide-for-small right">
			<input type="search" placeholder="Search in /{{ $board }}/&hellip;" value="" autocomplete="off" />
		</form>
	</nav>
</div>

<!-- CONTENT -->
<div id="content" class="row full-width" itemscope itemtype="http://schema.org/MainContentOfPage">
	@yield('content')
</div>

<!-- FOOTER -->
<div id="footer" class="clearfix" itemscope itemtype="http://schema.org/WPFooter">
	<div class="small-12 columns text-center" itemprop="description">
		All content is provided by 4chan and their public API.
	</div>
</div>

<!-- Scripts -->
<script data-main="/js/core" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.11/require.min.js"></script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-10405648-12', 'fapwebm.com');
ga('send', 'pageview');
</script>

</body>
</html>