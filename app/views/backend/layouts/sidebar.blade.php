<!-- class="{{ Request::segment(1)=="user" ? "active" : "" }}" -->
<div class="sidebar">
	<ul class="stacked-menu">
		<li{{ Request::segment(1)=='home' ? ' class="active"' : '' }}>{{ HTML::link('home', 'Home') }}</li>
		<li><a href="#fakelink">Keywords <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='keyword' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='keyword' && Request::segment(2)=='create' ? ' class="active"' : '' }}>{{ HTML::link('keyword/create', 'Add Keyword') }}</li>
				<li{{ Request::segment(1)=='keyword' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('keyword', 'View Keywords') }}</li>
			</ul>
		</li>
		<li><a href="#fakelink">Criterias <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='criteria' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='criteria' && Request::segment(2)=='create' ? ' class="active"' : '' }}>{{ HTML::link('criteria/create', 'Add Criteria') }}</li>
				<li{{ Request::segment(1)=='criteria' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('criteria', 'View Criterias') }}</li>
			</ul>
		</li>
		<li><a href="#fakelink">Settings <i class="fa fa-angle-down right-icon"></i></a>
			<ul{{ Request::segment(1)=='user' ? ' style="display: block;"' : '' }}>
				<li{{ Request::segment(1)=='user' && Request::segment(3)=='edit' ? ' class="active"' : '' }}>{{ HTML::link('user/profile', 'Profile') }}</li>
				<!-- <li{{ Request::segment(1)=='user' && Request::segment(2)=='' ? ' class="active"' : '' }}>{{ HTML::link('user', 'User') }}</li> -->
			</ul>
		</li>
	</ul>
</div>