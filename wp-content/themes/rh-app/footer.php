	<div class="grid--full">
		<div class="grid__item one--whole">
			<footer id="footer" class="push--top push--bottom">
				<div class="grid__item one-quarter palm-one-whole float--right">
					<div class="float--right push--top">
						<p class="brand-red phone-number text--right">+1.720.318.2545</p>
						<p class="footer-copyright text--right">&copy; 2000 - <?php echo date("Y"); echo " "; ?> Reed Hill LLC / All rights reserved</p>
					</div>
				</div>
			</footer>
		</div><!--
	--><div class="grid__item"></div>
	</div><!--end grid-->



<!-- Contact Modal -->
<div id="contact-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <span class="close" data-dismiss="modal" aria-hidden="true"></span>
  </div>

  <div class="modal-body">
		<?php include (TEMPLATEPATH . '/_/inc/contact.php' ); ?>
  </div>
</div>


	<?php wp_footer(); ?>
<script src="<?php bloginfo( 'template_directory' ); ?>/_/js/hoverintent.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/modals.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46809958-1', 'auto');
  ga('send', 'pageview');

</script>

<div id="shadow"></div>

</body>
</html>
