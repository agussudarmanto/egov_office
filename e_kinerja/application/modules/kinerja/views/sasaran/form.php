<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_sasaran" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Sasaran Kegiatan Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="kegiatan_id" class="col-sm-2 control-label">Kegiatan Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'kegiatan_id',
                                $kegiatan,
                                set_value('kegiatan_id', $sasaran['kegiatan_id']),
                                'class="form-control input-sm required"  id="kegiatan_id"'
                            );

                        ?>
                        <?php echo form_error('kegiatan_id');?>
                    </div>
                </div> <!--/ Kegiatan Es.II -->
                <div class="form-group">
                    <label for="kode" class="col-sm-2 control-label">Kode Sasaran Kegiatan Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'kode',
                                    'id'           => 'kode',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Kode Sasaran Kegiatan Es.II',
                                    'maxlength'    => '100'
                                ),
                                set_value('kode', $sasaran['kode'])
                            );

                        ?>
                        <?php echo form_error('kode');?>
                    </div>
                </div> <!--/ Kode Sasaran Kegiatan Es.II -->
                <div class="form-group">
                    <label for="sasaran" class="col-sm-2 control-label">Kegiatan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'sasaran',
                                    'name'          => 'sasaran',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Kegiatan',
                                    'maxlength'     => '100'
                                ),
                                set_value('sasaran', $sasaran['sasaran'])
                            );

                        ?>
                        <?php echo form_error('sasaran');?>
                    </div>
                </div> <!--/ Kegiatan -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/sasaran'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->