$(document).ready(function () {
  table = $("#myTable").DataTable({
    data: dataSet,
    columns: [
      {
        title: "No",
      },
      {
        title: "NIP",
      },
      {
        title: "Nama",
      },
      {
        title: "Jabatan",
      },
      {
        title: "",
      },
    ],
    columnDefs: [
      {
        targets: [4],
        data: null,
        width: 40,
        defaultContent:
          "<button type='button' class='btn-sm btn-default'><i class='fa fa-chevron-circle-right'></i> Detil</button>",
      },
    ],
  });

  $("#myTable tbody").on("click", "button", function () {
    var data = table.row($(this).parents("tr")).data();
    $(".insertHere").html(
      "<h4>" +
        data[2] +
        '</h4><table class="table-top dtr-details" width="100%"><tbody><tr><td colspan="2">' +
        "</td></tr><tr><td>NIP<td><td><b>" +
        data[1] +
        "</b></td></tr><tr><td>Jabatan<td><td>" +
        data[3] +
        "</td></tr><tr><td>Pangkat<td><td>" +
        data[4] +
        "</td></tr></tbody></table>"
    );
    $("#nav-drh").html(
      '<iframe src="pdf/' +
        data[0] +
        '/DRH.pdf" style="width:100%; height:400px;" frameborder="0"></iframe>'
    );
    $("#nav-cpns").html(
      '<iframe src="pdf/' +
        data[0] +
        '/CPNS.pdf" style="width:100%; height:400px;" frameborder="0"></iframe>'
    );
    $("#nav-pns").html(
      '<iframe src="pdf/' +
        data[0] +
        '/PNS.pdf" style="width:100%; height:400px;" frameborder="0"></iframe>'
    );
    $("#nav-jabatan").html(
      '<iframe src="pdf/' +
        data[0] +
        '/JAB.pdf" style="width:100%; height:400px;" frameborder="0"></iframe>'
    );
    $("#nav-pangkat").html(
      '<iframe src="pdf/' +
        data[0] +
        '/PANGKAT.pdf" style="width:100%; height:400px;" frameborder="0"></iframe>'
    );
    $("#myModal").modal("show");
    $("#nav-drh-tab").trigger("click");
  });
});
