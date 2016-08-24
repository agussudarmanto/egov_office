            <br>
            <div class="col-md-12">
              <form role="form" class="form-horizontal">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="target_id" class="col-sm-2 control-label">Target</label>
                      <div class="col-sm-10"><?php echo form_input( array( 'id' => 'target', 'name' => 'target', 'rows' => '3', 'class' => 'form-control input-sm required', 'placeholder' => 'Target', 'maxlength' => '100'), set_value('target', $triwulan['target']) ); ?>
                        <?php echo form_error('target_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="realisasi_id" class="col-sm-2 control-label">Realisasi</label>
                      <div class="col-sm-10"><?php echo form_input( array( 'id' => 'realisasi', 'name' => 'realisasi', 'rows' => '3', 'class' => 'form-control input-sm required', 'placeholder' => 'Realisasi', 'maxlength' => '100'), set_value('realisasi', $triwulan['realisasi']) ); ?>
                        <?php echo form_error('realisasi_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="analisiscapaian_id" class="col-sm-2 control-label">Analisis Capaian</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'analisiscapaian', 'name' => 'analisiscapaian', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Analisis Capaian', 'maxlength' => '100'), set_value('analisiscapaian', $triwulan['analisiscapaian']) ); ?>
                        <?php echo form_error('analisiscapaian_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="faktorkeberhasilan_id" class="col-sm-2 control-label">Faktor Keberhasilan</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'faktorkeberhasilan', 'name' => 'faktorkeberhasilan', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Faktor Keberhasilan', 'maxlength' => '100'), set_value('faktorkeberhasilan', $triwulan['faktorkeberhasilan']) ); ?>
                        <?php echo form_error('faktorkeberhasilan_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="faktorkegagalan_id" class="col-sm-2 control-label">Faktor Kegagalan</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'faktorkegagalan', 'name' => 'faktorkegagalan', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Faktor Kegagalan', 'maxlength' => '100'), set_value('faktorkegagalan', $triwulan['faktorkegagalan']) ); ?>
                        <?php echo form_error('faktorkegagalan_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="solusi_id" class="col-sm-2 control-label">Solusi</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'solusi', 'name' => 'solusi', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Solusi', 'maxlength' => '100'), set_value('solusi', $triwulan['solusi']) ); ?>
                        <?php echo form_error('solusi_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sumberdaya_id" class="col-sm-2 control-label">Sumberdaya</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'sumberdaya', 'name' => 'sumberdaya', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Sumberdaya', 'maxlength' => '100'), set_value('sumberdaya', $triwulan['sumberdaya']) ); ?>
                        <?php echo form_error('sumberdaya_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kegiatanpenunjang_id" class="col-sm-2 control-label">Kegiatan Penunjang</label>
                      <div class="col-sm-10"><?php echo form_textarea( array( 'id' => 'kegiatanpenunjang', 'name' => 'kegiatanpenunjang', 'rows' => '3', 'class' => 'summernote form-control input-sm required', 'placeholder' => 'Kegiatan Penunjang', 'maxlength' => '100'), set_value('kegiatanpenunjang', $triwulan['kegiatanpenunjang']) ); ?>
                        <?php echo form_error('kegiatanpenunjang_id');?>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Simpan</button>
                    </span>
                  </div>

                </div>
              </form>
              <br>
            </div>
<script type="text/javascript">
  $('#analisiscapaian').summernote({height: 150, minHeight: null, maxHeight: null, focus: true});
  $('.summernote').summernote({height: 150, minHeight: null, maxHeight: null, focus: true});
</script>