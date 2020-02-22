<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Domain Connected</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  </head>
  @include('tenants::css') 
  @include('tenants::parked.css') 
  <body>
    <main id="root">
      <div>
        <div id="map"></div>
        <h1>DOMAIN PORTED</h1>
        <ul class="pathway">
          <li>
            <h4><strong><?=$_SERVER['HTTP_HOST'];?></strong></h4>
          </li>
          <li class="pathway__bar">
            <span></span>
          </li>
          <li>
            <h4><?=env('APP_URL');?></h4>
          </li>
        </ul>
        <p>Your domain has been successfully ported.</p>  
      </div>
    </main>
  </body>
</html>
