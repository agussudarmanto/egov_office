<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_indikatorkinerjakegiatan" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Indikator Kinerja Kegiatan (IKK) Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="sasaran_id" class="col-sm-2 control-label">Sasaran Kegiatan Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'sasaran_id',
                                $sasaran,
                                set_value('sasaran_id', $indikatorkinerjakegiatan['sasaran_id']),
                                'class="form-control input-sm required"  id="sasaran_id"'
                            );

                        ?>
                        <?php echo form_error('sasaran_id');?>
                    </div>
                </div> <!--/ Sasaran Kegiatan Es.II -->
                <div class="form-group">
                    <label for="dukungan_id" class="col-sm-2 control-label">Dukungan Kegiatan Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'dukungan_id',
                                $dukungan,
                                set_value('dukungan_id', $indikatorkinerjakegiatan['dukungan_id']),
                                'class="form-control input-sm required"  id="dukungan_id"'
                            );

                        ?>
                        <?php echo form_error('dukungan_id');?>
                    </div>
                </div> <!--/ Dukungan Kegiatan Es.II -->
                <div class="form-group">
                    <label for="kode" class="col-sm-2 control-label">Kode IKK Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'kode',
                                    'id'           => 'kode',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Kode IKK Es.II',
                                    'maxlength'    => '100'
                                ),
                                set_value('kode', $indikatorkinerjakegiatan['kode'])
                            );

                        ?>
                        <?php echo form_error('kode');?>
                    </div>
                </div> <!--/ Kode IKK Es.II -->
                <div class="form-group">
                    <label for="indikatorkinerjakegiatan" class="col-sm-2 control-label">IKK Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'indikatorkinerjakegiatan',
                                    'name'          => 'indikatorkinerjakegiatan',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'IKK Es.II',
                                    'maxlength'     => '100'
                                ),
                                set_value('indikatorkinerjakegiatan', $indikatorkinerjakegiatan['indikatorkinerjakegiatan'])
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjakegiatan');?>
                    </div>
                </div> <!--/ IKK Es.II -->
                <div class="form-group">
                    <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'satuan',
                                    'id'           => 'satuan',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Satuan',
                                    'maxlength'    => '100'
                                ),
                                set_value('satuan', $indikatorkinerjakegiatan['satuan'])
                            );

                        ?>
                        <?php echo form_error('satuan');?>
                    </div>
                </div> <!--/ Satuan -->
                <div class="form-group">
                    <label for="prioritas_id" class="col-sm-2 control-label">Prioritas Es.I</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'prioritas_id',
                                $prioritas,
                                set_value('prioritas_id', $indikatorkinerjakegiatan['prioritas_id']),
                                'class="form-control input-sm required"  id="prioritas_id"'
                            );

                        ?>
                        <?php echo form_error('prioritas_id');?>
                    </div>
                </div> <!--/ Prioritas Es.I -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/indikatorkinerjakegiatan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->