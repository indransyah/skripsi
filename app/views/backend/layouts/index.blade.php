<!DOCTYPE html>
<html lang="en">
	<head>
		@include('backend.layouts.meta')
	</head>
	<body id="top" class="tooltips">
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