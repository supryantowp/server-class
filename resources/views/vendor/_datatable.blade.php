 <!-- DataTables -->
 <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
 <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />


 <!-- Required datatable js -->
 <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

 <!-- Responsive examples -->
 <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>


 <script>
       $('#table').DataTable({
             info: false
             , odering: false
       })

 </script>
