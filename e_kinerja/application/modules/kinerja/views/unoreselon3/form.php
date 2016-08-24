<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_unoreselon3" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Unit Eselon III</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="unoreselon2_id" class="col-sm-2 control-label">Unit Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon2_id',
                                $unoreselon2,
                                set_value('unoreselon2_id', $unoreselon3['unoreselon2_id']),
                                'class="form-control input-sm required"  id="unoreselon2_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon2_id');?>
                    </div>
                </div> <!--/ Unit Es.II -->
                <div class="form-group">
                    <label for="unoreselon3" class="col-sm-2 control-label">Unit Es.III</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'unoreselon3',
                                    'id'           => 'unoreselon3',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Unit Es.III',
                                    'maxlength'    => '100'
                                ),
                                set_value('unoreselon3', $unoreselon3['unoreselon3'])
                            );

                        ?>
                        <?php echo form_error('unoreselon3');?>
                    </div>
                </div> <!--/ Unit Es.III -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/unoreselon3'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->