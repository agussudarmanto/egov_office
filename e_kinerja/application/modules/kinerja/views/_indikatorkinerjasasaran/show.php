<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Indikator Kinerja Sasaran (IKS) Es.II</div>
  <div class="panel-body"></div>
  <?php if ($indikatorkinerjasasaran) : ?>
  <table id="detail" class="table table-striped table-condensed">
    <tbody>
    <tr>
      <td width="20%" align="right"><strong>(IKK) Es.II</strong></td>
      <td><?php echo $indikatorkinerjasasaran['indikatorkinerjakegiatan']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Unit Es.III</strong></td>
      <td><?php echo $indikatorkinerjasasaran['unoreselon3']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Kode IKS Es.II</strong></td>
      <td><?php echo $indikatorkinerjasasaran['kode']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>IKS Es.II</strong></td>
      <td><?php echo $indikatorkinerjasasaran['indikatorkinerjasasaran']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Satuan</strong></td>
      <td><?php echo $indikatorkinerjasasaran['satuan']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Deskripsi IKS</strong></td>
      <td><?php echo $indikatorkinerjasasaran['deskripsi']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Prioritas Es.II</strong></td>
      <td><?php echo $indikatorkinerjasasaran['prioritas']; ?></td>
    </tr>
</tbody>
    <?php endif ?>
  </table>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/indikatorkinerjasasaran'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a></div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->