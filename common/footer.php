<div class="footer">
	<p class="footer_text">
		Jeopardy
		<span class="footer_text">
			<?php
			if (!file_exists('deployed')) {
				echo exec("git describe");
			}
			?>
		</span>
		by Viraj Chitnis
	</p>
</div>