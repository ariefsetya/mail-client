@extends('layouts.app')

@section('content')
<div class="row">
      <div class="col s3">
      	 <ul class="collection with-header">
	        <li class="collection-header">
	        	<button class="btn">NEW</button>
	        </li>
	        <li class="collection-header">
	        	<h4>Inbox</h4>
	        </li>

	        @foreach($emails as $key)
	        <li class="collection-item">
	        	<div>{{$key['from']}}<br>
	        		{{$key['date']}}<br>
	        		<b>{{$key['subject']}}</b>
	        		<a onclick="openMessage('{{$key['ids']}}',
	        			'{{$key['from']}}',
	        			'{{$key['date']}}',
	        			'{{$key['subject']}}')" 
	        			class="secondary-content">
	        		<i class="material-icons">send</i></a>
	        	</div>
	        </li>
	        @endforeach
	      </ul>
      </div>


      <div class="col s9" id="messages">
      	<div class="row">
	       <div class="col s12">
	          <div class="card">
	            <div class="card-content">
	              <span class="card-title">
	              	<b><span id="subject">subject</span></b><br>
      				<span id="from">from</span><br>
      				<span id="date">date</span><br>
      			  </span>
	              <div id="msgbody">messages</div>
	            </div>
	            <div class="card-action">
	              <a href="#" class="btn">Reply</a>
	            </div>
	          </div>
	        </div>
	      </div>
      </div>
</div>
@endsection

@section('footer')
	<script type="text/javascript">
		function openMessage(ids,from,date,subject) {
			$("#from").html(from);
			$("#date").html(date);
			$("#subject").html(subject);
			$.ajax({
				url:'{{route('getMessage')}}/'+ids,
				type:'GET',
				dataType:'json',
				success:function(result){
					$("#msgbody").html(result.msg);
				}
			});
		}
	</script>
@endsection