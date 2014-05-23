<!DOCTYPE html>
<html lang="en">
	<head>
		@include('backend.layouts.meta')
		<title>Keyword Planner - Google AdWords Keyword Planner</title>
		<!-- MAIN CSS -->
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'> -->
		{{ HTML::style('assets/css/backend.css') }}
	</head>
	<body id="top" class="tooltips" style="background-color: #F5F7FA;">
	<!-- <body style="background-color: #F5F7FA;"> -->
	
		@include('backend.layouts.navbar')
		<div class="page-wrapping">
			@include('backend.layouts.sidebar')
			<div class="content-page">
				<div class="content-page-inner">
					<div class="container-fluid">
					@yield('content')
					</div><!-- /.container-fluid" -->
				</div><!-- /.content-page-inner -->
			</div><!-- /.content-page -->
		</div><!-- /.page-wrapping -->
		@include('backend.layouts.script')
	</body>
</html>