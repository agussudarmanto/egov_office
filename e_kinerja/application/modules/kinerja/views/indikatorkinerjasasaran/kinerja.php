<style>
  .kinerja-kegiatan {background-color: #1ABC9C; font-weight: bold;}
  .kinerja-sasaran {background-color: #898E5A; color: #fefefe;}
  .kinerja-ikk {font-weight: bold; background-color: khaki;}
  .kinerja-iks {}
</style>

<div class="row">
  <div class="col-lg-12 col-md-12">
    <?php echo create_breadcrumb(); echo $this->session->flashdata('notify') ?>
  </div>
</div>
<!-- /.row-->

<section class="panel panel-default">
  <header class="panel-heading">
    <div class="row">
      <div class="col-md-8 col-xs-3">
        <?php echo anchor( site_url( 'kinerja/indikatorkinerjasasaran/add'), '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"' ); ?> Indikator Kinerja Sasaran (IKS) Es.II</div>
      <div class="col-md-4 col-xs-9">
        <?php echo form_open(site_url( 'kinerja/indikatorkinerjasasaran/search'), 'role="search" class="form"') ;?>
        <div class="input-group pull-right">
          <input type="text" placeholder="Cari data" name="q" autocomplete="off" class="form-control input-sm" />
          <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</button></span>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </header>
  <div class="panel-body">

<!-- Modal-->
<form role="form" class="form-horizontal">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="kegiatan_id" class="col-sm-3 control-label">Kegiatan</label>
        <div class="col-sm-9"><?php echo form_dropdown( 'kegiatan', $kegiatan, set_value('kegiatan_id', 1), 'class="form-control input-sm required" id="kegiatan_id"'); ?>
          <?php echo form_error('kegiatan_id');?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="sasaran_id" class="col-sm-3 control-label">Sasaran</label>
        <div class="col-sm-9"><?php echo form_dropdown( 'sasaran', $sasaran, set_value('sasaran_id', 1), 'class="form-control input-sm required" id="sasaran_id"'); ?>
          <?php echo form_error('sasaran_id');?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="indikatorkinerjakegiatan_id" class="col-sm-3 control-label">Indikator Kinerja Kegiatan</label>
        <div class="col-sm-9"><?php echo form_dropdown( 'indikatorkinerjakegiatan', $indikatorkinerjakegiatan, set_value('indikatorkinerjakegiatan_id', 1), 'class="form-control input-sm required" id="indikatorkinerjakegiatan_id"'); ?>
          <?php echo form_error('indikatorkinerjakegiatan_id');?>
        </div>
      </div>
    </div>
    <div class="col-md-6 pull-right">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</button>
      </span>
    </div>
  </div>
</form>

    <table class="table table-hover table-condensed">
      <thead>
        <tr>
            <th rowspan=3></th>
            <th rowspan=3 colspan=3>No</th>
            <th rowspan=3>Indikator Kinerja</th>
            <th rowspan=3>Target<br>Tahun 2015</th>
            <th colspan=12>Data per-Triwulan</th>
        </tr>
        <tr>
            <th colspan=4>Target</th>
            <th colspan=4>Realisasi</th>
            <th colspan=4>Capaian (%)</th>
        </tr>
        <tr>
            <th>I</th>
            <th>II</th>
            <th>III</th>
            <th>IV</th>
            <th>I</th>
            <th>II</th>
            <th>III</th>
            <th>IV</th>
            <th>I</th>
            <th>II</th>
            <th>III</th>
            <th>IV</th>
        </tr>
      </thead>
      <?php 
      $kegiatan_kode = $sasaran_kode = $ikk_kode = $output_kode = "";
      foreach ($sasarans as $sasaran) {

        if ($kegiatan_kode != $sasaran['kegiatan_kode']) { $kegiatan_kode = $sasaran['kegiatan_kode']; ?>
        <tr class="kinerja-kegiatan">
          <td colspan=18><br><?php echo $sasaran['kegiatan_kode']." - ".$sasaran['kegiatan']; ?></td>
        </tr><?php
        }

        if ($sasaran_kode != $sasaran['sasaran_kode']) { $sasaran_kode = $sasaran['sasaran_kode']; ?>
        <tr class="kinerja-sasaran">
          <td></td><td colspan=17><?php echo $sasaran['sasaran_kode']." - ".$sasaran['sasaran']; ?></td>
        </tr><?php
        }

        if ($ikk_kode != $sasaran['indikatorkinerjakegiatan_kode']) { $ikk_kode = $sasaran['indikatorkinerjakegiatan_kode']; ?>
        <tr class="kinerja-ikk">
          <td colspan="2"></td><td colspan=3><?php echo $sasaran['indikatorkinerjakegiatan_kode']." - ".$sasaran['indikatorkinerjakegiatan']; ?></td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr><?php 
        }

        if ($output_kode != $sasaran['output_kode'] && $sasaran['output_kode'] != "") { $output_kode = $sasaran['output_kode']; ?>
        <tr class="kinerja-output">
          <td colspan="3"></td><td colspan=15><?php echo $sasaran['output_kode']." - ".$sasaran['output']; ?> <span class="label label-default">OP</span></td>
        </tr><?php 
        }

        if ($sasaran['indikatorkinerjasasaran_kode'] != "") {
        ?>
        <tr class="kinerja-iks">
          <td colspan="4"></td>
          <td colspan=""><button type="button" class="btn btn-primary btn-xs" title="edit data"><span class="glyphicon glyphicon-pencil"></span></button> 
            <a href="<?php echo site_url( 'kinerja/indikatorkinerjasasaran/showiks/'. $sasaran['indikatorkinerjasasaran_id']); ?>"><?php echo $sasaran['indikatorkinerjasasaran_kode']." - ".$sasaran['indikatorkinerjasasaran']; ?>
          </td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td>100%</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr><?php 
        }
      }?>
    </table>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-3"> Indikator Kinerja Sasaran (IKS) Es.II <span class="label label-info"><?php //echo $total; ?></span></div>
      <div class="col-md-9"></div>
      <?php //echo $pagination; ?>
    </div>
  </div>
</section>