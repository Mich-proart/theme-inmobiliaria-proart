<?php
$form = '<form role="search" method="get" class="form-inline d-lg-inline-flex mr-3 w-100" action="' . esc_url( home_url( '/' ) ) . '" style="position:relative;">
				<label class="w-100">

					<input type="search" class="form-control mr-sm-2 w-100 input-search" value="' . get_search_query() . '" name="s"/>
				</label>
				<button type="submit" class="btn bg-transparent my-2 my-sm-0 lupa py-0">';
			$form .= '<i class="icon-search color-black"></i>';
			$form .= '</button></form>';
            echo $form;

?>
