<?php
    /**
    * Template Name: Contact Us
    */
?>
<?php get_header()?>
<div class="at-contact-main-div" >
    <div class="at-form-div at-contact-common" >
        <?php echo do_shortcode('[contact-form-7 id="a89d1a2" title="Contact Form"]'); ?>
    </div>
    <div class="at-contact-common at-right-contact-info" >
        <div class="at-profile-description" >
            <div class="at-profile-img" >
                <img src="<?php echo get_template_directory_uri().
                "/images/profile_img.webp"?>">
            </div>
            <div class="at-personla-information" >
                <p>Abhishek Tiwari</p>
                <a href="mailto:tiwariabhishek687@gmail.com"><p>tiwariabhishek687@gmail.com</p></a>
                <a href="tel:+918181884650"><p>8181884650</p></a>
            </div>
        </div>
        <div class="at-profile-main-description">
            <p>
            A skilled WordPress developer with more than 5 years of hands-on experience, I specialize in designing and implementing dynamic, user-friendly websites that enhance user experience and drive business success. My expertise spans a wide range of technologies, including PHP, HTML, CSS, JavaScript, AJAX, GIT, and MySQL, allowing me to build robust and scalable websites tailored to meet specific client needs.
            </p>
            <p>
            My core technical expertise spans a broad range of technologies, including PHP, HTML, CSS, JavaScript, AJAX, GIT, AWS and MySQL. This diverse skill set allows me to create robust, scalable websites that are both aesthetically pleasing and fully functional. PHP and MySQL are integral to my ability to build dynamic websites with custom features and functionalities. I utilize AJAX and JavaScript to ensure fast, interactive user experiences, while GIT allows me to maintain clean, organized code with version control, ensuring seamless collaboration in team settings. My expertise in HTML and CSS ensures that I can create responsive, mobile-first websites that deliver consistent user experiences across different screen sizes and devices.
            </p>
            <p>
            Over the course of my career, I have consistently demonstrated a strong ability to optimize website performance. I am adept at improving website speed, ensuring fast load times, and minimizing server requests. This commitment to performance optimization is vital in enhancing user satisfaction, improving SEO rankings, and reducing bounce rates. I understand the importance of performance in the digital age, where speed is a critical factor in user retention and business success. I use various tools and techniques to monitor website performance, from caching mechanisms to image optimization, and I continuously seek new ways to enhance site speed and overall efficiency.
            </p>
        </div>
    </div>
</div>
<div class="at-contact-common">
    <?php //echo do_shortcode("[ib_slider_shortcode slider=4]"); ?>
</div>

<?php get_footer()?>