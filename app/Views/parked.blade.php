<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Domain Connected</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  </head>
  <style type="text/css">
    #root,
    body,
    html,
    noscript {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #root{
      display:flex;
      height:100%;
      width:100%;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
 
    @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
    body {
      font-family: 'Montserrat', sans-serif;
      color: rgba(0, 0, 0, 0.9);
    }
    p{
      max-width: 400px;
      text-align: center;
      margin-left:auto;
      margin-right: auto;
      line-height: 25px;
      letter-spacing: 1px;
    }
    #map {
      display: block;
      position: relative;
      margin:0px auto;
      width: 110px;
      height: 110px;
      border: 2px solid #737373;
      border-radius: 50%;
      overflow: hidden;
      background: url(https://41.media.tumblr.com/975751d2465261bd30ed1a1f0a4b0cff/tumblr_n3u1lcYs9v1qg19vao1_r1_1280.png);
      background-size: auto 100%;
      -webkit-animation: anime 9s linear infinite; 
      animation: anime 9s linear infinite; 
    }
    @keyframes anime {
      to { background-position-x: 228px; }
    }
  </style>
  <body class="">
    <main id="root">
      <div>
        <div id="map"></div>
        <h1>Connected</h1>
        <p>Your domain has successfully finished propagating to the SIHQ booking platform.</p>  
      </div>
    </main>
  </body>
</html>
