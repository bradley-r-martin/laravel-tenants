<style type="text/css">
   
 

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
   .pathway {
     margin: 0px;
     padding: 0px;
     width: 100%;
     display: flex;
     justify-content:center;
   }
   .pathway li {
     list-style: none;
   }
   .pathway li:first-child{
    text-align:right;
    flex:1;
   }
   .pathway li:last-child{
    text-align:left;
    flex:1;
   }
   .pathway__bar {
     display: flex;
     align-items: center;
     justify-content: center;
     padding-left: 5%;
     padding-right: 5%;
     width:150px;
   }
   .pathway__bar span {
     display: block;
     background: #666;
     height: 2px;
     width: 100%;
     min-width:120px;
     position: relative;
   }
   .pathway__bar span:after, .pathway__bar span:before {
     position: absolute;
     display: block;
     content: " ";
     border-radius: 50%;
     top: 50%;
     height: 10px;
     width: 10px;
     background: inherit;
     }
     .pathway__bar span:before {
       left: 0px;
       transform: translateY(-50%) translateX(-50%);
     }
     .pathway__bar span:after {
       right: 0px;
       transform: translateY(-50%) translateX(50%);
     }
 </style>