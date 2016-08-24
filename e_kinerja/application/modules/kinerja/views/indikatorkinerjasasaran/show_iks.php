<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify') ?>
  </div>
</div>

<!-- include summernote css/js-->
<link href="<?php echo base_url(); ?>assets/css/summernote.css" rel="stylesheet">

<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <span class="glyphicon glyphicon-pencil"></span> Indikator Kinerja Sasaran (IKS-<?php echo $indikatorkinerjasasaran['kegiatan_kode']."-".$indikatorkinerjasasaran['sasaran_kode']."-".$indikatorkinerjasasaran['indikatorkinerjakegiatan_kode']."-".$indikatorkinerjasasaran['output_kode']."-".$indikatorkinerjasasaran['indikatorkinerjasasaran_kode']; ?>)
      </div>
    </div>
  </header>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-9">
        <dl class="dl-horizontal">
          <dt>Kegiatan</dt>
          <dd><?php echo $indikatorkinerjasasaran['kegiatan_kode']; ?> - <?php echo $indikatorkinerjasasaran['kegiatan']; ?></dd>
          <dt>Sasaran</dt>
          <dd><?php echo $indikatorkinerjasasaran['sasaran_kode']; ?> - <?php echo $indikatorkinerjasasaran['sasaran']; ?></dd>
          <dt>IK. Kegiatan (IKK)</dt>
          <dd><?php echo $indikatorkinerjasasaran['indikatorkinerjakegiatan_kode']; ?> - <?php echo $indikatorkinerjasasaran['indikatorkinerjakegiatan']; ?></dd>
          <dt>Output</dt>
          <dd><?php echo $indikatorkinerjasasaran['output_kode']; ?> - <?php echo $indikatorkinerjasasaran['output']; ?></dd>
          <hr>
          <dt>IK. Sasaran (IKS)</dt>
          <dd><?php echo $indikatorkinerjasasaran['indikatorkinerjasasaran_kode']; ?> - <?php echo $indikatorkinerjasasaran['indikatorkinerjasasaran']; ?></dd>
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
        <ul class="nav nav-tabs" id="tabstrip">
          <li class="active"><a href="#tw1" data-toggle="tab">Triwulan I</a></li>
          <li><a href="#tw2" data-toggle="tab">Triwulan II</a></li>
          <li><a href="#tw3" data-toggle="tab">Triwulan III</a></li>
          <li><a href="#tw4" data-toggle="tab">Triwulan IV</a></li>
        </ul>

        <div class="tab-content" id="tabdata">
          <div class="tab-pane active" id="tw1">
          <?php //$this->view('indikatorkinerjasasaran/show_triwulan'); ?>
          </div>
          <div class="tab-pane" id="tw2">...</div>
          <div class="tab-pane" id="tw3">...</div>
          <div class="tab-pane" id="tw4">...</div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <div class="row">
    </div>
  </div>
</section>