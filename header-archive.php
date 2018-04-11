<header class="header">
<h1 class="title"><?php
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'missguided' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'missguided' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'missguided' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'missguided' ); }
?></h1>
</header>