<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>

<!-- Popper.js -->
<script src="{{ asset('js/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>

<!-- Stellar.js -->
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

<!-- AOS -->
<script src="{{ asset('js/aos.js') }}"></script>

<!-- jQuery Animate Number -->
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>

<!-- Scrollax -->
<script src="{{ asset('js/scrollax.min.js') }}"></script>

<!-- Google Maps (with your API key) -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('js/ban/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/ban/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ban/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/ban/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/ban/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/ban/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/ban/circle-progress.min.js') }}"></script>
<script src="{{ asset('js/ban/pana-accordion.js') }}"></script>
<script src="{{ asset('js/ban/main.js') }}"></script>

<!-- jQuery (from CDN, you can also use asset()) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Magnific Popup (from CDN, you can also use asset()) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


	<script>
		var swiper = new Swiper(".swiper-container", {
			effect: "fade",
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>

	<script>
		  function filterGallery(category) {
			const items = document.querySelectorAll('.gallery-item');
			items.forEach(item => {
			if (category === 'all' || item.dataset.category === category) {
				item.style.display = 'block';
			} else {
				item.style.display = 'none';
			}
			});
		}

		window.onload = () => filterGallery('all');
	</script>
  
	<script>
		document.getElementById("glassToggle").addEventListener("click", function () {
		document.getElementById("glassMenu").classList.toggle("show");
		});
	</script>

	  
	<script>
		var radius = 320; // how big of the radius
		var autoRotate = true; // auto rotate or not
		var rotateSpeed = -60; // unit: seconds/360 degrees
		var imgWidth = 220; // width of images (unit: px)
		var imgHeight = 320; // height of images (unit: px)

		// Link of background music - set 'null' if you dont want to play background music
		var bgMusicURL = 'https://api.soundcloud.com/tracks/143041228/stream?client_id=587aa2d384f7333a886010d5f52f302a';
		var bgMusicControls = true; // Show UI music control




		// ===================== start =======================
		// animation start after 1000 miliseconds
		setTimeout(init, 1000);

		var odrag = document.getElementById('drag-container');
		var ospin = document.getElementById('spin-container');
		var aImg = ospin.getElementsByTagName('img');
		var aVid = ospin.getElementsByTagName('video');
		var aEle = [...aImg, ...aVid]; // combine 2 arrays

		// Size of images
		ospin.style.width = imgWidth + "px";
		ospin.style.height = imgHeight + "px";

		// Size of ground - depend on radius
		var ground = document.getElementById('ground');
		ground.style.width = radius * 3 + "px";
		ground.style.height = radius * 3 + "px";

		function init(delayTime) {
		for (var i = 0; i < aEle.length; i++) {
			aEle[i].style.transform = "rotateY(" + (i * (360 / aEle.length)) + "deg) translateZ(" + radius + "px)";
			aEle[i].style.transition = "transform 1s";
			aEle[i].style.transitionDelay = delayTime || (aEle.length - i) / 4 + "s";
		}
		}

		function applyTranform(obj) {
		// Constrain the angle of camera (between 0 and 180)
		if(tY > 180) tY = 180;
		if(tY < 0) tY = 0;

		// Apply the angle
		obj.style.transform = "rotateX(" + (-tY) + "deg) rotateY(" + (tX) + "deg)";
		}

		function playSpin(yes) {
		ospin.style.animationPlayState = (yes?'running':'paused');
		}

		var sX, sY, nX, nY, desX = 0,
			desY = 0,
			tX = 0,
			tY = 10;

		// auto spin
		if (autoRotate) {
		var animationName = (rotateSpeed > 0 ? 'spin' : 'spinRevert');
		ospin.style.animation = `${animationName} ${Math.abs(rotateSpeed)}s infinite linear`;
		}


		// setup events
		var odrag = document.getElementById('drag-container'); // instead of applying on document!

		odrag.onpointerdown = function (e) {
			clearInterval(odrag.timer);
			e = e || window.event;
			var sX = e.clientX,
				sY = e.clientY;

			document.onpointermove = function (e) {
				e = e || window.event;
				var nX = e.clientX,
					nY = e.clientY;
				desX = nX - sX;
				desY = nY - sY;
				tX += desX * 0.1;
				tY += desY * 0.1;
				applyTranform(odrag);
				sX = nX;
				sY = nY;
			};

			document.onpointerup = function (e) {
				odrag.timer = setInterval(function () {
					desX *= 0.95;
					desY *= 0.95;
					tX += desX * 0.1;
					tY += desY * 0.1;
					applyTranform(odrag);
					playSpin(false);
					if (Math.abs(desX) < 0.5 && Math.abs(desY) < 0.5) {
						clearInterval(odrag.timer);
						playSpin(true);
					}
				}, 17);
				document.onpointermove = document.onpointerup = null;
			};

		};


		document.onmousewheel = function(e) {
		e = e || window.event;
		var d = e.wheelDelta / 20 || -e.detail;
		radius += d;
		init(1);
		};
	</script>