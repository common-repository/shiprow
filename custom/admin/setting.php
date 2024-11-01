<?php
/**
 * adding admin side page for plugin setting.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class SPROWAdminSetting 
{
	
	function __construct(){
		add_action( 'admin_menu', array($this , 'SPROW_settings_page_init' ) );
	}
	
	public function SPROW_settings_page_init(){
		// add custom menu page
		$settings_page = add_menu_page( 'SHIPROW', 'SHIPROW', 'edit_theme_options', 'sp-settings', array( $this, 'SPROW_admin_page' ), 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMzIuMDAwMDAwcHQiIGhlaWdodD0iMjAuMDAwMDAwcHQiIHZpZXdCb3g9IjAgMCAzMi4wMDAwMDAgMjAuMDAwMDAwIgogcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQgbWVldCI+CjxtZXRhZGF0YT4KQ3JlYXRlZCBieSBwb3RyYWNlIDEuMTYsIHdyaXR0ZW4gYnkgUGV0ZXIgU2VsaW5nZXIgMjAwMS0yMDE5CjwvbWV0YWRhdGE+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLDIwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTE4MCAxNDcgYzAgLTEwIC02IC0xNyAtMTIgLTE3IC05IDAgLTggLTQgMiAtMTEgMTIgLTkgMTIgLTEwIC0zIC01Ci0xMSAzIC0zMSA5IC00NSAxMyAtMjUgNyAtMjUgOCAxMyAxNCAyOCA1IDE5IDYgLTMwIDQgLTYwIC0yIC03MCAtNSAtNzIgLTIxCi0zIC0xNyAtMiAtMTcgNSAxIDggMTYgMTAgMTQgMTUgLTE0IDQgLTE5IDcgLTQ2IDcgLTYxIDAgLTI3IDAgLTI3IDQ4IC0xOCAyNgo1IDgzIDYgMTI3IDMgbDgwIC02IC01NSAzNiBjLTMwIDE5IC01NyAzNSAtNjAgMzUgLTQgMCAtNyA3IC03IDE2IDAgMTQgMiAxNAoxNCAtMiAxMCAtMTQgMTMgLTE1IDEzIC0yIDAgOCAtOSAyMyAtMjAgMzMgLTE4IDE2IC0yMCAxNiAtMjAgMnoiLz4KPC9nPgo8L3N2Zz4K');
		//add this action to save your setting page data
		add_action( "load-{$settings_page}", array( $this, 'SPROW_load_settings_page' ) );
	}

	public function SPROW_load_settings_page(){
		if ( isset( $_POST["sp-settings-submit"] ) && $_POST["sp-settings-submit"] == 'Y' ) {
			check_admin_referer( "sp-settings-page" );
			$this->SPROW_save_plugin_settings();
			$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.sanitize_text_field($_GET['tab']) : 'updated=true';
			wp_redirect(admin_url('admin.php?page=sp-settings&'.$url_parameters));
			exit;
		}
	}
	public function grp_save_plugin_settings() {
		global $pagenow;
		//save the plugin settings
		if ( $pagenow == 'admin.php' && $_GET['page'] == 'sp-settings' ){ 

		}
	}
	public function SPROW_admin_page(){
		global $pagenow,$sp_strings;
		

		if( isset( $_GET['tab'] ) && $_GET['tab'] == 'products' ){
			wp_enqueue_script( 'sp-popper-js' );
		}

		wp_enqueue_script( 'sp-bootstrap-js' );
		wp_enqueue_script( 'sp-slimscroll-js' );
		wp_enqueue_script( 'sp-app-js' );
		wp_enqueue_script( 'sp-layout-js' );

		wp_enqueue_script( 'sp-plugin-js' );
		wp_enqueue_style( 'google-fonts' );
		?>
		<!-- google font -->
  		
  			
  		<div class="sp-plugin-main page-content-white">
  			<div class="page-header navbar navbar-fixed-top ">
		  		<div class="page-header-inner ">
		  			<!-- logo start -->
		  			<div class="page-logo">
		  				<a href="?page=sp-settings&tab=home">
		  					<span class="logo-default"><img src="<?php echo plugins_url( '../assets/img/logoShiprow.png', __FILE__ ) ?>" width="180"></span></a>
		  			</div>
		  			<!-- logo end -->
		  			<ul class="nav navbar-nav navbar-left in">
					  	<li>
					  		<a href="#" class="menu-toggler sidebar-toggler">
					  			<i class="icon-menu"></i>
					  		</a>
					  	</li>
					</ul>
					  <!-- start mobile menu -->
					  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
					  <span></span>
					  </a>
					  <!-- end mobile menu -->
		  		</div>
		  	</div>
  		<!-- page container -->
  		<div class="page-container">
  			<?php 
  					include 'tabs/sidebar.php';
  			?>
  			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- page-content -->
				<div class="page-content">
					<?php 
		  					include 'tabs/breadcrumb.php';
		  			?>
					<!-- <form method="post" action="<?php admin_url( 'admin.php?page=keto-settings' ); ?>"> -->
						<?php
						wp_nonce_field( "sp-settings-page" ); 
						if ( $pagenow == 'admin.php' && $_GET['page'] == 'sp-settings' ){ 
							if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
							else $tab = 'marketplace';
							
							switch ( $tab ){
								case 'carrier_settings' :
									include 'tabs/carrier_settings.php';
								break; 
								case 'location' :
									include 'tabs/location.php';
								break;	
								case 'products' :
									include 'tabs/products.php';
									break;
								break;
								case 'box' :
									include 'tabs/box_sizes.php';
									break;
								break;	
								case 'box_sizes' :
									include 'tabs/box_sizes.php';
								break;
								case 'test_rates' :
									include 'tabs/test_rates.php';
								break;
								case 'marketplace' :
									include 'tabs/marketplace.php';
									break;
								case 'homepage' :
									include 'tabs/homepage.php';
								break;
								case 'plans' :
									include 'tabs/plans.php';
								break;
								case 'license' :
									include 'tabs/license.php';
								break;
								case 'shipping_rules' :
									include 'tabs/shipping_rules.php';
								break;						
								case 'shipping_rule_form' :
									include 'tabs/shipping_rule_form.php';
								break;
								case 'shipping_zones' :
									include 'tabs/shipping_zones.php';
								break;
								case 'shipping_zone_form' :
									include 'tabs/shipping_zone_form.php';
								break;
								case 'shipping_groups' :
									include 'tabs/shipping_groups.php';
								break;
								case 'shipping_group_form' :
									include 'tabs/shipping_group_form.php';
								break;
								case 'shipping_filters' :
									include 'tabs/shipping_filters.php';
								break;
								case 'shipping_filter_form' :
									include 'tabs/shipping_filter_form.php';
								break;
								case 'product_order' :
									include 'tabs/product_order.php';
								break;
								case 'import_page' :
									include 'tabs/import_page.php';
								break;
								case 'export_page' :
									include 'tabs/export_page.php';
								break;
								case 'test' :
									include 'tabs/test.php';
								break;
								case 'get_CSV' :
									include 'tabs/get_CSV.php';
								break;
								case 'insert_CSV' :
									include 'tabs/insert_CSV.php';
								break;
								default:
									include 'tabs/marketplace.php';
								break; 
							}
						}
						?>
						<input type="hidden" name="sp-settings-submit" value="Y">
					<!-- </form> -->
				</div>
				<!-- /page-content -->
			</div>
			<!-- end page content wrapper-->
  		</div>
  		<!-- /page container -->
		</div>
		<?php
		
	}
}
$sprowadminsetting = new SPROWAdminSetting();
?>