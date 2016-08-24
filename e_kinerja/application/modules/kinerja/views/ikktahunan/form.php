<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_ikktahunan" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Target Tahunan IKK Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="indikatorkinerjakegiatan_id" class="col-sm-2 control-label">(IKK) Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'indikatorkinerjakegiatan_id',
                                $indikatorkinerjakegiatan,
                                set_value('indikatorkinerjakegiatan_id', $ikktahunan['indikatorkinerjakegiatan_id']),
                                'class="form-control input-sm required"  id="indikatorkinerjakegiatan_id"'
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjakegiatan_id');?>
                    </div>
                </div> <!--/ (IKK) Es.II -->
                <div class="form-group">
                    <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'tahun',
                                    'id'           => 'tahun',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Tahun',
                                    'maxlength'    => '100'
                                ),
                                set_value('tahun', $ikktahunan['tahun'])
                            );

                        ?>
                        <?php echo form_error('tahun');?>
                    </div>
                </div> <!--/ Tahun -->
                <div class="form-group">
                    <label for="nilai" class="col-sm-2 control-label">Target</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'nilai',
                                    'id'           => 'nilai',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Target',
                                    'maxlength'    => '100'
                                ),
                                set_value('nilai', $ikktahunan['nilai'])
                            );

                        ?>
                        <?php echo form_error('nilai');?>
                    </div>
                </div> <!--/ Target -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/ikktahunan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->