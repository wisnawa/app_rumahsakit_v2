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
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: [5],
        render: function (data, type, row) {
          const btn =
            '<div style="text-align: center"><a href="edit.php?id="+data+"" class="btn btn-sm btn-outline-warning" style="margin-right: 9px;"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a><a href="dell.php?id="+data+"" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Yakin dihapus?\')"><i class="fa-regular fa-trash-can"></i>&nbsp;Delete</a></div>';
          return btn;
        },
      },
    ],
  });
});
