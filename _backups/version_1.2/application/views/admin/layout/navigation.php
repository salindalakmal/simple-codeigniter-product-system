<div id="navigaiton">
    <div class="row">
        <div class="large-12 columns contain-to-grid">
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name">
                    <!-- <a href="#">Home</a> -->
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>
                <section class="top-bar-section">
                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li>
                            <a href="{link:home}" title="Home" >Home</a>
                        </li>
                        <li class='has-dropdown'>
                            <a href="{link:tour-packages}" title="Tour Packages">Tour Packages</a>
                            <ul class="dropdown" >
                                <?php $this->load->view($template.'/layout/tour_packege_links'); ?>
                            </ul>
                        </li>
                        <li>
                            <a href="{link:custom-tour}" title="Tailor Made Tours">Tailor Made Tours</a>
                        </li>
                        <li>
                            <a href="{link:travel-advisers}" title="Travel Advisers">Travel Advisers</a>
                        </li>
                        <li>
                            <a href="{link:about-sri-lanka}" title="About Sri Lanka">About Sri Lanka</a>
                        </li>
                        <li>
                            <a href="{link:contact}" title="Contact Us">Contacts</a>
                        </li>
                    </ul>
                </section>
            </nav>
        </div>
    </div>
</div>




