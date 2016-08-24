<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_unoreselon1" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Unit Eselon I</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="unoreselon1" class="col-sm-2 control-label">Unit Es.I</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'unoreselon1',
                                    'id'           => 'unoreselon1',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Unit Es.I',
                                    'maxlength'    => '100'
                                ),
                                set_value('unoreselon1', $unoreselon1['unoreselon1'])
                            );

                        ?>
                        <?php echo form_error('unoreselon1');?>
                    </div>
                </div> <!--/ Unit Es.I -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/unoreselon1'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->