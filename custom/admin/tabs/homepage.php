  <?php

//for datatable design

wp_enqueue_style( 'sp-datatable-bootstrap-css' );

//datatable js

wp_enqueue_script( 'sp-datatable-js' );

//datatable bootstrap css

wp_enqueue_script( 'sp-datatable-bootstrap-js' );

//custom js for datatable

wp_enqueue_script( 'sp-table-js' );

//tag script

wp_enqueue_script( 'sp-tag-js' );

// tag css

wp_enqueue_style( 'sp-tag-css' );

//for form validation

wp_enqueue_script( 'sp-validation-js' );

//for form validation plugin

wp_enqueue_script( 'sp-form-js' );


?>

  <!-- BEGIN HEAD -->

<style type="text/css">
  .page-content{
    min-height: 750px !important;
  }
  .feed-user-img .fa.fa-circle-thin{
    font-size: 34px;
    margin-top: 15px;
    left: 45px;
    background: white;
    background-size: unset;
    color: green;
  }
  img.img-responsive{
   height: 25vh;
   width: 25%;
   padding: 12px;
 }
 .psteps{
  font-size: 20px;
  margin-top: -14px;
}
.psteps1{
  font-size: 20px;
}
p.box-p.text-black {
  font-size: 17px;
  font-weight: 600;
}
i.fa.fa-calculator ,i.fa.fa-truck , i.fa.fa-pencil , i.fa.fa-check-circle-o,
i.fa.fa-hand-pointer-o , i.fa.fa-dollar{
  font-size: 39px;
  padding: 23px;
}
/*used id as marker is also used in side bar so messes that up to*/
#faMarker{
  font-size: 39px;
  
  padding: 23px;
}
#faArchive{
  font-size: 39px;
  
  padding: 23px;
}
i.fa.fa-hand-pointer-o{
  font-size: 39px;
  
  padding: 23px;
  background: red;
  border-radius: 55px;
}
i.fa.fa-dollar{
  font-size: 39px;
  
  padding: 23px;
  background: yellow;
  border-radius: 35px;
}
#faArchive{
  font-size: 39px;
  
  padding: 23px;
  background: purple;
  border-radius: 46px;
}
.fatext i.fa.fa-truck{
 font-size: 39px;
 
 padding: 23px;
 background:green;
 border-radius: 40px;
}
.fatext{
  margin: 10px;
}
.callbox{
  background: blue;
  padding: 36px;
  margin: 0px;

}
}
.callbox .fa-headphones{

}
#details {
  padding: 60px 0;
}
#details .details-box {
    background: #f7f7f7;
    padding: 10px 9px 0px 6px;
    position: relative;
}
#details .details-box .main-hover-icon-compare,
#details .details-box .main-hover-icon-user,
#details .details-box .main-hover-icon-vendor {
  transition: 0.5s;
}
#details .details-box:hover .hover-icon-compare,
#details .details-box:hover .hover-icon-user,
#details .details-box:hover .hover-icon-vendor {
  opacity: 1;
}
#details .details-box:hover .main-hover-icon-compare,
#details .details-box:hover .main-hover-icon-user,
#details .details-box:hover .main-hover-icon-vendor {
  opacity: 0;
}
#details .details-title {
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 14px;
}
#details .details-description {
  transform: translateX(10px);
  font-size: 12px;
}
#details .details-description p {
  color: #999999;
}
#details .details-img {
  padding-top: 17px;
}
#details .details-active {
  background-size: cover;
  background-image: url("../img/details-img/active-bg.png");
}
#details .details-active-title {
  color: white;
  font-size: 25px;
  font-weight: 900;
  margin-top: 13px;
}
#details .hover-icon-compare {
  transform: translate(-50%, -61%);
}
#details .hover-icon-user {
  transform: translate(-50%, -40%);
}
#details .hover-icon-vendor {
  transform: translate(-50%, -60%);
}
#details .hover-icon-compare,
#details .hover-icon-user,
#details .hover-icon-vendor {
  position: absolute;
  left: 50%;
  top: 50%;
  transition: 0.5s;
  opacity: 0;
}

