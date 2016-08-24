<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify'); ?></div>
</div>
<!-- /.row-->
<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> Target Triwulan IKS Es.II</div>
  <div class="panel-body"></div>
  <?php if ($ikstriwulan) : ?>
  <table id="detail" class="table table-striped table-condensed">
    <tbody>
    <tr>
      <td width="20%" align="right"><strong>(IKS) Es.II</strong></td>
      <td><?php echo $ikstriwulan['indikatorkinerjasasaran']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Tahun</strong></td>
      <td><?php echo $ikstriwulan['tahun']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Triwulan</strong></td>
      <td><?php echo $ikstriwulan['triwulan']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Target</strong></td>
      <td><?php echo $ikstriwulan['target']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Realisasi</strong></td>
      <td><?php echo $ikstriwulan['realisasi']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Analisis Capaian</strong></td>
      <td><?php echo $ikstriwulan['analisiscapaian']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Faktor Keberhasilan</strong></td>
      <td><?php echo $ikstriwulan['faktorkeberhasilan']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Faktor Kegagalan</strong></td>
      <td><?php echo $ikstriwulan['faktorkegagalan']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Solusi</strong></td>
      <td><?php echo $ikstriwulan['solusi']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Sumber Daya</strong></td>
      <td><?php echo $ikstriwulan['sumberdaya']; ?></td>
    </tr>
    <tr>
      <td width="20%" align="right"><strong>Kegiatan Penunjang</strong></td>
      <td><?php echo $ikstriwulan['kegiatanpenunjang']; ?></td>
    </tr>
</tbody>
    <?php endif ?>
  </table>
  <!-- / Panel Body-->
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"><a href="<?php echo site_url('kinerja/ikstriwulan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a></div>
    </div>
  </div>
  <!-- / Panel Footer-->
</div>
<!-- / Panel-->