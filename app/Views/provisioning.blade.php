<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Provisioning</title>
    <meta name="Description" content="Web Application" />
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
    .warning {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      background: linear-gradient(to bottom, #3f3f3f 0, #1f1f1f 100%);
      width: 100%;
      height: 100%;
      font-family: 'Open Sans', Helvetica, sans-serif;
      font-size: 14px;
      color: #222;
    }
    .warning__dialog {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      border-radius: 5px;
      cursor: pointer;
      width: 380px;
      text-align: center;
      animation: show 0.5s ease-in-out both;
    }
    .warning__title {
      font-size: 25px;
      padding: 10px;
      padding-bottom: 5px;
    }
    .warning__content {
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 5px 30px 20px;
    }
    .warning__button {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #ec0909;
      width: 100%;
      border-bottom-right-radius: 5px;
      border-bottom-left-radius: 5px;
      height: 40px;
      text-transform: uppercase;
      text-decoration: none;
      color: #fff;
    }
    .warning__code {
      display: block;
      margin: 20px;
      color: #ec0909;
    }
    @keyframes show {
      0% {
        transform: scale(0);
      }
      60% {
        transform: scale(1.2);
      }
      90% {
        transform: scale(0.95);
      }
      100% {
        transform: scale(1);
      }
    }
    #root{
      display:flex;
      height:100%;
      width:100%;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
 

  
    <?php include(base_path('packages/pursuit/tenants/app/Views/provisioning.css')); ?>

  </style>
  <body class="animated">
  <?php include(base_path('packages/pursuit/tenants/app/Views/background.svg')); ?>

<?php $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname(); ?>
<div class="tenant-name">
  <strong>#<?=str_pad($hostname->id, 5, '0', STR_PAD_LEFT);?></strong> // <?=$hostname->name;?>
  <small><?=$hostname->fqdn;?></small>
</div>


    <main id="root">
      <div class="flex-box">
        <h1><img src="https://sihq.com.au/_next/static/images/logo-268abf7bdd1f44cdcdf4bcd8d26e2f11.png"/></h1>
        <p><strong>SIHQ booking platform development area</strong>Enter you're access key below.</p>
        <form class="passcode-area" autocomplete="off"  method="POST">
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" autofocus required>
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="text" pattern="[0-9]*"  maxlength="1" required>
          <button type="submit">Unlock</button>
        </form>
      </div>

      <noscript>
        <div class="warning">
          <div class="warning__dialog">
            <div class="warning__title">Javascript Required</div>
            <div class="warning__content">
              This application requires javascript to be enabled. Please enable javascript on your
              device to continue.
              <code class="warning__code"></code>
            </div>
            <a href="https://www.enable-javascript.com/" class="warning__button">
              ENABLE JAVASCRIPT
            </a>
          </div>
        </div>
      </noscript>
    </main>
    <script type="text/javascript">
      //To Do: Add Visibility toggle  
      const inputs = document.querySelectorAll('.passcode-area input');
      inputs[0].focus();
      for (elem of inputs) {
        elem.addEventListener('input', function() {
          const value = this.value;
          const nextElement = this.nextElementSibling;
          if (value === '' || !nextElement) {
            return;
          }

          let passcode = 0;
          for (elem of inputs) {
            if(elem.value !==''){
              passcode++
            }
          }
          if(passcode === 6){
            document.querySelector("form").submit();
          }
          nextElement.focus();
        });
      }
      for (let elem of inputs) {
        elem.addEventListener('keydown', function(event) {
          //Right Arrow Key
          if (event.keyCode == 39) {
            this.nextElementSibling.focus();
          }
          //Left Arrow Key
          //Add Highlight
          if (event.keyCode == 37) {
            this.previousElementSibling.focus();
          }
          //Backspace Key
          if (event.keyCode == 8 && event.metaKey) {
            console.log('🐰🥚 FOUND!!! Cmd + Backspace = clear all');
            for (innerElem of inputs) {
              innerElem.value = '';
            }
            inputs[0].focus();
          } else if (event.keyCode == 8) {
            if(elem.value === '') {
              this.previousElementSibling.focus();
              return;
            }
            elem.value = '';
          }
        });
      }

  </script>
  </body>
</html>


