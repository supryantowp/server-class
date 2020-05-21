<!-- Sweet Alert -->
<link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

<!-- Sweet-Alert  -->
<script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>


<script>
      let btnDelete = document.querySelectorAll('.btn-delete')

      btnDelete.forEach(index => {
            index.addEventListener('click', event => {
                  event.preventDefault()
                  let deleteForm = event.target.parentElement;
                  Swal.fire({
                        title: "Are you sure?"
                        , text: "You won't be able to revert this!"
                        , type: "warning"
                        , showCancelButton: true
                        , confirmButtonColor: "#58db83"
                        , cancelButtonColor: "#ec536c"
                        , confirmButtonText: "Yes, delete it!"
                  }).then((result) => {
                        if (result.value) {
                              deleteForm.submit()
                        }
                  })
            })
      })

</script>
