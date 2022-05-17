// Call the dataTables jQuery plugin
$(document).ready(function () {

  //Initialize Select2 Elements
  $('.select2').select2()
  console.log('test select 2');

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  // pasang data table untuk datatable
  $('#dataTable').DataTable();

  // pasang data table untuk table menu headers
  $('#tableMenuHeader').DataTable();

  // pasang data table untuk table menu items
  $('#tableMenuItem').DataTable();

  // pasang data table untuk table menu childs item
  $('#tableMenuChild').DataTable();

  // pasang data table untuk table barang
  $('#tableBarang').DataTable();

  // pasang data table untuk table jenis barang
  $('#tableJenisBarang').DataTable();


  // pasang data table untuk table barang masuk
  $('#tableBarangMasuk').DataTable();

});