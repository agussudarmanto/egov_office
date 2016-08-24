                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right"> © 2015 Copyright. &nbsp; <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
            </div>
        </footer>
		<!-- Javascript Libs -->
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/jquery.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/Chart.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/bootstrap-switch.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/jquery.matchHeight-min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/jquery.dataTables.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/dataTables.bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/select2.full.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/ace/ace.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/ace/mode-html.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/ace/theme-github.js"); ?>"></script>
		<!-- Javascript -->
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/zjs.utils.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/jQuery.dtplugin.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("assets/lib/js/jQuery.cookie.js"); ?>"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js "></script>
		<script type="text/javascript" src="<?php echo site_url("assets/js/app.js"); ?>"></script>
		<?php
		if (!isset($ts)) $ts = ''; 
		if (isset($jsArray) && is_array($jsArray)) {
			foreach ($jsArray as $value) {
				echo '<script type="text/javascript" src="' . base_url() . $value . '?ts=' . $ts . '"></script>' . PHP_EOL;
			}
		}
		if (isset($cssArray)) {
			foreach ($cssArray as $value) {
				echo '<link href="' . base_url() . $value . '?ts=' . $ts . '" type="text/css" rel="stylesheet" />' . PHP_EOL;
			}
		}
		?>
		<?php if (!empty($js)) { ?><script type="text/javascript"><?=$js;?></script><?php } ?>
	</div>
</body>
</html>