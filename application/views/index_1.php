<!DOCTYPE html>
<html lang="en">
<?php echo "vinod"; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title>VikiFeed : what's viral on internet</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="copyright" content="Copyright VikiFeed, All rights reserved.">
    <meta name="title" content="VikiFeed">
    <meta name="description" content="VikiFeed.com is a online charticle website for finding trending articles/stories on the Internet.">
	<meta property="fb:app_id" content="1115978998412237" /> 
	<meta property="fb:admins" content="1754730078142616" />
	<link href="<?php echo css_url('owl.carousel'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('owl.carousel'); ?>" rel="stylesheet">
	<!--<script src="<?php echo plugin_url('unveil_lazy_load/jquery.unveil.js'); ?>"></script>-->
	
	<style>
	
	.post-preview > a > .post-title {
		font-size: 22px;
	}
	.social {
		display: table;
		margin: auto auto 50px;
	}
	
	.headcolor{
		color:#404040;
	}
	.top_headline{
		color:#0085a1;
	}
	.quote {
		//background: #ffffff none repeat scroll 0 0;
		border-radius: 50%;
		border-color : #ffffff solid 2px;
		height: 50px;
		//position: absolute;
		//right: -67px;
		text-align: center;
		//top: 12%;
		width: 50px;
	}
	.marleft{
		margin-left:15px;
	}
	.btn-circle {
		border-radius: 25px;
		font-size: 18px;
		height: 50px;
		line-height: 1.33;
		padding: 10px 16px;
		width: 50px;
	}
	.btn-outline {
		background-color: transparent;
		color: inherit;
		transition: all 0.5s ease 0s;
	}
	.btn-blue {
		//background-color: #fff;
		border-color: #fff;
		color: #ffffff;
	}
	.btn-blue:hover {
		background-color: #e34e4d;
		border-color: #e34e4d;
		color: #ffffff;
	}
	.bgclo{
		background-color: #222;
		//background-image: url("../img/map-image.png");
		background-position: center center;
		background-repeat: no-repeat;
	}
	.cau_color{
		color:#fff !important;
		text-align:left;
	}
	.sliderpad{
		padding:50px !important;
	}
	.martop{
		margin-top:20px;
	}
	.cau_a:hover{
		text-decoration: none !important;
	}
	.cau_a:focus{
		text-decoration: none !important;
	}
	
	/*img.lazy {
        display: inline-block;
        max-width: 100%;
        min-width: 48px;
        min-height: 48px;
        background-repeat: no-repeat;
        background-image: url(data:image/gif;base64,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);
    }*/
	</style>
	
</head>

<body>

	<?php echo $this->load->view('googletagmanager'); ?>
    <?php echo $this->load->view('menu_navigation'); ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
	<header class="intro-header bgclo" style="background-image: url('<?php echo img_url('map-image.png'); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
					
					
					
					<section id="testimonial" class="testimonial padding-large white-color text-center">
						<div class="container">
							<div class="row sliderpad">
								<h1 class="top_headline">Top viral feeds on VikiFeed</h1>
								<div class="col-md-10 col-md-offset-1">

									<!-- *****  Carousel start ***** -->
									<div id="testimonial-carousel" class="owl-carousel owl-theme testimonial-carousel">

										<!-- =========================
										   Single Testimonial item
										============================== -->
										<?php
										if(isset($top_stories) && $top_stories != NULL){
											foreach($top_stories as $toplist){
												$title = trim($toplist->title);
												$title = preg_replace("/[^a-zA-Z0-9]/", " ", $title);
												$title = preg_replace('!\s+!', ' ', $title);;
												$title = str_replace(" ", "-", $title);
												$title = strtolower($title);
												$title = rtrim($title,"-");
										?>
										<div class="item margin-bottom-small"> <!-- ITEM START -->
											<div class="row post-preview">
												<div class="col-lg-12">
													<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
														<?php if($toplist->upload_type == 'picture'){ ?>
															<img class="img-responsive" src="<?php echo site_url($toplist->img_url); ?>"  style="height:250px; width:100%"/>
														<?php }elseif($toplist->upload_type == 'video'){?>
															<img class="img-responsive" src="<?php echo $toplist->img_url; ?>"  style="height:250px; width:100%"/>
														<?php }  ?>
													</div>
													<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
														<a class="cau_a" href="<?php echo site_url('feed-'.$toplist->id_story.'-'.$title); ?>">
															<h1 class="cau_color">
																<?php echo $toplist->title; ?>
															</h1>
														</a>
													</div>
												</div>
											</div>
										</div> <!-- ITEM END -->
										<?php
										}}
										?>
										<!-- =========================
										   Single Testimonial item
										============================== -->
										<!-- <div class="item"> 
											<div class="row">
												<div class="col-lg-12 post-preview">
													<div class="col-lg-6">
														<img class="img-responsive" src="<?php echo site_url($stories[0]->img_url); ?>"/>
													</div>
													<div class="col-lg-6">
														<a href="">
															<h1 class="cau_color">
																<?php echo $stories[1]->title; ?>
															</h1>
														</a>
													</div>
												</div>
											</div>
										</div> ITEM END -->


									

										
									</div>
								</div>
							</div>
						</div>
					</section>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </header>

	
	
	
    <!-- Post Content -->
    <article>
        <!--<div class="container">-->
		<div class="col-lg-12">
            <div class="row">
               
				
				
					<?php
					 foreach($stories as $list){
					
						$title = trim($list->title);
						$title = preg_replace("/[^a-zA-Z0-9]/", " ", $title);
						$title = preg_replace('!\s+!', ' ', $title);;
						$title = str_replace(" ", "-", $title);
						$title = strtolower($title);
						$title = rtrim($title,"-");
                  
					?>
					
					<div class="col-lg-4 martop">
					<div class="post-preview">
						<?php if($list->upload_type == 'picture'){ ?>
							<img class="img-responsive lazy" src="<?php echo site_url($list->img_url); ?>" data-src="<?php echo site_url($list->img_url); ?>" data-src-retina="<?php echo site_url($list->img_url); ?>" style="height:250px; width:100%"/>
						<?php }elseif($list->upload_type == 'video'){?>
							<img class="img-responsive lazy" src="<?php echo $list->img_url; ?>" data-src="<?php echo $list->img_url; ?>" data-src-retina="<?php echo $list->img_url; ?>"  style="height:250px; width:100%"/>
						<?php }  ?>
						
						<a href="<?php echo site_url('feed-'.$list->id_story.'-'.$title); ?>">
							<h2 class="">
								<?php if(strlen($list->title) > 52) { echo substr($list->title,0,49).'...'; }else{ echo $list->title; } ?>
							</h2>
							
						</a>
						<!-- post-title <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>  <hr>-->
					</div>
					</div>
					<?php
					 }
					?>
				
				
				
				
            </div>
        </div>
	   <!--</div>-->
    </article>

    <hr>
	

<?php echo $this->load->view('footer'); ?>
<script src="<?php echo js_url('owl.carousel.min'); ?>"></script>
<script src="<?php echo js_url('main'); ?>"></script>
</body>
<script>
	$(document).ready(function(){

		//$("img.lazy").unveil(300);

	});
</script>
</html>
