<?php

if (! defined('ABSPATH') ) {
    exit;
}
  
$dash_link = get_option('camweara_dashboard_link');

if($dash_link == '' && $_GET['camweara_signup']){

    $site_url = get_bloginfo('url');
    $domain = camweara_get_domain_from_url($site_url);
    $adminEmail = get_bloginfo('admin_email');

	$data = [
			'company' => $domain,
			'email' => $adminEmail,
		];

    
	$dash_link = camweara_signup($data);

	if($dash_link){
		update_option('camweara_dashboard_link', $dash_link);
	}
}

?>


<div class="wrap">

	<?php if(!$dash_link){ ?>
	<div class="camweara-consent tab-container" style="background:#fff;">
		<div class="container">
			<div class="tab-content">
				<div class="pricingplans" style="text-align:center;">
					<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/Logo.png">
					<div class="title" style="text-align:center;">
						<strong>We Value Your Privacy</strong>
					</div>
				</div>
				<p>Before proceeding with the registration process on our Camweara platform, we kindly ask for your consent to use your store name and email address solely for the purpose of providing you with a free trial lasting 7 days. Your information will be securely stored and used only in accordance with our privacy policy. By agreeing to register, you authorize us to send you relevant communications regarding your trial and our services. Rest assured, your data will not be shared with third parties without your explicit consent. If you agree to these terms, please proceed with the registration process to begin your Camweara trial. Thank you for choosing us!</p>
				<div class="contactus-content">
					<a href="<?php echo admin_url( 'admin.php?page=camweara&camweara_signup=1' ); ?>" class="go-dashboard">Proceed</a>
				</div>
			</div>
		</div>
	</div>
    <?php }
	else{?>
	<div class="tab-container">
        <div class="container">
            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#uploadimage"> <span>1</span> <?php echo esc_html_e('Upload
                        image', 'camweara-virtual-try-on');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#apiintegration"><span>2</span> <?php echo esc_html_e('API integration', 'camweara-virtual-try-on');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#pricingplans"><span>3</span> <?php echo esc_html_e('Pricing plans', 'camweara-virtual-try-on');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#contactus"><span>4</span><?php echo esc_html_e('Contact us', 'camweara-virtual-try-on');?></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                 <!-- Tab panes 1 -->
                <div id="uploadimage" class="container tab-pane active"><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="uploadimage-video">
                                <iframe src="https://www.youtube.com/embed/7R6BNVA6Yjs"
                                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <a href="<?php echo esc_url($dash_link);?>" target="_blank" class="go-dashboard"><?php echo esc_html_e('Go to Dashboard', 'camweara-virtual-try-on');?></a>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="uploadimage-content">
                                <ol>
                                    <li>Make sure <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/Ve_iCW54oix2.png" target="_blank">SKU field</a> is filled for all products. </li>
                                    <li>Login to Camweara dashboard using the <a href="<?php echo esc_url($dash_link);?>" target="_blank">link here</a>.</li>
                                    <li>Upload the transparent background images with SKU in the file name.</li>
                                    <li>Camweara team will edit the images if required.</li>
                                    <li>The free trial of 7 days is activated now, reach us on <a href="mailto:info@modakatech.com">info@modakatech.com</a> to
                                        upgrade the plan. Pricing plans are <a href="https://camweara.com/pricing/" target="_blank"> mentioned here.</a> </li>
                                </ol>
                            </div>
                        </div>
                    </div>


                    <div class="tab-footer">
                        <a class="btnNext">Next <span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-right.png" alt=""></span></a>
                    </div>
                </div>
                 <!-- Tab panes 2-->
                <div id="apiintegration" class="container tab-pane fade"><br>

                    <div class="method-1">
                        <strong>Method 1: </strong>
                        <ol>
                            <li>Go to wp admin > Appearance > Theme File editor and select functions.php as shown <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/QXSLHsarkFPk.png" target="_blank">here.</a></li>
                            <li>Download sample functions.php from <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/functions_php.txt" target="_blank">here.</a></li>
                            <li>Copy code from line number 49 to 99 as shown from downloaded functions.php file, paste at the bottom of your functions.php and change the company name as shown <a href="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/screenshot1.png" target="_blank">here.</a></li>
                            <li>You can change the style and position of try on button as per the documentation <a href="https://cdn.camweara.com/integrations/camweara_api.html" target="_blank">here.</a> </li>
                            <li>Click on save</li>
                        </ol>
                    </div>

                    <div class="method-2">
                        <strong>Method 2: (Preferred way)</strong>
                        <ol>
                            <li>Provide admin access to <a href="mailto:modakatech@gmail.com">modakatech@gmail.com</a> for two days.</li>
                            <li>Camweara team will take care of entire API integration and update you.</li>
                        </ol>
                    </div>



                    <div class="tab-footer">
                        <a class="btnPrevious"><span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-left.png" alt=""></span>Prev</a>
                        <a class="btnNext">Next <span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-right.png" alt=""></span></a>
                    </div>
                </div>
                <!-- Tab panes 3 -->
                <div id="pricingplans" class="container tab-pane fade"><br>
                    <div class="pricingplans">
                        <div class="title">
                            <strong>Pricing</strong> <span>7-Day Free TRIAL</span>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="pricingplans-card">
                                    <div class="pricingplans-header">
                                        <span class="plan">Starter</span>
                                        <strong class="price">$900/year</strong>
                                    </div>
                                    <div class="pricingplans-boby">
                                        <ul>
                                            <li>Free API integration</li>
                                            <li>300 products</li>
                                            <li>Unilmited try-ons/month</li>
                                            <li>Detailed Analytics</li>
                                            <li>Personalization </li>
                                            <li>Direct Buynow</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="pricingplans-card">
                                    <div class="pricingplans-header">
                                        <span class="plan">basic</span>
                                        <strong class="price">$20000/year</strong>
                                    </div>
                                    <div class="pricingplans-boby">
                                        <ul>
                                            <li>Everything in Starter Plan </li>
                                            <li>1500 product</li>
                                            <li>Dedicated support</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="pricingplans-card">
                                    <div class="pricingplans-header">
                                        <span class="plan">Professinal </span>
                                        <strong class="price">$3500/year</strong>
                                    </div>
                                    <div class="pricingplans-boby">
                                        <ul>
                                            <li>Everything in Basic Plan </li>
                                            <li>300 product</li>
                                            <li>Dedicated support</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="pricingplans-card">
                                    <div class="pricingplans-header">
                                        <span class="plan">Enterprise </span>
                                        <strong class="price">$6000/year </strong>
                                    </div>
                                    <div class="pricingplans-boby">
                                        <ul>
                                            <li>Everything in Professionl Plan 800 products</li>
                                            <li>Additional charge applies if tha site traffic is more then 100k 
                                            </li>
                                            <li>Priority & 24 X & Support </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="upgrade-button">
                            <a href="mailto:info@modakatech.com?subject=Camweara upgrade">Upgrade (reach on info@modakatech.com)</a>
                        </div>
                    </div>
                    <div class="tab-footer">
                        <a class="btnPrevious"><span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-left.png" alt=""></span>Prev</a>
                        <a class="btnNext">Next <span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-right.png" alt=""></span></a>
                    </div>
                </div>
                 <!-- Tab panes 4 -->
                <div id="contactus" class="container tab-pane fade"><br>
                   <div class="contactus">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="contactus-image-box">
                                <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/contact.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="contactus-content">
                                <h4>Contact us for any Queries</h4>
                                <p> Email - <a href="mailto:info@modakatech.com">info@modakatech.com</a> </p>
                                <p> Website - <a href="https://modakatech.com" target="_blank">https://camweara.com</a> </p>
                                <a href="<?php echo esc_url($dash_link);?>" target="_blank" class="go-dashboard">Go to Dashboard</a>
                            </div>
                        </div>
                    </div>
                   </div>
                    <div class="tab-footer">
                        <a class="btnPrevious"><span><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ));?>assets/images/arrow-left.png" alt=""></span>Prev</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php }?>
</div>