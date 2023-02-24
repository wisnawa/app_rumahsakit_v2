// for tooltip
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

// function button refresh for event
var btnRefresh = document.getElementById("btnRefresh");

function jalankan() {
  window.location = "data.php";
}
btnRefresh.addEventListener("click", jalankan);

// function for event onclick in button click radio select all and clear
function selectAll() {
  let poliCheck = document.getElementsByName("checked[]");
  let poliCheckLen = poliCheck.length;
  for (var x = 0; x < poliCheckLen; x++) {
    poliCheck[x].checked = true;
  }
}

function deselectAll() {
  let poliCheck = document.getElementsByName("checked[]");
  let poliCheckLen = poliCheck.length;
  for (var x = 0; x < poliCheckLen; x++) {
    poliCheck[x].checked = false;
  }
}

// function for buttom edit
var btnEdit = document.getElementById("btnEdit");

function prosesEdit() {
  document.proses.action = "edit.php";
  document.proses.submit();
}
btnEdit.addEventListener("click", prosesEdit);

// function for button delete
var btnDelete = document.getElementById("btnDelete");

function prosesDel() {
  var conf = confirm("Apakah hapus data?");
  if (conf) {
    document.proses.action = "del.php";
    document.proses.submit();
  }
}
btnDelete.addEventListener("click", prosesDel);
