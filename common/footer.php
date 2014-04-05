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
		by <a id="footer_link" href="http://www.virajchitnis.com">Viraj Chitnis</a>
	</p>
</div>