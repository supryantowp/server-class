@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
      <strong>Success!</strong> {{session()->get('success')}}.
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
      <strong>Error!</strong> {{session()->get('error')}}.
</div>
@endif
