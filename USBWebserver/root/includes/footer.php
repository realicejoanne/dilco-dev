		<!-- footer -->
		<div class="footertips">
			<div class="container">
				<div class="ft-logo">
					<ul>
						<li>
							<a href="http://unpad.ac.id" target="_blank"><img src="assets/images/unpad.png"></a>
						</li>
						<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
						<li>
							<a href="http://smkbaabulkamil.sch.id" target="_blank"><img src="assets/images/smkbaabulkamil.png"></a>
						</li>
					</ul>
				</div>
				<div class="ft-link footer-link"><br>
					&#9679;&emsp;<a href="index.php?faq">FAQ</a>
					&emsp;&#9679;&emsp;<a href="index.php?faq#toc">Terms of Conditions</a>
					&emsp;&#9679;&emsp;<a href="index.php?about">About Us</a>
					&emsp;&#9679;&emsp;<a href="index.php?about#con">Contact Us</a>
					&emsp;&#9679;&emsp;<a href="index.php?ackno">Acknowledgement</a>&emsp;&#9679;&emsp;
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<footer>
			<div class="footer-link">
				&copy; 2018 <b>Digital Learning Content (DiLCo)</b> | Unpad x SMK Baabul Kamil
			</div>
		</footer>
		
		<!-- js -->
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>		
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("slides");
		  if (n > x.length) {slideIndex = 1}    
			if (n < 1) {slideIndex = x.length}
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				x[slideIndex-1].style.display = "block";
		}
		</script>
    </body>
</html>