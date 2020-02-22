<style type="text/css">
  body {
    background-image: url("data:image/svg+xml,%3Csvg width='42' height='44' viewBox='0 0 42 44' xmlns='http://www.w3.org/2000/svg'%3E%3Cg id='Page-1' fill='none' fill-rule='evenodd'%3E%3Cg id='brick-wall' fill='%23dbdbdb' fill-opacity='0.4'%3E%3Cpath d='M0 0h42v44H0V0zm1 1h40v20H1V1zM0 23h20v20H0V23zm22 0h20v20H22V23z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }

  #lock {
    display:inline-block;
    font-size: 2px;
    position: relative;
    width: 18em;
    height: 13em;
    border-radius: 2em;
    top: 0;
    box-sizing: border-box;
    border: 3.5em solid #666;
    border-right-width: 7.5em;
    border-left-width: 7.5em;
    margin-bottom:30px;
  }
  #lock:before {
    content: "";
    box-sizing: border-box;
    position: absolute;
    border: 2.5em solid #666;
    width: 14em;
    height: 12em;
    left: 50%;
    margin-left: -7em;
    top: -12em;
    border-top-left-radius: 7em;
    border-top-right-radius: 7em;
  }
  #lock:after {
    content: "";
    box-sizing: border-box;
    position: absolute;
    border: 1em solid #666;
    width: 5em;
    height: 8em;
    border-radius: 2.5em;
    left: 50%;
    top: -1em;
    margin-left: -2.5em;
  }
  .tenant-name {
    position: absolute;
    bottom: 30px;
    left: 30px;
    z-index: 6;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    line-height: 20px;
    color: rgba(0, 0, 0, 0.7);
    text-align: left;
  }
  .tenant-name small {
    display: block;
    color: rgba(0, 0, 0, 0.7);
  }
  .passcode-area > input {
    color: #fff;
    background-color: #333;
    border: 2px solid  #333;
    border-radius: 4px;
    padding: 0;
    margin: 25px 6px 0;
    width: 65px;
    height: 65px;
    text-align: center;
    font-size: 102px;
    line-height: 1.29;
    text-transform: uppercase;
    background-clip: padding-box;
  }
  .passcode-area > input:invalid {
    background-color: rgba(0, 0, 0, 0.1);
    border-color:rgba(0, 0, 0, 0.5);
    color: #377cbb;
  }
  .passcode-area > input:nth-child(3) {
    margin-right: 25px;
  }
  .passcode-area > input:focus {
    -webkit-appearance: none;
    border: 2px solid #377cbb;
    outline: 0;
    box-shadow: 0px 0px 3px rgba(131, 192, 253, 0.5);
  }
  .passcode-area button {
    display: block;
    margin-top: 30px;
    padding: 10px;
    padding-left: 0px;
    padding-right: 0px;
    width: 100%;
    box-sizing: border-box;
    background-color: rgba(0, 0, 0, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 4px;
    color: #fff;
    position: absolute;
    display: none;
  }
  @media only screen and (max-width: 600px) {
    .passcode-area > input:nth-child(3) {
      margin-right: 6px;
    }
    .passcode-area > input {
      font-size: 25px;
      width: 35px;
      height: 35px;
    }
  }
</style>