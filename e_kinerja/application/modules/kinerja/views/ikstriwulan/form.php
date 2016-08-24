<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<?php echo form_open(site_url( 'kinerja/' . $action), 'role="form" class="form-horizontal" id="form_ikstriwulan" parsley-validate'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Target Triwulan IKS Es.II</div>
  <div class="panel-body">
                <div class="form-group">
                    <label for="indikatorkinerjasasaran_id" class="col-sm-2 control-label">(IKS) Es.II</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'indikatorkinerjasasaran_id',
                                $indikatorkinerjasasaran,
                                set_value('indikatorkinerjasasaran_id', $ikstriwulan['indikatorkinerjasasaran_id']),
                                'class="form-control input-sm required"  id="indikatorkinerjasasaran_id"'
                            );

                        ?>
                        <?php echo form_error('indikatorkinerjasasaran_id');?>
                    </div>
                </div> <!--/ (IKS) Es.II -->
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
                                set_value('tahun', $ikstriwulan['tahun'])
                            );

                        ?>
                        <?php echo form_error('tahun');?>
                    </div>
                </div> <!--/ Tahun -->
                <div class="form-group">
                    <label for="triwulan_id" class="col-sm-2 control-label">Triwulan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_dropdown(
                                'triwulan_id',
                                $triwulan,
                                set_value('triwulan_id', $ikstriwulan['triwulan_id']),
                                'class="form-control input-sm required"  id="triwulan_id"'
                            );

                        ?>
                        <?php echo form_error('triwulan_id');?>
                    </div>
                </div> <!--/ Triwulan -->
                <div class="form-group">
                    <label for="target" class="col-sm-2 control-label">Target</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'target',
                                    'id'           => 'target',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Target',
                                    'maxlength'    => '100'
                                ),
                                set_value('target', $ikstriwulan['target'])
                            );

                        ?>
                        <?php echo form_error('target');?>
                    </div>
                </div> <!--/ Target -->
                <div class="form-group">
                    <label for="realisasi" class="col-sm-2 control-label">Realisasi</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_input(
                                array(
                                    'name'         => 'realisasi',
                                    'id'           => 'realisasi',
                                    'class'        => 'form-control input-sm required',
                                    'placeholder'  => 'Realisasi',
                                    'maxlength'    => '100'
                                ),
                                set_value('realisasi', $ikstriwulan['realisasi'])
                            );

                        ?>
                        <?php echo form_error('realisasi');?>
                    </div>
                </div> <!--/ Realisasi -->
                <div class="form-group">
                    <label for="analisiscapaian" class="col-sm-2 control-label">Analisis Capaian</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'analisiscapaian',
                                    'name'          => 'analisiscapaian',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Analisis Capaian',
                                    'maxlength'     => '100'
                                ),
                                set_value('analisiscapaian', $ikstriwulan['analisiscapaian'])
                            );

                        ?>
                        <?php echo form_error('analisiscapaian');?>
                    </div>
                </div> <!--/ Analisis Capaian -->
                <div class="form-group">
                    <label for="faktorkeberhasilan" class="col-sm-2 control-label">Faktor Keberhasilan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'faktorkeberhasilan',
                                    'name'          => 'faktorkeberhasilan',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Faktor Keberhasilan',
                                    'maxlength'     => '100'
                                ),
                                set_value('faktorkeberhasilan', $ikstriwulan['faktorkeberhasilan'])
                            );

                        ?>
                        <?php echo form_error('faktorkeberhasilan');?>
                    </div>
                </div> <!--/ Faktor Keberhasilan -->
                <div class="form-group">
                    <label for="faktorkegagalan" class="col-sm-2 control-label">Faktor Kegagalan</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'faktorkegagalan',
                                    'name'          => 'faktorkegagalan',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Faktor Kegagalan',
                                    'maxlength'     => '100'
                                ),
                                set_value('faktorkegagalan', $ikstriwulan['faktorkegagalan'])
                            );

                        ?>
                        <?php echo form_error('faktorkegagalan');?>
                    </div>
                </div> <!--/ Faktor Kegagalan -->
                <div class="form-group">
                    <label for="solusi" class="col-sm-2 control-label">Solusi</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'solusi',
                                    'name'          => 'solusi',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Solusi',
                                    'maxlength'     => '100'
                                ),
                                set_value('solusi', $ikstriwulan['solusi'])
                            );

                        ?>
                        <?php echo form_error('solusi');?>
                    </div>
                </div> <!--/ Solusi -->
                <div class="form-group">
                    <label for="sumberdaya" class="col-sm-2 control-label">Sumber Daya</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'sumberdaya',
                                    'name'          => 'sumberdaya',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Sumber Daya',
                                    'maxlength'     => '100'
                                ),
                                set_value('sumberdaya', $ikstriwulan['sumberdaya'])
                            );

                        ?>
                        <?php echo form_error('sumberdaya');?>
                    </div>
                </div> <!--/ Sumber Daya -->
                <div class="form-group">
                    <label for="kegiatanpenunjang" class="col-sm-2 control-label">Kegiatan Penunjang</label>
                    <div class="col-sm-6">
                        <?php

                            echo form_textarea(
                                array(
                                    'id'            => 'kegiatanpenunjang',
                                    'name'          => 'kegiatanpenunjang',
                                    'rows'          => '3',
                                    'class'         => 'form-control input-sm required',
                                    'placeholder'   => 'Kegiatan Penunjang',
                                    'maxlength'     => '100'
                                ),
                                set_value('kegiatanpenunjang', $ikstriwulan['kegiatanpenunjang'])
                            );

                        ?>
                        <?php echo form_error('kegiatanpenunjang');?>
                    </div>
                </div> <!--/ Kegiatan Penunjang -->
</div>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/ikstriwulan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        <button type="submit" name="post" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Simpan</button>
      </div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->