<!-- class="{{ Request::segment(1)=="user" ? "active" : "" }}" -->
<div class="sidebar">
	<ul class="stacked-menu">
		<li{{ Request::segment(1)=='home' ? ' class="active"' : '' }}>{{ HTML::link('home', 'Home') }}</li>
		<li><a href="#">Keywords <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='keyword' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='keyword' && Request::segment(2)=='create' ? ' class="active"' : '' }}>{{ HTML::link('keyword/create', 'Add Keyword') }}</li>
				<li{{ Request::segment(1)=='keyword' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('keyword', 'View Keywords') }}</li>
			</ul>
		</li>
		@if(Auth::check())
		<li><a href="#">Criterias <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='criteria' || Request::segment(1)=='subcriteria' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='criteria' && Request::segment(2)=='create' ? ' class="active"' : '' }}>{{ HTML::link('criteria/create', 'Add Criteria') }}</li>
				<li{{ Request::segment(1)=='criteria' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('criteria', 'View Criterias') }}</li>
			</ul>
		</li>
		<li><a href="#">Judgments <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='judgment' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='judgment' && Request::segment(2)=='criteria' ? ' class="active"' : '' }}>{{ HTML::link('judgment/criteria', 'Criteria') }}</li>
				<li{{ Request::segment(1)=='judgment' && Request::segment(2)=='subcriteria' ? ' class="active"' : '' }}>{{ HTML::link('judgment/subcriteria', 'Subcriteria') }}</li>
			</ul>
		</li>
		<li><a href="#">User <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='user' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='user' && Request::segment(3)=='edit' ? ' class="active"' : '' }}>{{ HTML::link('user/profile', 'Profile') }}</li>
				<!-- <li{{ Request::segment(1)=='user' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('user', 'User') }}</li> -->
			</ul>
		</li>
		@endif
	</ul>
</div>