  <script src="{{url('js//jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('js/html5-qrcode.min.js')}}"></script>
 <div id="reader" style="width:300px;height:250px">
 </div>


 <script type="text/javascript"> 
 $('#reader').html5_qrcode(function(data){
         // do something when code is read
    },
    function(error){
        //show read errors 
    }, function(videoError){
        //the video stream could be opened
    }
);
 </script>