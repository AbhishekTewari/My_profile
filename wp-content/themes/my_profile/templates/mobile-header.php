<?php 
$header_class = "";
if( !is_front_page() ){
    $header_class = "at-not-front-page-header-color";
} 
?>

<header class="<?php echo esc_attr( $header_class ) ?> at-mobile-nav-bar">
    <nav class="at-mobile-nav">
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </nav>
</header>
<?php if( is_front_page() ) {?>
<div class="at-animation-header">
    Content before waves
    <div class="inner-header flex">
        Contains Header Content
    </div>

    <!--Waves Container-->
    <div>
        <svg class="waves"
            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->
</div>
<?php } ?>