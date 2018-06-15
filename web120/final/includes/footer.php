        <footer>
        <img src="<?=$banner_footer?>" alt="<?=$footer_alt?>" id="footer_home" class="parallax_footer">    
        
        <div id="footer_text">
            <div id="copyright">
                &copy; <?=date('Y')?>&nbsp;&nbsp;	Designed by <a href="../index.php" target="_blank">Kelsie Brown&nbsp;&nbsp;	</a> All Rights Reserved&nbsp;&nbsp; <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a>&nbsp;&nbsp;	<a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a>&nbsp;&nbsp;<a href="disclaimer.php">Privacy Policy</a>
            </div>

            <ul id="nav_footer">
                <li><a href="index.php" id="logo_footer"><img src="images/logo.png" alt="Rachel Wells site logo"></a></li>
                <li><a href="tours.php">Tours </a></li>
                <li><a href="faq.php">FAQ </a></li>
                <li><a href="book.php">Book </a></li>
                <li><a href="contact.php">Contact </a></li>
                <li><small><a href="#top">&nbsp; Top <i class="fas fa-angle-up"></i></a></small></li>
            </ul>
        </div>

        <p class="up_mobile"><a href="#top">Top <i class="fas fa-angle-up"></i></a></p>
        
    </footer>
    
</div> <!-- END MAIN -->
</div> <!-- END WRAPPER -->


<script>    
// js for mobile nav bar toggle
var mainNav = document.getElementById('nav_main');
var navBarToggle = document.getElementById('navbar_toggle');
    
navBarToggle.addEventListener('click',function(){
    if (this.classList.contains('active')){
        mainNav.style.display='none';
        this.classList.remove('active');
    } else {
        mainNav.style.display='flex';
        this.classList.add('active');
    }
});
    
// parallax effect 
$('.parallax_header').simpleParallax({scale: '1.25', orientation: 'down'});
$('.parallax_footer').simpleParallax({scale: '1.4', orientation: 'up'});
    
// hide main nav when it reaches section
$.fn.followTo = function(pos){
    var $this = this;
    $window = $(window);
    
    $window.scroll(function(e){
        if ($window.scrollTop > pos){
            $this.css( {position: 'absolute', top: '200px' } );
        } else {
            $this.css( {position: 'fixed', top: '0' } );
        }
    });
};
// this is only needed for wide view ports
if ( $('.navbar').css("position") === "absolute" ) {
    $('.navbar').followTo(180);
}

</script>

</body>
</html>