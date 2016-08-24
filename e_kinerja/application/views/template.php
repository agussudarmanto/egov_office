<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>intraNET</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <!-- SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/head.min.js"></script>
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?php echo site_url(); ?>">intraNET</a>
            </div>
<?php if (isset($this->session->userdata['identity'])) { ?>
            <div class="notifications-wrapper">
                <ul class="nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Penyusunan Perjanjian Kinerja (triwulanan)</strong>
                                                    <span class="pull-right text-muted">60% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        <span class="sr-only">60% Complete (danger)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 2</strong>
                                                    <span class="pull-right text-muted">30% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                        <span class="sr-only">30% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 3</strong>
                                                    <span class="pull-right text-muted">80% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                        <span class="sr-only">80% Complete (warning)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>Task 4</strong>
                                                    <span class="pull-right text-muted">90% Complete</span>
                                                </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                        <span class="sr-only">90% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>See Tasks List + </strong>
                                        </a>
                                    </li>
                                </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url( 'auth/logout/'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
<?php } ?>
    
        </nav>
        <!-- /. NAV TOP  -->

<?php if (isset($this->session->userdata['identity'])) { ?>
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle" />
                        </div>
                    </li>
                    <li>
                        <a href="#"> <strong><?php echo $this->session->userdata['realname']; ?></strong></a>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="<?php echo site_url( 'kinerja/misi/'); ?>"><i class="fa fa-bolt "></i>Kinerja</a>
                    </li>
                    <li>
                        <a href="ui.html"><i class="fa fa-venus "></i>Jadwal Pimpinan </a>
                    </li>
                    <li>
                        <a href="table.html"><i class="fa fa-code "></i>Dana Op. Pimp. </a>
                    </li>
                    <li>
                        <a  href="blank.html"><i class="fa fa-dashcube "></i>Ruang Rapat</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>File Server <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-cogs "></i>Second  Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third  Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
<?php } ?>
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
<?php if (isset($this->session->userdata['identity'])) { ?>
                <div class="row">
                    <style>
                        #page-inner .navbar-header { background-color: #f8f8f8; }
                    </style>
                    <nav class="navbar navbar-default" role="navigation">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#"><i class="fa fa-bolt "></i> Modul Kinerja</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                          <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tasks fa-fw"></i> Data <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url( 'kinerja/misi/'); ?>">1. Misi unit organisasi</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/sasaranstrategis/'); ?>">2. Sasaran strategis unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/program/'); ?>">3. Program unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/outcome/'); ?>">4. Outcome unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/iku/'); ?>">5. Indikator Kinerja Utama (IKU) unit</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url( 'kinerja/kegiatan/'); ?>">6. Kegiatan unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/sasaran/'); ?>">7. Sasaran Kegiatan unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/indikatorkinerjakegiatan/'); ?>">8. Indikator Kinerja Kegiatan (IKK) unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/indikatorkinerjasasaran/'); ?>">9. Indikator Kinerja Sasaran (IKS) unit</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/output/'); ?>">10. Output unit</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url( 'kinerja/pktbiro/'); ?>">11. Pengukuran unit Es.II</a></li>
                              </ul>
                            </li>
                          </ul>

                          <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tasks fa-fw"></i> Laporan <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">PKT BUA</a></li>
                                <li><a href="#">PKT Biro</a></li>
                                <li><a href="#">...</a></li>
                                <li class="divider"></li>
                                <li><a href="#">...</a></li>
                              </ul>
                            </li>
                          </ul>

                          <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Referensi <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url( 'kinerja/dukungan/'); ?>">Jenis Dukungan</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/jenisoutput/'); ?>">Jenis output</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/prioritas/'); ?>">Jenis Prioritas</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/triwulan/'); ?>">Triwulan</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url( 'kinerja/unoreselon1/'); ?>">Unit Eselon I</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/unoreselon2/'); ?>">Unit Eselon II</a></li>
                                <li><a href="<?php echo site_url( 'kinerja/unoreselon3/'); ?>">Unit Eselon III</a></li>
                              </ul>
                            </li>
                          </ul>

                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                </div>
<?php } ?>
                <div class="row">
                <?php echo $content; ?>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 Badan Urusan Administrasi | Mahkamah Agung Republik Indonesia
    </footer>
    <script type="text/javascript">
        head.js('<?php echo base_url(); ?>assets/js/jquery-1.11.1.js');
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <?php echo $js; ?>
    <!-- By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a> -->
<pre>
</pre>
</body>
</html>