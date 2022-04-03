//custom  data table format
$(document).ready(function(){
     $('#allTableInfo').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autowidth": false
     });

});

//datepicker code start
$(function () {
  $("#myDate").datepicker({
    autoclose: true,
    format:'dd-mm-yyyy',
    todayHighlight: true
  });
});

//success and error message timeout code
setTimeout(function(){
  $('.alertsuccess').slideUp(1000);
},5000);

setTimeout(function(){
  $('.alerterror').slideUp(1000);
},10000);


//modal code start
$(document).ready(function(){
  $(document).on("click", "#softDelete", function(){
    var deleteId = $(this).data('id');
    $(".modal_body #modal_id").val(deleteId);
  });
  $(document).on("click", "#restore", function(){
    var restoreId = $(this).data('id');
    $(".modal_body #modal_id").val(restoreId);
  });
  $(document).on("click", "#delete", function(){
    var perDeleteId = $(this).data('id');
    $(".modal_body #modal_id").val(perDeleteId);
  });
});
