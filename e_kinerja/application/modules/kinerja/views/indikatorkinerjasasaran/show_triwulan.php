<?php if (empty($triwulan)) {  ?>

            <h4>Maaf, Data tidak ditemukan</h4>
            <div class="">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm edit-iks-triwulan" ik="" tw=""><i class="glyphicon glyphicon-search"></i> Tambah</button>
              </span>
            </div>

<?php } else { ?>
            <br>
            <div class="col-md-12">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="target_id" class="col-sm-3 control-label">Target</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['target']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="realisasi_id" class="col-sm-3 control-label">Realisasi</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['realisasi']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="analisiscapaian_id" class="col-sm-3 control-label">Analisis Capaian</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['analisiscapaian']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="faktorkeberhasilan_id" class="col-sm-3 control-label">Faktor Keberhasilan</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['faktorkeberhasilan']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="faktorkegagalan_id" class="col-sm-3 control-label">Faktor Kegagalan</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['faktorkegagalan']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="solusi_id" class="col-sm-3 control-label">Solusi</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['solusi']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sumberdaya_id" class="col-sm-3 control-label">Sumber daya</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['sumberdaya']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kegiatanpenunjang_id" class="col-sm-3 control-label">Kegiatan Penunjang</label>
                      <div class="col-sm-9">
                        <?php echo $triwulan['kegiatanpenunjang']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-sm edit-iks-triwulan" ik="<?php echo $triwulan['indikatorkinerjasasaran_id']; ?>" tw="<?php echo $triwulan['triwulan_id']; ?>"><i class="glyphicon glyphicon-search"></i> Edit</button>
                    </span>
                  </div>

                </div>
              <br>
            </div>
<script type="text/javascript">
$(document).ready(function() {
  $('.edit-iks-triwulan').bind('click', function (e) {
      twID = $(this).attr('tw');
      $.ajax({
          url: '<?php echo site_url('kinerja/indikatorkinerjasasaran/editikstriwulan'); ?>/' + $(this).attr('ik') + '/' + twID + '/',
          cache: false,
          type: 'get',
          dataType: 'html',
          success: function (result) {
              $('#tw'+twID).html(result);
              $('.summernote').summernote({height: 150, minHeight: null, maxHeight: null, focus: true});
          }
      });
  });
});
</script>

<?php } ?>