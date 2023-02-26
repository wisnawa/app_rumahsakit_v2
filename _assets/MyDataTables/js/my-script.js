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

// $(document).ready(function () {
//   $("#dokterTable").DataTable({
//     columnDefs: [
//       {
//         searchable: false,
//         orderable: false,
//         targets: [5, 6],
//       },
//     ],
//   });
// });
