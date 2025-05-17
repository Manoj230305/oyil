	<script>
		const categoryItems = document.querySelectorAll('.gall-cat-item');
		const galleryItems = document.querySelectorAll('.gall-item');
	  
		// Tilt + Glow Effect on category icons
		categoryItems.forEach(item => {
		  const img = item.querySelector('img');
	  
		  item.addEventListener('mousemove', (e) => {
			const rect = item.getBoundingClientRect();
			const x = e.clientX - rect.left;
			const y = e.clientY - rect.top;
			const centerX = rect.width / 2;
			const centerY = rect.height / 2;
			const rotateX = (centerY - y) / 10;
			const rotateY = (x - centerX) / 10;
	  
			img.style.transform = `scale(1.1) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
			img.style.boxShadow = "0 0 15px 4px rgba(255, 105, 180, 0.5)";
		  });
	  
		  item.addEventListener('mouseleave', () => {
			img.style.transform = 'scale(1) rotateX(0deg) rotateY(0deg)';
			img.style.boxShadow = 'none';
		  });
	  
		  // Category Filter
		  item.addEventListener('click', () => {
			const selected = item.getAttribute('data-category');
	  
			// Active state
			categoryItems.forEach(i => i.classList.remove('active'));
			item.classList.add('active');
	  
			galleryItems.forEach(img => {
			  const classList = img.classList;
			  const categoryMatch = classList.contains(`gall-category-${selected}`);
			  if (selected === 'all' || categoryMatch) {
				img.style.display = 'block';
				setTimeout(() => img.style.opacity = '1', 10); // Fade-in animation
			  } else {
				img.style.opacity = '0';
				setTimeout(() => img.style.display = 'none', 200); // Fade-out animation
			  }
			});
		  });
		});
	  
		// Lightbox functionality
		const lightbox = document.getElementById('gall-lightbox');
		const lightboxImg = document.getElementById('gall-lightbox-img');
		const closeBtn = document.getElementById('gall-close');
	  
		galleryItems.forEach(item => {
		  item.addEventListener('click', () => {
			const imgSrc = item.querySelector('img').src;
			lightboxImg.src = imgSrc;
			lightbox.style.display = 'flex';
		  });
		});
	  
		closeBtn.addEventListener('click', () => {
		  lightbox.style.display = 'none';
		});
	  
		lightbox.addEventListener('click', (e) => {
		  if (e.target === lightbox || e.target === lightboxImg) {
			lightbox.style.display = 'none';
		  }
		});
	  </script>

	<script>
		function toggleMenu() {
		document.getElementById("navLinks").classList.toggle("show");
		}
 	</script>
  
  
	  
		

	<!--====== Javascripts & Jquery ======-->
	<!-- jQuery (Vendor) -->
<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>

<!-- SlickNav (Menu) -->
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

<!-- Slick (Carousel) -->
<script src="{{ asset('js/slick.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('js/main(2).js') }}"></script>
