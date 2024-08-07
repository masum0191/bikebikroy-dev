												
												
@if ($errors->any())
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>  <i class="fas fa-bell"></i> {{count($errors)}} Errors</strong> 
    @foreach ($errors->all() as $error)
    <p class="text-danger strong">{{ $error }}</p>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
								
@endif


