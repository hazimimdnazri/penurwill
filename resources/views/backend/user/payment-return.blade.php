{{ $message }}<br>
You will be redirected in 5 seconds.
@if($will_id)
<meta http-equiv = "refresh" content = "5; url = {{ url('client/my-will/'.$will_id) }}" />
@else
<meta http-equiv = "refresh" content = "5; url = {{ url('client/dashboard') }}" />
@endif