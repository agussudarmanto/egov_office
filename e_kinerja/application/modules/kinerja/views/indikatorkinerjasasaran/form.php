<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_indikatorkinerjasasaran" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Indikator Kinerja Sasaran (IKS) Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="indikatorkinerjakegiatan_id" class="col-sm-2 control-label">(IKK) Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'indikatorkinerjakegiatan_id',
                                $indikatorkinerjakegiatan,
                                set_value('indikatorkinerjakegiatan_id', $indikatorkinerjasasaran['indikatorkinerjakegiatan_id']),
                                'class="form-control input-sm required"  id="indikatorkinerjakegiatan_id"'
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjakegiatan_id');?>
                    </div>
                </div> <!--/ (IKK) Es.II -->
                <div class="form-group">
                    <label for="unoreselon3_id" class="col-sm-2 control-label">Unit Es.III</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon3_id',
                                $unoreselon3,
                                set_value('unoreselon3_id', $indikatorkinerjasasaran['unoreselon3_id']),
                                'class="form-control input-sm required"  id="unoreselon3_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon3_id');?>
                    </div>
                </div> <!--/ Unit Es.III -->
                <div class="form-group">
                    <label for="kode" class="col-sm-2 control-label">Kode IKS Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'kode',
                                    'id'           => 'kode',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Kode IKS Es.II',
                                    'maxlength'    => '100'
                                ),
                                set_value('kode', $indikatorkinerjasasaran['kode'])
                            );

                        ?>
                        <?php echo form_error('kode');?>
                    </div>
                </div> <!--/ Kode IKS Es.II -->
                <div class="form-group">
                    <label for="indikatorkinerjasasaran" class="col-sm-2 control-label">IKS Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'indikatorkinerjasasaran',
                                    'name'          => 'indikatorkinerjasasaran',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'IKS Es.II',
                                    'maxlength'     => '100'
                                ),
                                set_value('indikatorkinerjasasaran', $indikatorkinerjasasaran['indikatorkinerjasasaran'])
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjasasaran');?>
                    </div>
                </div> <!--/ IKS Es.II -->
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
                                set_value('satuan', $indikatorkinerjasasaran['satuan'])
                            );

                        ?>
                        <?php echo form_error('satuan');?>
                    </div>
                </div> <!--/ Satuan -->
                <div class="form-group">
                    <label for="deskripsi" class="col-sm-2 control-label">Deskripsi IKS</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'deskripsi',
                                    'name'          => 'deskripsi',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Deskripsi IKS',
                                    'maxlength'     => '100'
                                ),
                                set_value('deskripsi', $indikatorkinerjasasaran['deskripsi'])
                            );

                        ?>
                        <?php echo form_error('deskripsi');?>
                    </div>
                </div> <!--/ Deskripsi IKS -->
                <div class="form-group">
                    <label for="prioritas_id" class="col-sm-2 control-label">Prioritas Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'prioritas_id',
                                $prioritas,
                                set_value('prioritas_id', $indikatorkinerjasasaran['prioritas_id']),
                                'class="form-control input-sm required"  id="prioritas_id"'
                            );

                        ?>
                        <?php echo form_error('prioritas_id');?>
                    </div>
                </div> <!--/ Prioritas Es.II -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/indikatorkinerjasasaran'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->