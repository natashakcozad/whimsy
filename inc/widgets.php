<?php

/* Register all theme widgets. */
foreach ( glob( trailingslashit( HYBRID_PARENT_URI ) . "inc/widgets/*.php" ) as $file ) {
    require_once $file;
}