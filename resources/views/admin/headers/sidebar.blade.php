<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/administrator" class="brand">
			<!-- <i class='bx bxs-smile  bx-lg'></i> -->
			<span class="text mt-5 ms-5">Oyil Photography</span>
		</a>
		<ul class="side-menu top">
			<li class="{{'administrator' == request()->path() ? 'active' : ''}}">
				<a href="/administrator">
					<i class='bx bxs-dashboard bx-sm' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{'administrator/enquiry' == request()->path() ? 'active' : ''}}">
				<a href="/administrator/enquiry/">
					<i class='bx bxs-doughnut-chart bx-sm'></i>
					<span class="text">Enquiry</span>
				</a>
			</li>
            
            <li class="{{'add-walkin' == request()->path() ? 'active' : ''}}">
				<a href="/add-walkin">
					<i class='bx bxs-message-dots bx-sm'></i>
					<span class="text">Walk In</span>
				</a>
			</li>
			
		</ul>

		<ul class="side-menu bottom">
			<li>
				<a href="/administrator/password/">
					<i class='bx bxs-cog bx-sm bx-spin-hover' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/logout" class="logout">
					<i class='bx bx-power-off bx-sm bx-burst-hover' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->