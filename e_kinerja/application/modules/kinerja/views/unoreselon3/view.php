<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify') ?></div>
</div>
<!-- /.row-->
<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-8 col-xs-3">
        <?php echo anchor( site_url( 'kinerja/unoreselon3/add'), '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"' ); ?> Unit Eselon III</div>
      <div class="col-md-4 col-xs-9">
        <?php echo form_open(site_url( 'kinerja/unoreselon3/search'), 'role="search" class="form"') ;?>
        <div class="input-group pull-right">
          <input type="text" placeholder="Cari data" name="q" autocomplete="off" class="form-control input-sm" /><span class="input-group-btn"><button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</button></span></div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </header>
  <div class="panel-body">
    <?php if ($unoreselon3s) : ?>
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th class="header">#</th>
          <th>Unit Es.II</th>
          <th>Unit Es.III</th>
          <th align="right" width="120" class="red header">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($unoreselon3s as $unoreselon3) : ?>
        <tr>
          <td>
            <?php echo $number++;; ?>
          </td>
          <td><?php echo $unoreselon3['unoreselon2']; ?></td>
          <td><?php echo $unoreselon3['unoreselon3']; ?></td>
          <td>
            <?php echo anchor( site_url( 'kinerja/unoreselon3/show/' . $unoreselon3[ 'id']), '<i class="glyphicon glyphicon-eye-open"></i>', 'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"' ); ?>
            <?php echo anchor( site_url( 'kinerja/unoreselon3/edit/' . $unoreselon3[ 'id']), '<i class="glyphicon glyphicon-edit"></i>', 'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"' ); ?>
            <?php echo anchor( site_url( 'kinerja/unoreselon3/destroy/' . $unoreselon3[ 'id']), '<i class="glyphicon glyphicon-trash"></i>',
            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"' ); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <?php echo notify( 'Data unoreselon3 belum tersedia', 'info');?>
    <?php endif; ?>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-3"> Unit Eselon III <span class="label label-info"><?php echo $total; ?></span></div>
      <div class="col-md-9"></div>
      <?php echo $pagination; ?>
    </div>
  </div>
</section>