.arow {
  position: absolute;
  top: 0;
  right: -22px;
  height: 100%;
  z-index: 10;
}
.arow img {
  height: 100%;
}
</style>
                      <!-- end header -->
                      <!-- start color quick setting -->
             
                      <!-- end color quick setting -->
                      <!-- start page container -->
                        <!-- start sidebar menu -->
                             
                        <!-- end sidebar menu -->
                        <!-- start page content -->
                       
                            <!-- Start Container -->
                           


               <!-- Start Container End -->
               <!-- first Container -->
               <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="card-box">
                    <div class="card-head">
                      <header>Welcome Mr 
                    </div>
                    <div class="card-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-7 offset-md-5">
                          
                          </div>
                          <div class="col-md-12 text-center">
                            <h2>Congrats, Your Basic Setup is Complete</h2>
                          </div>
                          <hr>
                          <div class="col-md-12 text-center">
                            <p class="psteps">
                              <b>Here are some next steps to take:</b>
                            </p>
                          </div>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-xl-3 col-md-6 col-12">
                                <a href="admin.php?page=sp-settings&tab=test_rate">
                                  <div class="info-box bg-b-green">
                                   <div class="text-center">
                                     <i class="fa fa-calculator"></i>
                                     <p class="box-p text-black">
                                       Test Your Rate
                                     </p>
                                   </div>
                                 </div>
                               </a>
                               <!-- /.info-box -->
                             </div>
                             <!-- /.col -->
                             <div class="col-xl-3 col-md-6 col-12">
                              <a href="admin.php?page=sp-settings&tab=test_rate">
                                <div class="info-box bg-b-yellow">
                                  <div class="text-center">
                                   <i class="fa fa-truck"></i>
                                   <p class="box-p text-black">
                                     Add Carriers
                                   </p>
                                 </div>
                               </div>
                             </a>
                             <!-- /.info-box -->
                           </div>
                           <!-- /.col -->
                           <div class="col-xl-3 col-md-6 col-12">
                            <div class="info-box bg-b-blue">
                             <div class="text-center">
                               <i class="fa fa-pencil"></i>
                               <p class="box-p text-black">
                                 Create Rules
                               </p>
                             </div>
                           </div>
                           <!-- /.info-box -->
                         </div>
                         <!-- /.col -->
                         <div class="col-xl-3 col-md-6 col-12">
                          <div class="info-box bg-b-pink">
                            <div class="text-center">
                              <i class="fa fa-check-circle-o"></i>
                              <p class="box-p text-black">
                                Explore Features
                              </p>
                            </div>
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <p class="psteps1">
                        <b>Get these rates in your cart!</b>
                      </p>
                      <a href="">
                        How to setup SHIPROW within in WooCommerce
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- first Container -->
        <!-- Second Container -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-box">
              <div class="card-body">
                <div class="container">
                 <div class="row">
                   <div class="col-md-12">
                    <div class="row">
                      <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-blue">
                          <div class="fatext text-center">
                            <i class="fa fa-dollar"></i>
                          </div>
                          <div class="text-center">
                           <p class="box-p text-black">
                             Surcharge & Discount Rates
                           </p>
                         </div>
                       </div>
                       <!-- /.info-box -->
                     </div>
                     <!-- /.col -->
                     <div class="col-xl-3 col-md-6 col-12">
                      <div class="info-box bg-b-blue">
                        <div class="fatext text-center">
                         <i class="fa fa-hand-pointer-o"></i>
                       </div>
                       <div class="text-center">
                         <p class="box-p text-black">
                           Prevent/Hide Shipping Methods
                         </p>
                       </div>
                     </div>
                     <!-- /.info-box -->
                   </div>
                   <!-- /.col -->
                   <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue">
                      <div class="fatext text-center">
                        <i class="fa fa-archive" id="faArchive"></i>
                      </div>
                      <div class="text-center">
                       <p class="box-p text-black">
                         Override/Set Flat Rates <br> &nbsp
                       </p>
                     </div>
                   </div>
                   <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-xl-3 col-md-6 col-12">
                  <div class="info-box bg-b-blue" style="min-height: 27.4vh;">
                    <div class="fatext text-center">
                      <i class="fa fa-truck"></i>
                    </div>
                    <div class="text-center">
                      <p class="box-p text-black">
                        Free Shipping <br> &nbsp
                      </p>
                    </div>
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            </div><br>
            <div class="col-md-12">
             <div class="text-center">
               <a href="#" class="btn btn-lg btn-round btn-warning">
                 See More Example
               </a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

 <div class="row">
                              <div class="col-md-12">
                                <div class="card-box">
                                  <div class="card-body">
                                    <div id="details">
                                      <div class="container">
                                        <div class="row wow fadeInLeft animated justify-content-center" data-wow-delay="600ms">
                                         <div class="col-md-12 text-center">
                                           <h1>Welcome to SHIPROW</h1>
                                         </div>
                                         <div class="col-10 col-sm-8 col-lg-3 details-box">
                                          <div class="info-box bg-b-blue" style="padding: 0px;">
                                                <div class="fatext text-center">
                                                 <i class="fa fa-map-marker" id="faMarker"></i>
                                               </div>
                                               <div class="text-center">
                                                 <p class="box-p text-black">
                                                   Origin
                                                 </p>
                                               </div>
                                             </div>
                                      </div>
                                      <div class="col-10 col-sm-8 col-lg-3 details-box">
                                        <a href="admin.php?page=sp-settings&tab=marketplace" >
                                           <div class="info-box bg-b-blue" style="padding: 0px;">
                                            <div class="fatext text-center">
                                             <i class="fa fa-map-marker" id="faMarker"></i>
                                           </div>
                                           <div class="text-center">
                                             <p class="box-p text-black">
                                               Carrier
                                             </p>
                                           </div>
                                         </div>
                                       </a>
                                  </div>
                                  <div class="col-10 col-sm-8 col-lg-3 details-box">
                                    <a href="admin.php?page=sp-settings&tab=test_rate">
                                     <div class="info-box bg-b-blue" style="padding: 0px;">
                                      <div class="fatext text-center">
                                       <i class="fa fa-calculator"></i>
                                     </div>
                                     <div class="text-center">
                                       <p class="box-p text-black">
                                        Get Rates
                                      </p>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-12 text-center">
                               <h3>In just a few easy steps you can  get set up  and start getting rates</h3>
                               <button class="btn btn-primary">Start Now</button>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>

