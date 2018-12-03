<!-- footer starts here -->

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<p class="copyright">
        <?php 
        $fromYear = 2017;
        $thisYear = (int)Date('Y');
        echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');
        ?> &copy; In Tune Music School<br> All rights reserved.
				</p>
                <p><?=$config->adminSpooket?></p>
			</div>
		</div>
	</div>


    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- <script src="js/jquery.counterup.js"></script> -->
    
    <!-- Main jQuery -->
   
    <script src="<?=$config->theme_virtual?>https://code.jquery.com/jquery-git.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="<?=$config->theme_virtual?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="<?=$config->theme_virtual?>plugins/slick-carousel/slick/slick.min.js"></script>
    <!--  -->
    <script src="<?=$config->theme_virtual?>plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Mixit Up JS -->
    <script src="<?=$config->theme_virtual?>plugins/mixitup/dist/mixitup.min.js"></script>
    <!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
    <script src="<?=$config->theme_virtual?>plugins/SyoTimer/build/jquery.syotimer.min.js"></script>


    <!-- Form Validator -->
    <script src="<?=$config->theme_virtual?>http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="<?=$config->theme_virtual?>http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    
    
    <script src="<?=$config->theme_virtual?>js/script.js"></script>

  </body>
  </html>
   