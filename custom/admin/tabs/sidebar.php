<?php

global $sp_strings;
    

    $sidebar_list['license']['icon'] = 'fa fa-key' ;

    $sidebar_list['license']['title'] =  'License key';

     $sidebar_list['product_order']['icon'] = 'fa fa-first-order';

    $sidebar_list['product_order']['title'] = $sp_strings['product_order'];


    



   

    



    $sidebar_list['products']['icon'] = 'fa fa-product-hunt';

    $sidebar_list['products']['title'] = $sp_strings['products'];

    $sidebar_list['location']['icon'] = 'fa fa-map-marker';

    $sidebar_list['location']['title'] = $sp_strings['location'];

    

    $sidebar_list['box']['icon'] = 'fa fa-archive';

    $sidebar_list['box']['title'] = 'Box Sizes';

    // $sidebar_list['test']['icon'] = 'fa fa-archive';

    // $sidebar_list['test']['title'] = 'Test';



    


   


   

    $sidebar_list['carrier_settings']['icon'] = 'fa fa-cog';

    $sidebar_list['carrier_settings']['title'] = $sp_strings['carrier_settings'];

    // $sidebar_list['shipping_rules']['icon'] = 'fa fa-adn' ;

    // $sidebar_list['shipping_rules']['title'] =  $sp_strings['shipping_rules'];



    $sidebar_list['marketplace']['icon'] = 'fa fa-shopping-bag';

    $sidebar_list['marketplace']['title'] = $sp_strings['marketplace'];

    $sidebar_list['test_rates']['icon'] = 'fa fa-money';

    $sidebar_list['test_rates']['title'] = 'Test Rates';









    




?>

<!-- start sidebar menu -->

<div class="sidebar-container">

    <div class="sidemenu-container navbar-collapse collapse fixed-menu">

        <div id="remove-scroll" class="left-sidemenu">

            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                <li class="sidebar-toggler-wrapper hide">

                    <div class="menu-toggler sidebar-toggler">

                        <span></span>

                    </div>

                </li>

                <?php

                if( !empty( $sidebar_list ) ){

                    $tab_name = ( isset( $_GET['tab'] ) ) ? sanitize_text_field($_GET['tab']) : 'marketplace';

                    foreach ($sidebar_list as $name => $item) {

                        $active = ($name == $tab_name ) ? 'active' : '';

                        if($name=='shipping_rules'){
                            $active= (preg_match("/shipping_/i", $tab_name)?"active":"");
                            ?>
                                    <li class="nav-item <?php echo $active; ?>" >
                                        <a href="?page=sp-settings&tab=shipping_rules" class="nav-link nav-toggle"><i class="fa fa-server"></i>  <span class="title">Shipping Rules &nbsp<i class="fa fa-angle-down"></i></span>
                                        </a>
                                        <ul class="sub-menu" >
                                           <li class="nav-item <?=(preg_match("/shipping_rule/i", $tab_name)?"active":"")?>">
                                            <a href="?page=sp-settings&tab=shipping_rules" class="nav-link">
                                              <span class="title"><i class="fa fa-arrow-right"></i> Create Rule</span>
                                            </a>
                                          </li>
                                          <li class="nav-item <?=(preg_match("/shipping_zone/i", $tab_name)?"active":"")?>">
                                            <a href="?page=sp-settings&tab=shipping_zones" class="nav-link">
                                              <span class="title"><i class="fa fa-arrow-right"></i> Shipping Zone</span>
                                            </a>
                                          </li>
                                          <li class="nav-item <?=(preg_match("/shipping_group/i", $tab_name)?"active":"")?>">
                                            <a href="?page=sp-settings&tab=shipping_groups" class="nav-link">
                                              <span class="title"><i class="fa fa-arrow-right"></i>Shipping Groups</span>
                                            </a>
                                          </li>
                                          <li class="nav-item <?=(preg_match("/shipping_filter/i", $tab_name)?'active':'') ?>">
                                            <a href="?page=sp-settings&tab=shipping_filters" class="nav-link">
                                              <span class="title"><i class="fa fa-arrow-right"></i>Filters</span>
                                            </a>
                                          </li>
                                        </ul>
                                    </li>
    
                        <?php   
                        }else{
                        ?>

                        <li class="nav-item <?php echo $active; ?>">

                            <a href="?page=sp-settings&tab=<?php echo $name; ?>" class="nav-link nav-toggle">

                                 <i class="<?php echo $item['icon']; ?>"><?php if($item['icon'] == 'material-icons'){ echo 'event'; } ?></i>

                                <span class="title"><?php echo $item['title']; ?></span> 

                            </a>

                        </li>                        

                        <?php
                    }//end of else
                    }

                }

                ?>

            </ul>

        </div>

    </div>

</div>

<!-- end sidebar menu -->