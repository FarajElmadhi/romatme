         
        
  <footer class="footer">
    <div class="container">
        <div class="row">
          
                    <div class="col-12 text-center">
                    <a class="" class href="{{url('/')}}">RomatMe </a> @ {{ date('Y')}}
                    </div>
                </div>
           
           <br>
    </div>
</footer>

 
    <script src="{{ url('assets') }}/front/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets') }}/front/js/all.min.js"></script>
    <script src="{{ url('assets') }}/front/js/jquery.min.js"></script>
 
    <script src="{{ url('assets') }}/front/js/jquery.autocomplete.js"></script>


<script>

$(document).ready(function() {
var baseurl = "{{url('/')}}";
        $('#search').autocomplete({
            minChars: 2,
            serviceUrl: "{{route('search')}}",
            dataType: 'json',
            autoSelectFirst: true,
          onSelect: function (go) {
                if (go.data) window.location.href=  "/view/"+ go.brand+"/" + go.data ;
            }
        });
});

</script>

  </body>
</html>
