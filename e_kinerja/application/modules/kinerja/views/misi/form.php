<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_misi" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Misi Unit Es.I</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="unoreselon1_id" class="col-sm-2 control-label">Unit Es.I</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon1_id',
                                $unoreselon1,
                                set_value('unoreselon1_id', $misi['unoreselon1_id']),
                                'class="form-control input-sm required"  id="unoreselon1_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon1_id');?>
                    </div>
                </div> <!--/ Unit Es.I -->
                <div class="form-group">
                    <label for="misi" class="col-sm-2 control-label">Misi</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'misi',
                                    'name'          => 'misi',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Misi',
                                    'maxlength'     => '100'
                                ),
                                set_value('misi', $misi['misi'])
                            );

                        ?>
                        <?php echo form_error('misi');?>
                    </div>
                </div> <!--/ Misi -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/misi'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->