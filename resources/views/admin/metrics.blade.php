	<!-- CONTENT -->
	<section id="content">


		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			
			<ul class="box-info">
				<li>
					<i class='bx bxs-message-square-dots'></i>
					<span class="text">
						<h3>{{ $totalEnquiries }}</h3> <!-- Dynamic Value -->
						<p>Total Enquiries</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-hourglass'></i>
					<span class="text">
						<h3>{{ $pendingEnquiries }}</h3> <!-- Dynamic Value -->
						<p>Pending Enquiries</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-bell-ring'></i>
					<span class="text">
						<h3>{{ $newEnquiries }}</h3> <!-- Dynamic Value -->
						<p>New Enquiries</p>
					</span>
				</li>
			</ul>
			


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	