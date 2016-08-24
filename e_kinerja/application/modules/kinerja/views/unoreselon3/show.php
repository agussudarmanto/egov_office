<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Unit Eselon III</div>
  <div class="panel-body"></div>
  <?php if ($unoreselon3) : ?>
  <table id="detail" class="table table-striped table-condensed">
    <tbody>
    <tr>
      <td width="20%" align="right"><strong>Unit Es.II</strong></td>
      <td><?php echo $unoreselon3['unoreselon2']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Unit Es.III</strong></td>
      <td><?php echo $unoreselon3['unoreselon3']; ?></td>
    </tr>
</tbody>
    <?php endif ?>
  </table>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/unoreselon3'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a></div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->