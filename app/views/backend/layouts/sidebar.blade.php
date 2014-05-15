<div class="sidebar">
	<ul class="stacked-menu">
		<li><a href="#fakelink">Beranda</a></li>
		<li><a href="#fakelink">Keyword <i class="fa fa-angle-down right-icon"></i></a>
			<ul>
				<li>{{ HTML::link('keyword/create', 'Tambah Keyword') }}</li>
				<li>{{ HTML::link('keyword', 'Lihat Keyword') }}</li>
			</ul>
		</li>
		<li><a href="#fakelink">Kriteria <i class="fa fa-angle-down right-icon"></i></a>
			<ul>
				<li>{{ HTML::link('criteria/create', 'Tambah Kriteria') }}</li>
				<li>{{ HTML::link('criteria', 'Lihat Kriteria') }}</li>
			</ul>
		</li>
		<li><a href="#fakelink">Pengaturan <i class="fa fa-angle-down right-icon"></i></a>
			<ul>
				<li><a href="#fakelink">Profil</a></li>
				<li><a href="#fakelink">Pengguna</a></li>
			</ul>
		</li>
	</ul>
</div>