<!-- Second Container -->
<!-- third Container -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card-box">
      <div class="card-head"></div>
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <h2>
                  <b>Next Steps & More Information</b>
                </h2>
                <hr>
              </div>
            </div>
            <div class="col-md-6">

              <div class="card-box">
                <div class="card-head">
                  <header>Activity Shortcuts</header>          
                </div>
                <div class="card-body ">
                  <ul class="feedBody">
                    <li class="diactive-feed">
                      <div class="feed-user-img">
                        <i class="fa fa-circle-thin"></i>
                      </div>
                      <h4>
                       Select Plan 
                     </h4>
                     <p class="m-b-15 m-t-15">
                      Select Your Product Store with Products to Sell
                    </p>
                    <a href="admin.php?page=sp-settings&tab=plans">
                      <button class="btn blue-bgcolor btn-outline m-b-10" type="button"> Select Plan </button>
                    </a>
                  </li>
                  <li class="diactive-feed">
                    <div class="feed-user-img">
                      <i class="fa fa-circle-thin"></i>
                    </div>
                    <h4>
                     Market Place 
                   </h4>
                   <p class="m-b-15 m-t-15">
                    Select Your Market Store with Products to Sell
                  </p>
                  <a href="admin.php?page=sp-settings&tab=marketplace">
                    <button class="btn blue-bgcolor btn-outline m-b-10" type="button">Market Place </button>
                  </a>
                </li>
                <li class="diactive-feed">
                  <div class="feed-user-img">
                    <i class="fa fa-circle-thin"></i>
                  </div>
                  <h4>
                   Carrier Settings
                 </h4>
                 <p class="m-b-15 m-t-15">
                  Select Your carrier with Products to Sell
                </p>
                <a href="admin.php?page=sp-settings&tab=carrier_settings">
                  <button class="btn blue-bgcolor btn-outline m-b-10" type="button">Carrier Settings</button>
                </a>
              </li>
              <li class="diactive-feed">
                <div class="feed-user-img">
                  <i class="fa fa-circle-thin"></i>
                </div>
                <h4>
                 Add Products 
               </h4>
               <p class="m-b-15 m-t-15">
                Populate Your Product Store with Products to Sell
              </p>
              <a href="admin.php?page=sp-settings&tab=products">
                <button class="btn blue-bgcolor btn-outline m-b-10" type="button">Add Products</button>
              </a>
            </li>
            <li class="diactive-feed">
              <div class="feed-user-img">
                <i class="fa fa-circle-thin"></i>
              </div>
              <h4>
               Select Locations 
             </h4>
             <p class="m-b-15 m-t-15">
              Select Your Location of Store with Products to Sell
            </p>
            <a href="admin.php?page=sp-settings&tab=location">
              <button class="btn blue-bgcolor btn-outline m-b-10" type="button">Select Location</button>
            </a>
          </li>
          <li class="diactive-feed">
            <div class="feed-user-img">
              <i class="fa fa-circle-thin"></i>
            </div>
            <h4>
             Manage Box Sizes 
           </h4>
           <p class="m-b-15 m-t-15">
            Select Your Product Box Sizes with Products to Sell
          </p>
          <a href="admin.php?page=sp-settings&tab=box_sizes">
            <button class="btn blue-bgcolor btn-outline m-b-10" type="button">Manage Box Sizes</button>
          </a>
        </li>
      </ul>
    </div>
  </div>

