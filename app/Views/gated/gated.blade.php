<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Provisioning</title>
    <meta name="Description" content="Web Application" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  </head>
  @include('tenants::css') 
  @include('tenants::gated.css') 
  <body>
    <main id="root">
      <?php $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname(); ?>
      <div class="tenant-name">
        <strong>#<?=str_pad($hostname->id, 5, '0', STR_PAD_LEFT);?></strong>
        <small>&mdash; <?=$hostname->name;?></small>
      </div>
      <div class="flex-box">
        <div id="lock"></div>
        <form class="passcode-area" autocomplete="off"  method="POST">
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" autofocus required>
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" required>
          <input name="password[]" autocomplete="off" type="password" pattern="[0-9]*"  maxlength="1" required>
          <button type="submit">Unlock</button>
        </form>
      </div>
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


