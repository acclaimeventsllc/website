@include('partials/head')
@yield('stylesheets')
@yield('inline')

@include('partials/ieshim')

@yield('jstop')
</head>

<body>

	<header>

		<nav class="nav nav-tabs nav-main">
			<div class="modal-menu">

				<!-- Main Navigation -->
				<div class="menu menu-main acclaim-box-black">
					<ul>
@foreach ($navs as $nav)
						<li><a class=" menu-item @if (!empty($nav->styles)){{ $nav->styles }}@endif @if ('/'.$options->active_menu === $nav->href || ($options->active_menu === 'home' && $nav->href === '/'))menu-active @endif" href="{{ $nav->href }}" title="@if (!empty($nav->title)){{ $nav->title }}@else{{ $nav->content }} @endif">{{ $nav->content }}</a></li>
@endforeach
					</ul>
				</div>

@if (is_array($sub) && count($sub) > 0)
				<!-- Page-specific Sub-navigation -->
				<div class="menu menu-page">
					<ul>
						<li></li>
@foreach ($sub as $item)
						<li><a href="{{ $item->href }}" title="@if(!empty($item->title)){{ $item->title }}@else{{ $item->content }}@endif">{{ $item->content }}</a></li>
@endforeach
					</ul>
				</div>

@endif
			</div>

			<!-- Mobile-friendly pull-tab for navigation -->
			<a href="#" class="pull no-move" title="Menu"><i class="fa fa-bars"></i><span>Menu</span></a>

		</nav>

		<div id="logo">
			<a href="/" title="Acclaim Events Home">
				<img src="/images/logos/acclaim-events.png" alt="Acclaim Events">
			</a>
		</div>

	</header>

@if (!empty($options->show_hero_image) && (bool)$options->show_hero_image === true)
	<!-- Hero Image, Top of Page -->
	<section id="home" class="jumbotron jumbotron-header" style="background-image: url('{{ $options->jumbotron }}');">
		<div>
			<div class="vertical">
				<div class="container">
					<h1 class="acclaim-text acclaim-text-shadow">{{ $options->title }}</h1>
					@yield('subtitle')
				</div>
			</div>
		</div>
	</section>

@endif
	<!-- Main Content -->
@yield('content-01')
@yield('content-02')
@yield('content-03')
@yield('content-04')
@yield('content-05')
@yield('content-06')
@yield('content-07')
@yield('content-08')
@yield('content-09')
@yield('content-10')
@yield('content-11')
@yield('content-12')
@yield('content-13')
@yield('content-14')
@yield('content-15')

@include('partials/footer')
	<!-- Scripts -->
	<script id="jquery" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script id="skrollr" src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.29/skrollr.min.js"></script>
	<script id="bootstrap-js" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script id="jquery-menus" src="/js/jquery-menus.js"></script>
@yield('jsbot')
</body>

</html>
