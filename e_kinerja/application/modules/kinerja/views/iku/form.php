<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_iku" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Indikator Kinerja Utama (IKU) Es.I</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="unoreselon1_id" class="col-sm-2 control-label">Unit Es.I</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'unoreselon1_id',
                                $unoreselon1,
                                set_value('unoreselon1_id', $iku['unoreselon1_id']),
                                'class="form-control input-sm required"  id="unoreselon1_id"'
                            );

                        ?>
                        <?php echo form_error('unoreselon1_id');?>
                    </div>
                </div> <!--/ Unit Es.I -->
                <div class="form-group">
                    <label for="iku" class="col-sm-2 control-label">Misi</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'iku',
                                    'name'          => 'iku',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Misi',
                                    'maxlength'     => '100'
                                ),
                                set_value('iku', $iku['iku'])
                            );

                        ?>
                        <?php echo form_error('iku');?>
                    </div>
                </div> <!--/ Misi -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/iku'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->