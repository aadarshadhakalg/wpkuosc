<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <meta name="description" content="Kathmandu University Open Source Community
                        Kathmandu University Open Source Community is the Open Source related wing of KUCC.">
    <meta property="og:title" content="Kathmandu University Open Source Community">
    <meta property="og:description" content="Kathmandu University Open Source Community
                        Kathmandu University Open Source Community is the Open Source related wing of KUCC.">
    <meta property="og:image" content="http://kucc.ku.edu.np/kuosc/img/logo.png">
    <meta property="og:url" content="http://kucc.ku.edu.np/kuosc/">

    <?php
    wp_head();
    ?>
</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg bg-custom sticky-top ">
        <!-- LOGO HERE -->
        <div class="container wave">
            <span>
		<a class="navbar-brand" href="./">
			<?php
				if(function_exists('the_custom_logo')){
					$custom_logo_id = get_theme_mod('custom_logo');
					$logo = wp_get_attachment_image_src($custom_logo_id);
				}
			?>
				<img id="logo" src="<?php echo $logo[0] ?>" width="150" class="d-inline-block align-top" alt="L O G O">
                </a>
            </span>

            <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#collapse_target" aria-controls="collapse_target" aria-expanded="false" aria-label="Toggle navigation">
                <div class="animated-icon"><span></span><span></span><span></span></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapse_target">
		
		<?php 
			wp_nav_menu(
				array(
					'menu' => 'primary',
					'container' => '',
					'theme_location' => 'primary',
					'items_wrap' => '<ul id="" class="navbar-nav">%3$s</ul>',
					'add_a_class' => 'nav-link',
					'add_li_class' => 'nav-item',
				)
			);	
		
		?>
            </div>
        </div>
    </nav>
 
