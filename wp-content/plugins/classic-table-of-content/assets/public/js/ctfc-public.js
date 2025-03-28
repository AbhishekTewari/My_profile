(function($){

    $(document).ready(function () {
        let h2Key = 0;
        let h3Key = 0;
        let at_ctfc_html = "";
        
        $(".content h2").each(function () {
            let $this = $(this);
            let classAttr = $this.attr("class") || "";
        
            if (!classAttr.includes("wp-block-heading")) {
                if (!$this.attr("id")) {
                    $this.attr("id", "at_h2_" + h2Key);
                    h2Key += 1;
                }
        
                let currentH2Id = $this.attr("id");
                at_ctfc_html += `<ul class="">
                        <li class=""><a class="ul-heading" href="#${currentH2Id}" title=""><strong>${$this.text().trim()}</strong></a>`;
        
                // Handle H3s under this H2
                let nextElem = $this.next();
                let lastH3BeforeMetaslider = null; // Track the last h3 before metaslider
                let h3List = ""; // Collect H3 list separately for correct handling
        
                if (nextElem.length && !nextElem.is(".content h2")) {
                    h3List += '<ul class="">';
        
                    while (nextElem.length && !nextElem.is(".content h2")) {
                        if (nextElem.is(".content h3")) {
                            if (lastH3BeforeMetaslider) {
                                // Add previous H3 before updating the tracker
                                let prevH3Id = lastH3BeforeMetaslider.attr("id") || `at_h3_${h3Key++}`;
                                lastH3BeforeMetaslider.attr("id", prevH3Id);
                                h3List += `<li class="ctfc-subheading-txt"><a href="#${prevH3Id}">${lastH3BeforeMetaslider.text().trim()}</a></li>`;
                            }
                            lastH3BeforeMetaslider = nextElem; // Update tracker to current <h3>
                        }
        
                        if (nextElem.is(".metaslider")) {
                            // Skip the last H3 before metaslider
                            lastH3BeforeMetaslider = null;
                        }
        
                        nextElem = nextElem.next();
                    }
        
                    // Add the last valid <h3> if metaslider was never found
                    if (lastH3BeforeMetaslider) {
                        let lastH3Id = lastH3BeforeMetaslider.attr("id") || `at_h3_${h3Key++}`;
                        lastH3BeforeMetaslider.attr("id", lastH3Id);
                        h3List += `<li class="ctfc-subheading-txt"><a href="#${lastH3Id}">${lastH3BeforeMetaslider.text().trim()}</a></li>`;
                    }
        
                    h3List += '</ul>';
                }
        
                at_ctfc_html += h3List + `</li></ul>`; // Append the H3 list inside the H2 list item
            }
        });
        
        
        if( $(".main_wap_at_ctfc").length > 0 )
        {
            $(".main_wap_at_ctfc").append(at_ctfc_html);
        }

        $('.ctfc_main_content_wrap a').on('click', function(event) {
            // Prevent the default anchor click behavior
            event.preventDefault();

            // Get the target element
            var target = $(this).attr('href');
            
            // Animate the scroll to the target
            $('html, body').animate({
                scrollTop: $(target).offset().top - 50
            }, 800); // Duration in milliseconds (800ms)
        });
    });

    $(document).on( 'click', ".read-more-article", function(){
        const contentDiv = document.getElementById('at-ctfc-content-div');
        jQuery(".read-more-article").css("display","none");
        jQuery(".read-less-article").css("display","inline-block");
        contentDiv.style.height = '100%';  // Set height to 100%
        contentDiv.style.overflow = 'visible';  // Remove overflow hiding
    });

    $(document).on( 'click', ".read-less-article", function(){
        const contentDiv = document.getElementById('at-ctfc-content-div');
        jQuery(".read-more-article").css("display","inline-block");
        jQuery(".read-less-article").css("display","none");
        contentDiv.style.height = '300px';  
        contentDiv.style.overflow = 'hidden';  // Remove overflow hiding
    });

})(jQuery);