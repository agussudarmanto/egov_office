<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify') ?></div>
</div>
<!-- /.row-->
<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-8 col-xs-3">
        <?php echo anchor( site_url( 'kinerja/triwulan/add'), '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"' ); ?> Triwulan</div>
      <div class="col-md-4 col-xs-9">
        <?php echo form_open(site_url( 'kinerja/triwulan/search'), 'role="search" class="form"') ;?>
        <div class="input-group pull-right">
          <input type="text" placeholder="Cari data" name="q" autocomplete="off" class="form-control input-sm" /><span class="input-group-btn"><button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</button></span></div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </header>
  <div class="panel-body">
    <?php if ($triwulans) : ?>
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th class="header">#</th>
          <th>Triwulan</th>
          <th align="right" width="120" class="red header">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($triwulans as $triwulan) : ?>
        <tr>
          <td>
            <?php echo $number++;; ?>
          </td>
          <td><?php echo $triwulan['triwulan']; ?></td>
          <td>
            <?php echo anchor( site_url( 'kinerja/triwulan/show/' . $triwulan[ 'id']), '<i class="glyphicon glyphicon-eye-open"></i>', 'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"' ); ?>
            <?php echo anchor( site_url( 'kinerja/triwulan/edit/' . $triwulan[ 'id']), '<i class="glyphicon glyphicon-edit"></i>', 'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"' ); ?>
            <?php echo anchor( site_url( 'kinerja/triwulan/destroy/' . $triwulan[ 'id']), '<i class="glyphicon glyphicon-trash"></i>',
            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"' ); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <?php echo notify( 'Data triwulan belum tersedia', 'info');?>
    <?php endif; ?>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-3"> Triwulan <span class="label label-info"><?php echo $total; ?></span></div>
      <div class="col-md-9"></div>
      <?php echo $pagination; ?>
    </div>
  </div>
</section>