</div>
<div class="col-md-6">
  <table>
    <tr>
      <th>Help videos</th>
      <th>Frequently Asked Question</th>
    </tr>
    <tr>
      <td>
        <a href="" class="nav-link">SHIPROW Overview</a>
      </td>
      <td>
        <a href="" class="nav-link">
          What carriers are supported?
        </a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="" class="nav-link">SHIPROW Date and Time Capabilites</a>
      </td>
      <td>
        <a href="" class="nav-link">
          How do I troubleshoot rate discrepancies?
        </a>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        <a href="" class="nav-link">
          How do I Setup Live rates Carriers ?
        </a>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        <a href="" class="nav-link">
          How do I Setup Shipping Rules?
        </a>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        <a href="" class="nav-link">
          How do I Limit Carrier to specific Countries/State?
        </a>
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        <a href="" class="nav-link">
          How do I Setup Multi Origin Shipping?
        </a>
      </td>
    </tr>
  </tr>
  <tr>
    <td>

    </td>
    <td>
      <a href="" class="nav-link">
        What Plan am I on?
      </a>
    </td>
  </tr>
</table>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-12 col-sm-6"> 
    <div class="blogThumb">
      <div class="course-box">
        <div class="row">
          <div class="col-md-2">
            <div class="text-center callbox">
              <i class="fa fa-headphones" style="color: white;
              font-size: 82px;
              margin: 21px 1px;"></i>
            </div>
          </div>
          <div class="col-md-8">
            <div class="text-left">
              <h3>
                Let us help you to Tackle Your Shipping Goals 
                Consultation ad configuration plan starting 
              </h3>
            </div>
          </div>
          <div class="col-md-2">
            <div class="text-center" style="
            margin: 28px;
            ">
            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Contact Us</button>
          </div>
        </div>
      </div>


    </div>
  </div>  
</div>

</div>
<!-- end page content -->

<!-- end chat sidebar -->
<!-- end page container -->
<!-- start footer -->

<!-- end footer -->



