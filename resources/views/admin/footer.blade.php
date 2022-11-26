<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/dist/js/adminlte.min.js')}}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('admin_assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_assets/dist/js/pages/dashboard3.js')}}"></script>
<!-- Page specific script -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
 $(document).ready(function(){
$('.custom-lable-image').bind('change' , show_image_name_on_lable); 
$('.updtuserApp').bind('click' , update_userApps); 
 });

function show_image_name_on_lable()
{
  let imgText = document.getElementById(event.target.id).files[0].name;
	  $('.custom-file-label').text(imgText);
}
function update_userApps() {
  $(this).attr('value', 'Please Wait Loading.......');
  $.ajax({
            type: "POST",
            url: "{{url('admin/update_user_apps')}}",
            data: {
              "user": $(this).data('user'),
              "app":$(this).data('app'),
              _token: '{{csrf_token()}}'
            },
            success: function(ajax_response) {
				ajax_response = JSON.parse(JSON.stringify(ajax_response));
				if(ajax_response.success) {
          window.location.href = '/admin/users/'+ajax_response.user;
			}
    }
			
	});
}


</script>>




</body>
</html>
