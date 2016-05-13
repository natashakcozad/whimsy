<?php

/* Register all theme widgets. */
foreach ( glob( trailingslashit( THEME_DIR ) . "inc/widgets/*.php" ) as $file ) {
    require_once $file;
}