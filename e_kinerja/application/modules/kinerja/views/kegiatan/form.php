<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_kegiatan" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Kegiatan Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="unoreselon1_id" class="col-sm-2 control-label">Unit Es.I</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon1_id',
                                $unoreselon1,
                                set_value('unoreselon1_id', $kegiatan['unoreselon1_id']),
                                'class="form-control input-sm required"  id="unoreselon1_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon1_id');?>
                    </div>
                </div> <!--/ Unit Es.I -->
                <div class="form-group">
                    <label for="unoreselon2_id" class="col-sm-2 control-label">Unit Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon2_id',
                                $unoreselon2,
                                set_value('unoreselon2_id', $kegiatan['unoreselon2_id']),
                                'class="form-control input-sm required"  id="unoreselon2_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon2_id');?>
                    </div>
                </div> <!--/ Unit Es.II -->
                <div class="form-group">
                    <label for="kode" class="col-sm-2 control-label">Kode Kegiatan Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'kode',
                                    'id'           => 'kode',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Kode Kegiatan Es.II',
                                    'maxlength'    => '100'
                                ),
                                set_value('kode', $kegiatan['kode'])
                            );

                        ?>
                        <?php echo form_error('kode');?>
                    </div>
                </div> <!--/ Kode Kegiatan Es.II -->
                <div class="form-group">
                    <label for="kegiatan" class="col-sm-2 control-label">Kegiatan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'kegiatan',
                                    'name'          => 'kegiatan',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Kegiatan',
                                    'maxlength'     => '100'
                                ),
                                set_value('kegiatan', $kegiatan['kegiatan'])
                            );

                        ?>
                        <?php echo form_error('kegiatan');?>
                    </div>
                </div> <!--/ Kegiatan -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/kegiatan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->