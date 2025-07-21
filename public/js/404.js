const circle = document.getElementById('circle');
const images = Array.from(circle.querySelectorAll('img'));
const radius = 100; // adjust for spacing

images.forEach((img, i) => {
  const angle = (i / images.length) * 360;
  const rad = angle * (Math.PI / 180);

  const x = Math.cos(rad) * radius;
  const y = Math.sin(rad) * radius;

  img.style.transform = `translate(${x}px, ${y}px) rotate(${-angle}deg)`;
});
