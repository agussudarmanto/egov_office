<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Kegiatan Es.II</div>
  <div class="panel-body"></div>
  <?php if ($kegiatan) : ?>
  <table id="detail" class="table table-striped table-condensed">
    <tbody>
    <tr>
      <td width="20%" align="right"><strong>Unit Es.I</strong></td>
      <td><?php echo $kegiatan['unoreselon1']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Unit Es.II</strong></td>
      <td><?php echo $kegiatan['unoreselon2']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Kode Kegiatan Es.II</strong></td>
      <td><?php echo $kegiatan['kode']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Kegiatan</strong></td>
      <td><?php echo $kegiatan['kegiatan']; ?></td>
    </tr>
</tbody>
    <?php endif ?>
  </table>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/kegiatan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a></div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->