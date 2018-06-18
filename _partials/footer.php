  <footer>
    <div class="container">
      <small>
        &copy; <?=date('Y')?> ListAfterList.com. All rights reserved. | <a href="https://www.facebook.com/ListAfterList" target="_blank">Facebook</a> | <a href="https://twitter.com/ListAfterList" target="_blank">Twitter</a>
      </small>
      <?php if (DEMO_MODE === true): ?>
        <small class="pull-right text-danger">
          <strong>DEMO MODE ENABLED</strong> v<?=system_version()?>
        </small>
      <?php else: ?>
        <small class="pull-right"><a href="<?=root_path('about-us.php')?>">About Us</a> | <a href="<?=root_path('terms-of-use.php')?>">Terms of Use</a> | <a href="<?=root_path('privacy-policy.php')?>">Privacy Policy</a> | <span class="text-danger">v<?=system_version()?></span> </small>
      <?php endif; ?>
    </div><!--//.container-->
  </footer>
</body>

  <!-- Javascripts -->
  <script src="<?=javascripts_path('jquery-2.0.0.min')?>"></script>
  <script src="<?=javascripts_path('bootstrap')?>"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
  <script src="<?=javascripts_path('app')?>"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
              // [groupName, [list of button]]
              ['style', ['bold', 'italic', 'underline']],
              ['para', ['ul', 'ol']]
            ]
        });
    });
  </script>

</html>

<?php ob_end_flush(); ?>
