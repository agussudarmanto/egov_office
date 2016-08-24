<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_output" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Output</div>
  <div class="panel-body">
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
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/output'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->