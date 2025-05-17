<!-- Start Contact Section -->
		<section class="ftco-section contact-section" id="contact">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-4 heading-section text-center ftco-animate">
					<h2 class="mb-4">Contact Us</h2>
					<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p> -->
				</div>
				</div>

				<div class="row mb-5">
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<div>
							<h3 class="mb-4">Address</h3>
							<p>SVSK Towers, 141, Alagar Kovil Main Rd, Mellur, Tallakulam, Madurai, Tamil Nadu 625002</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-phone2"></span>
						</div>
						<div>
							<h3 class="mb-4">Contact Number</h3>
							<p><a href="tel://1234567920">+91 72009 72631</a></p>
							<p><a href="tel://1234567920">+91 72009 08546</a></p>

						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<div>
							<h3 class="mb-4">Email Address</h3>
							<p><a href="mailto:info@yoursite.com">oyilphotogrphy</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-globe"></span>
						</div>
						<div>
							<h3 class="mb-4">Website</h3>
							<p><a href="#">yoursite.com</a></p>
						</div>
					</div>
				</div>
				</div>

				<div class="row block-9">
					<!-- Contact Form Column -->
					<div class="col-md-6 ftco-animate">
						<form action="{{ route('user.store') }}" method="POST" class="contact-form p-4 p-md-5 py-md-5">
                            @csrf
							<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Your Name" required>
							</div>
							<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="Your Email">
							</div>
							<div class="form-group">
							<input type="number" name="phone-number" class="form-control" placeholder="Phone Number" required>
							</div>
							<div class="form-group">
							<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
							</div>
							<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
							</div>
						</form>
					</div>
				
					<!-- Map Column -->
					<div class="col-md-6 d-flex align-items-stretch">
						<div id="map" class="w-100" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); min-height: 450px;">
						<iframe 
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.9746415090663!2d78.1367507!3d9.9360678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c557ec2a65c3%3A0x1d611b9d70bbbac6!2sOyil%20Photography!5e0!3m2!1sen!2sin!4v1743945304265!5m2!1sen!2sin" 
							width="100%" 
							height="100%" 
							style="border:0;" 
							allowfullscreen="" 
							loading="lazy" 
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
						</div>
					</div>
				</div>
				
			</div>
    	</section>
		<!-- End Contact Section -->
