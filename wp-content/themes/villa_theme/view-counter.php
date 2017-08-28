<?php
$arr          = [];
$arr_users_ip = [];
foreach ( $this->results as $result ) {
	if ( $_SERVER['REQUEST_URI'] == $result->url && $_SERVER['REMOTE_ADDR'] == $result->user_ip ) {
		$arr[]          = $result->url;
		$arr_users_ip[] = $result->user_ip;
	}
}
?>
<h3>Посещений: <?php echo count( $arr ) ?></h3>
<h4>Последние ip кто посетил страницу</h4>
<ul class="list-unstyled">
	<?php for ( $i = 0; $i < 5; $i ++ ): ?>

		<?php if ( isset( $arr_users_ip[ $i ] ) ): ?>
            <li>
				<?php echo $arr_users_ip[ $i ] ?>
            </li>
		<?php endif; ?>
	<?php endfor; ?>
</ul>
<br><br><br><br><br>

