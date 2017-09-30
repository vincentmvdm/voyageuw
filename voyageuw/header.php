<?php
    $pagePermalink = get_page_link();
    $pageThumbnail = "";
    $pageTitle = "" . wp_title( '—', false, 'right' ) . get_bloginfo( 'name' );
    $pageDescription = get_bloginfo( 'description' );
    if ( have_posts() ) {
        while ( have_posts() ) {
        	the_post();
            $pageThumbnail = get_the_post_thumbnail_url();
            if ( get_the_content() !== '' ) {
                $pageDescription = wp_trim_words(get_the_content(), 8, '...');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"           content="width=device-width, initial-scale=1.0">
<meta name="description"        content="<?= $pageDescription; ?>">
<meta property="og:url"         content="<?= $pagePermalink; ?>" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="<?= $pageTitle; ?>" />
<meta property="og:description" content="<?= $pageDescription; ?>" />
<meta property="og:image"       content="<?= $pageThumbnail; ?>" />
<title><?= $pageTitle; ?></title>
<!-- "Do not tell people how to live their lives. Just tell them stories. And they will figure out how those stories apply to them." - Randy Pausch -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if ( is_single() ) { ?>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '694273750750488',
              xfbml      : true,
              version    : 'v2.8'
            });
            FB.AppEvents.logPageView();
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>

    <?php } ?>

    <?php get_template_part( 'template-parts/navigation' ); ?>
    <?php get_template_part( 'template-parts/hero' ); ?>
