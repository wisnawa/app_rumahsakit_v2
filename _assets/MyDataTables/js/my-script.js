// datatable client side
$(document).ready(function () {
  $("#poliTable").DataTable({
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: [3],
      },
    ],
  });
});

$(document).ready(function () {
  $("#dokterTable").DataTable({
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: [5, 6],
      },
    ],
  });
});

// datatable server side
$(document).ready(function () {
  $("#pasienTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "../pasien/pasien_data.php",
  });
});
