@if ($errors->all())
<div class="alert  alert-danger alert-dismissible" role="alert">
    @foreach ($errors->all() as $error)
    <div class="alert-icon"></div>
    <em class="icon ni ni-alert-circle"></em> 
    {{ $error }} 
    @endforeach
</div>
@endif