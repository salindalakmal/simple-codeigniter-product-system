<footer >
    <div class="row collapse">
        <section class="footer_nav small-12 medium-3 columns">
            <h3>Main Menu</h3>
            <ul>
                <li><a href="{link:home}" title="Home" >Home</a></li>
                <li><a href="{link:tour-packages}" title="Tour Packages">Tour Packages</a></li>
                <li><a href="{link:custom-tour}" title="Tailor Made Tours">Tailor Made Tours</a></li>
                <li><a href="{link:travel-advisers}" title="Travel Advisers">Travel Advisers</a></li>
                <li><a href="{link:about-sri-lanka}" title="About Sri Lanka">About Sri Lanka</a></li>
                <li><a href="{link:contact}" title="Contact Us">Contacts</a></li>
            </ul>
        </section>
        <section class="footer_nav small-12 medium-3 columns">
            <h3>Tour Packages</h3>
            <ul>
                <?php $this->load->view($template.'/layout/tour_packege_links'); ?>
            </ul>
        </section>
    	<section class="footer_nav small-12 medium-3 columns">
    		<h3>Important Links</h3>
    		<ul>
                <li><a href="http://www.eta.gov.lk/slvisa/visainfo/center.jsp?locale=en_US" title="Apply For a Visa Online" target="_blank">Apply For a Visa Online</a></li>
                <li><a href="http://www.farecompare.com/" title="Flights Search" target="_blank">Flights Search</a></li>
                <li><a href="http://www.oanda.com/currency/converter/" title="Currency Converter" target="_blank">Currency Converter</a></li>
                <li><a href="http://www.srilankanexpeditions.com/slmap/" title="Map of Sri Lanka" target="_blank">Map of Sri Lanka</a></li>
            </ul>
    	</section>   
    	<section id="social_media" class="footer_nav small-12 medium-3 columns" >
    		<h3>Social Media</h3> 
            <a href="#" title="Facebook"><span id="facebook"></span><p>Facebook</p></a>
            <a href="#" title="Twitter"><span id="twitter"></span><p>Twitter</p></a>
            <a href="#" title="Youtube"><span id="youtube"></span><p>Youtube</p></a>
    	</section> 
        <div class="clearfix"></div>
        <section class="footer small-12 medium-3 columns" >
            <h3>Contact Us</h3>
            <p>Tel : +94 372 239 868</p>
            <p>Mobile : +94 372 239 868</p>
            <p>Fax : +94 718 251 098</p>
        </section>
        <section class="footer small-12 medium-3 columns">
            <h3>Location</h3>
            <p>Kurunegala, Northwestern<br/>60000, Sri Lanka</p>
        </section>
        <section id="payment_methods" class="small-12 medium-6 columns end">
            <h3>Payments</h3>
            <img src="{theme}/images/paypal-logo.png" alt="Payment Methods - Mastercard" />
            <img src="{theme}/images/visa-logo.png" alt="Payment Methods - Visa" />
            <img src="{theme}/images/mastercard-logo.png" alt="Payment Methods - Mastercard" />
        </section>
    </div>
    <div id="copyright" class="row collapse">
        <p class="medium-6 columns">Copyright 2014, all rights reserved.</p>
        <p class="medium-6 columns text-right">website designed and developed by <a href="http://comtechlanka.com/" title="www.comtechlanka.com" target="_blank">Comtech</a></p>
    </div>
</footer>