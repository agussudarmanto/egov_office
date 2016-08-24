<style>
  .kinerja-kegiatan {background-color: #1ABC9C; font-weight: bold;}
  .kinerja-sasaran {background-color: #898E5A; color: #fefefe;}
  .kinerja-ikk {font-weight: bold; background-color: khaki;}
  .kinerja-iks {}
</style>
<!-- include summernote css/js-->
<link href="<?php echo base_url(); ?>assets/css/summernote.css" rel="stylesheet">

<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <span class="glyphicon glyphicon-pencil"></span> Indikator Kinerja Sasaran (IKS-1064-01-001)
      </div>
    </div>
  </header>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-9">
        <dl class="dl-horizontal">
          <dt>Kegiatan</dt>
          <dd>1065 - Pembinaan Administrasi Pengelolaan Kepegawaian dan Pengembangan SDM</dd>
          <dt>Sasaran</dt>
          <dd>01 - Meningkatnya kepengurusan kepegawaian di lingkungan Mahkamah Agung dan Pengadilan di semua lingkungan peradilan</dd>
          <dt>IK. Kegiatan (IKK)</dt>
          <dd>001 - Jumlah rekruitmen yang transparan, adil, akuntabel dan berdasarkan kompetensi (Calon Hakim, CPNS, Calon Hakim AdHoc Tipikor)</dd>
          <dt>Output</dt>
          <dd>001 - Pegawai yang direkrut</dd>
          <hr>
          <dt>IK. Sasaran (IKS)</dt>
          <dd>01 - Rekrutmen Calon Hakim dan calon Pegawai Negeri Sipil</dd>
        </dl>
      </div>
      <div class="col-md-3">
        <table class="table table-hover table-condensed">
          <thead>
            <tr>
                <th></th>
                <th>I</th>
                <th>II</th>
                <th>III</th>
                <th>IV</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Target</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
            </tr>
            <tr>
              <td>Realisasi</td>
              <td>100</td>
              <td></td>
              <td></td>
              <td></td>
            <tr>
              <td>Capaian</td>
              <td>100%</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#tw1" data-toggle="tab">Triwulan I</a></li>
          <li><a href="#tw2" data-toggle="tab">Triwulan II</a></li>
          <li><a href="#tw3" data-toggle="tab">Triwulan III</a></li>
          <li><a href="#tw4" data-toggle="tab">Triwulan IV</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="tw1">
                <?php $this->view('indikatorkinerjasasaran/show_triwulan'); ?>
          </div>
          <div class="tab-pane" id="tw2">...</div>
          <div class="tab-pane" id="tw3">...</div>
          <div class="tab-pane" id="tw4">...</div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-footer"><!-- 
    <div class="row">
    </div> -->
  </div>
</section>