Debug This
==========

A handy little debugging tool for WordPress Developers

Debug This adds a debug_this() function to the WordPress environment that allows you to track and output the value of variables at various stages throughout the crazy procedural madness that is WordPress. 



How To Use It
-------------


### Installation

Copy debug-this.php into your plugins directory and activate the plugin through wp-admin.


### debug_this()

    #Passing an argument outputs the formatted value of the argument
    debug_this($post);

    #You can also pass a second argument to give yourself a reminder of which variable you're debugging, or to give youself a quick reminder
    debug_this($post, 'Make sure this returns false!');

    #Omitting the argument calls debug_this on $GLOBALS, which will display every variable with a global scope
    debug_this();

License
-------

This project is under MIT License, please feel free to contribute and use it.

Lawson
