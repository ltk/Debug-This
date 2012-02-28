Debug This
==========

A handy little debugging tool for WordPress Developers

Debug This adds a debug_this() function to the WordPress environment that allows you to track and output the value of variables at various stages throughout the crazy procedural madness that is WordPress. 



How To Use It
-------------


### Installation

Copy debug-this.php into your plugins directory and activate the plugin through wp-admin.


### debug_this()

    debug_this($post);
    
    #outputs formatted value of the argument
    stdClass Object
    (
        [ID] => 21
        [post_author] => 1
        [post_date] => 2012-02-21 19:57:39
        [post_date_gmt] => 2012-02-21 19:57:39
        [post_content] => 
        [post_title] => Pagination
        [post_excerpt] => 
        [post_status] => publish
        [comment_status] => open
        [ping_status] => open
        [post_password] => 
        [post_name] => pagination
        [to_ping] => 
        [pinged] => 
        [post_modified] => 2012-02-21 19:57:39
        [post_modified_gmt] => 2012-02-21 19:57:39
        [post_content_filtered] => 
        [post_parent] => 0
        [guid] => http://nujigroup.com/?p=21
        [menu_order] => 0
        [post_type] => post
        [post_mime_type] => 
        [comment_count] => 0
        [filter] => raw
    )

License
-------

This project is under MIT License, please feel free to contribute and use it.

Lawson
