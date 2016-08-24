<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify') ?></div>
</div>
<!-- /.row-->

<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
                <div class="form-group">
                    <label for="indikatorkinerjakegiatan_id" class="col-sm-2 control-label">Indikator Kinerja Kegiatan (IKK)</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'indikatorkinerjakegiatan_id',
                                $indikatorkinerjakegiatan,
                                set_value('indikatorkinerjakegiatan_id', $output['indikatorkinerjakegiatan_id']),
                                'class="form-control input-sm required"  id="indikatorkinerjakegiatan_id"'
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjakegiatan_id');?>
                    </div>
                </div> <!--/ Indikator Kinerja Kegiatan (IKK) -->
                <div class="form-group">
                    <label for="unoreselon3_id" class="col-sm-2 control-label">Unit Es.III</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon3_id',
                                $unoreselon3,
                                set_value('unoreselon3_id', $output['unoreselon3_id']),
                                'class="form-control input-sm required"  id="unoreselon3_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon3_id');?>
                    </div>
                </div> <!--/ Unit Es.III -->
                <div class="form-group">
                    <label for="kode" class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'kode',
                                    'id'           => 'kode',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Kode',
                                    'maxlength'    => '100'
                                ),
                                set_value('kode', $output['kode'])
                            );

                        ?>
                        <?php echo form_error('kode');?>
                    </div>
                </div> <!--/ Kode -->
                <div class="form-group">
                    <label for="output" class="col-sm-2 control-label">Output</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'output',
                                    'name'          => 'output',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Output',
                                    'maxlength'     => '100'
                                ),
                                set_value('output', $output['output'])
                            );

                        ?>
                        <?php echo form_error('output');?>
                    </div>
                </div> <!--/ Output -->
                <div class="form-group">
                    <label for="jenisoutput_id" class="col-sm-2 control-label">Jenis Output</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'jenisoutput_id',
                                $jenisoutput,
                                set_value('jenisoutput_id', $output['jenisoutput_id']),
                                'class="form-control input-sm required"  id="jenisoutput_id"'
                            );

                        ?>
                        <?php echo form_error('jenisoutput_id');?>
                    </div>
                </div> <!--/ Jenis Output -->
                <div class="form-group">
                    <label for="output" class="col-sm-2 control-label">Output</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'output',
                                    'name'          => 'output',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Output',
                                    'maxlength'     => '100'
                                ),
                                set_value('output', $output['output'])
                            );

                        ?>
                        <?php echo form_error('output');?>
                    </div>
                </div> <!--/ Output -->
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-8 col-xs-3">
        <?php echo anchor( site_url( 'kinerja/output/add'), '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"' ); ?> Output</div>
      <div class="col-md-4 col-xs-9">
        <?php echo form_open(site_url( 'kinerja/output/search'), 'role="search" class="form"') ;?>
        <div class="input-group pull-right">
          <input type="text" placeholder="Cari data" name="q" autocomplete="off" class="form-control input-sm" /><span class="input-group-btn"><button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</button></span></div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </header>
  <div class="panel-body">
    <?php if ($outputs) : ?>
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th class="header">#</th>
          <th>Indikator Kinerja Kegiatan (IKK)</th>
          <th>Unit Es.III</th>
          <th>Kode</th>
          <th>Output</th>
          <th>Jenis Output</th>
          <th>Output</th>
          <th align="right" width="120" class="red header">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($outputs as $output) : ?>
        <tr>
          <td>
            <?php echo $number++;; ?>
          </td>
          <td><?php echo $output['indikatorkinerjakegiatan']; ?></td>
          <td><?php echo $output['unoreselon3']; ?></td>
          <td><?php echo $output['kode']; ?></td>
          <td><?php echo $output['output']; ?></td>
          <td><?php echo $output['jenisoutput']; ?></td>
          <td><?php echo $output['output']; ?></td>
          <td>
            <?php echo anchor( site_url( 'kinerja/output/show/' . $output[ 'id']), '<i class="glyphicon glyphicon-eye-open"></i>', 'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"' ); ?>
            <?php echo anchor( site_url( 'kinerja/output/edit/' . $output[ 'id']), '<i class="glyphicon glyphicon-edit"></i>', 'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"' ); ?>
            <?php echo anchor( site_url( 'kinerja/output/destroy/' . $output[ 'id']), '<i class="glyphicon glyphicon-trash"></i>',
            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"' ); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <?php echo notify( 'Data output belum tersedia', 'info');?>
    <?php endif; ?>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-3"> Output <span class="label label-info"><?php echo $total; ?></span></div>
      <div class="col-md-9"></div>
      <?php echo $pagination; ?>
    </div>
  </div>
</section>