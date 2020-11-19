@if (session()->has('success'))
<div class="alert alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> {{ session()->get('success') }} 
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-icon">
    <em class="icon ni ni-cross-circle"></em> {{ session()->get('error') }} 
</div>
@endif