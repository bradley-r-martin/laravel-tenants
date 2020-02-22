<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Account Suspended</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  </head>
  @include('tenants::css') 
  @include('tenants::suspended.css') 
  <body class="">
    <main id="root">
      <div>
        <div class="status">
          <div class="indicator"></div>
          <div class="indicator pulse"></div>
        </div>
        <h1><strong>Account Suspended</strong></h1>
        <p>This account has been suspended.<br/>Please contact support for help.</p>  
      </div>
    </main>
  </body>
</html>
