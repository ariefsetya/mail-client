@extends('layouts.app')

@section('content')

<!--     <div class="panel">
        <div id="area" style="height:800px;border: 1px solid #2d89ef;">
            
        </div>
        <div class="panel">
            <div>
                <input type="text" name="nama" id="nama">
            </div>
            <div>
                <textarea id="pesan" rows="3" name="pesan"></textarea>
            </div>
            <div>
                <button id="kirim">Kirim</button>
            </div>
        </div>
    </div> -->
     <ul id="slide-out" class="side-nav">
    <li><div class="user-view">
      <div class="background">
        <img src="http://materializecss.com/images/office.jpg">
      </div>
      <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a>
      <a href="#!name"><span class="white-text name">{{Auth::user()->name}}</span></a>
      <a href="#!email"><span class="white-text email">{{Auth::user()->name}}</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

@endsection

@section('footer')

<script type="text/javascript">
    var pusher = new Pusher('d6d44018ad7be7ad9165', {
      cluster: 'ap1'
    });
    var channel = pusher.subscribe('chat');
    channel.bind('receive', function(data) {
      var nama = data.nama;
      var pesan = data.pesan;
      var html_add = '<div><b>'+nama+'</b><br>'+pesan+'</div>';
      $("#area").append(html_add);
    });
  $(".button-collapse").sideNav();
        
  $('.button-collapse').sideNav('show');

    $("#kirim").on('click',function () {
        $.ajax({
            url:'{{route("kirim_pesan")}}',
            dataType:'json',
            type:'POST',
            data:{
                'nama':$("#nama").val(),
                'pesan':$("#pesan").val(),
                '_token':'{{csrf_token()}}'
            },success:function(){
                  var nama = $("#nama").val();
                  var pesan = $("#pesan").val();
                  var html_add = '<div><b>'+nama+'</b><br>'+pesan+'</div>';
                  $("#area").append(html_add);
                  $("#nama").val('');
                  $("#pesan").val('');
            }
        });
    });
</script>

@endsection