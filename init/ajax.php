<script>
    function ajaxGetPageContent(){
        $.ajax({
            url: "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
            type: "POST",
            data: "action=ajaxGetPageContent",
            success: function(results) {
                var posts = JSON.parse(results);
                // console.log(results);
                $.each(posts, function() {
                    if (this.id === 13) {
                        $('.p-top__about h1.title').append(this.name);
                        $('.p-top__about .content-box').append( $('<p></p>').text(this.content).val(this.id) );
                    } else if (this.id === 14) {
                        $('.p-top__contact h1.title').append(this.name);
                        $('.p-top__contact p.desc').append(this.content);
                    } else if (this.id === 16) {
                        $('.p-top__feedback h1.title').append(this.name);
                        $('.p-top__feedback p.desc').append(this.content);
                    } else if (this.id === 17) {
                        $('.p-top__service h1.title').append(this.name);
                        $('.p-top__service p.desc').append(this.content);
                    }
                    
                });
            },
            error: function() {
                console.log('Cannot retrieve data.');
            }
        });
    }
    ajaxGetPageContent();

    function ajaxGetPost(){
        $.ajax({
            url: "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
            type: "POST",
            data: "action=ajaxGetPost",
            success: function(results) {
                var posts = JSON.parse(results);
                console.log(results);
                $.each(posts, function() {
                    if (this.id === 11) {
                        $('.p-top__mission h1.title').append(this.name);
                        $('.p-top__mission .content-box').append(this.content);
                        $('.p-top__mission a.more').attr({
                            'href': this.link
                        });
                        
                    }
                });
            },
            error: function() {
                console.log('Cannot retrieve data.');
            }
        });
    }
    ajaxGetPost();

    function ajaxGetWorks(){
        $.ajax({
            url: "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
            type: "POST",
            data: "action=ajaxGetWorks",
            success: function(results) {
                var posts = JSON.parse(results);
                console.log(results);
                $.each(posts, function() {
                    if (this.id === 11) {
                        $('.p-top__mission h1.title').append(this.name);
                        $('.p-top__mission .content-box').append(this.content);
                        $('.p-top__mission a.more').attr({
                            'href': this.link
                        });
                        
                    }
                });
            },
            error: function() {
                console.log('Cannot retrieve data.');
            }
        });
    }
    ajaxGetWorks();
</script>