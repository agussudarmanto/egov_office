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
      '<object id="pdf_content" width="100%" height="400px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="pdf/' + data[0] + '/DRH.pdf#zoom=70&scrollbar=1&toolbar=1&navpanes=1"><p>Maaf, PDF tidak dapat ditampilkan, cek kembali file Anda.</p></object>'
    );
    $("#nav-cpns").html(
      '<object id="pdf_content" width="100%" height="400px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="pdf/' + data[0] + '/CPNS.pdf#zoom=70&scrollbar=1&toolbar=1&navpanes=1"><p>Maaf, PDF tidak dapat ditampilkan, cek kembali file Anda.</p></object>'
    );
    $("#nav-pns").html(
      '<object id="pdf_content" width="100%" height="400px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="pdf/' + data[0] + '/PNS.pdf#zoom=70&scrollbar=1&toolbar=1&navpanes=1"><p>Maaf, PDF tidak dapat ditampilkan, cek kembali file Anda.</p></object>'
    );
    $("#nav-jabatan").html(
      '<object id="pdf_content" width="100%" height="400px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="pdf/' + data[0] + '/JAB.pdf#zoom=70&scrollbar=1&toolbar=1&navpanes=1"><p>Maaf, PDF tidak dapat ditampilkan, cek kembali file Anda.</p></object>'
    );
    $("#nav-pangkat").html(
      '<object id="pdf_content" width="100%" height="400px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="pdf/' + data[0] + '/PANGKAT.pdf#zoom=70&scrollbar=1&toolbar=1&navpanes=1"><p>Maaf, PDF tidak dapat ditampilkan, cek kembali file Anda.</p></object>'
    );
    $("#myModal").modal("show");
    $("#nav-drh-tab").trigger("click");
  });
});
