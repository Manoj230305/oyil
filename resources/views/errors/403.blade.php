<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>403 | OyilPhotography</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&family=Courier+Prime&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/404.css') }}">
</head>
<body>
<div class="container">
  <!-- Background dots -->
  <div class="background">
    <div class="dot one"></div>
    <div class="dot two"></div>
    <div class="dot three"></div>
  </div>

  <div class="content">
    <div class="error">
      <span class="digit" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">4</span>
      <div class="circle" id="circle">
        <img src="{{ asset('images/rotational/IMG_0452.jpg') }}" class="orbit" style="--i:0">
        <img src="{{ asset('images/404/IMG_2229.jpg') }}" class="orbit" style="--i:1">
        <img src="{{ asset('images/404/IMG_2471.jpg') }}" class="orbit" style="--i:2">
        <img src="{{ asset('images/404/IMG_3153.jpg') }}" class="orbit" style="--i:3">
        <img src="{{ asset('images/404/Wallpaper2.jpg') }}" class="orbit" style="--i:4">
        <img src="{{ asset('images/404/IMG_2471.jpg') }}" class="orbit" style="--i:5">
      </div>
      <span class="digit" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">4</span>
    </div>


    <div class="text">
      <h1>Forbidden</h1>
      <p>You Can't access this resource. Contact Administrator</p>
    </div>

    <div class="buttons">
      <!-- <a href="/" class="btn home">🏠 Take Me Back Home</a> -->
      <a href="/" class="btn back">⬅ Go Back</a>
    </div>
  </div>
</div>
<script src="{{ asset('js/404.js') }}"></script>
</body>
</html>
