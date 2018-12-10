<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");

?>

<header>
    <?php
    require_once("../elements/nav.php");
    ?>

    <div id="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div id="home-banner-message" class="mx-auto">
                        <h2>CREATE THE SPACE YOU’VE ALWAYS WANTED</h2>
                        <h3>With the support of this renovation community.</h3>
                        <h4>Search the extensive list of DIY projects and start Reno’ing today!</h4>
                    </div><!-- #banner-message -->
                    <a href="/projects/index.php?action=view-all" class="banner-btn mx-auto">VIEW RENOS</a>
                </div><!-- .col-lg-9 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #overlay -->
</header>

<div id="about-reno-hub" class="container">
    <div class="row">
        <div class="col-lg-5">
            <h1>THE RENO HUB</h1>
            <p>Whether you have been living in your house for a while, or if you have just purchased a new home, there may be certain things you would like to change or update. Improving the look of your home doesn't have to be an expensive process; nor does it need to be a painful one. Believe it or not you are more than capable of fixing up your home yourself. Not only will it save you money, but you will have that added pride of having remodeled your home with your own two hands.</p>
            <p>If you are considering taking on the reno challenge, you might be worried you don’t know where to even begin. We have got you covered. The RENO HUB is a collection of people just like you that have worked on homes themselves. Learn from them about how to realize your home’s full potential. You can view renos focusing on Bedrooms, Bathrooms, Living Rooms, Dining Rooms, and Kitchens. Whether you are looking for detailed steps or simply for inspiration, you are sure to find what you’re looking for. Don’t take our word for it. See for yourself and start your Reno today!</p>
        </div><!-- .col-lg-5 -->
        <div class="col-lg-7">
            <img src="/assets/images-resized/3d-house-04.jpg" alt="3D Model Image of Home">
        </div><!-- .col-lg-7 -->
    </div><!-- .row -->
</div><!-- .container -->

<div id="reno-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 category-wrap">
                <img src="/assets/images-resized/kitchen-sketch-02.jpg" alt="Kitchen Sketch Image">
                <h3>KITCHEN</h3>
                <p>Cook in style and luxury with these simple yet sleek kitchen renos!</p>
                <form class="form-inline search-group" method="get" action="/projects/index.php">
                    <input type="hidden" name="action" value="view-all">
                    <input class="form-control search-field" name="search" type="hidden" aria-label="Search" value="kitchen">
                    <button class="mx-auto" type="submit">BROWSE</i></button>
                </form>
            </div><!-- .col-lg-2 -->
            <div class="col-lg-2 category-wrap">
                <img src="/assets/images-resized/bathroom-sketch-02.jpg" alt="Bathroom Sketch Image">
                <h3>BATHROOM</h3>
                <p>Bring your bathroom into the future with these easy modern makeovers!</p>
                <form class="form-inline search-group" method="get" action="/projects/index.php">
                    <input type="hidden" name="action" value="view-all">
                    <input class="form-control search-field" name="search" type="hidden" aria-label="Search" value="bathroom">
                    <button class="mx-auto" type="submit">BROWSE</i></button>
                </form>
            </div><!-- .col-lg-2 -->
            <div class="col-lg-2 category-wrap">
                <img src="/assets/images-resized/bedroom-sketch-01.jpg" alt="Bedroom Sketch Image">
                <h3>BEDROOM</h3>
                <p>Spice up your bedroom with any one of these terrifically stylish ideas!</p>
                <form class="form-inline search-group" method="get" action="/projects/index.php">
                    <input type="hidden" name="action" value="view-all">
                    <input class="form-control search-field" name="search" type="hidden" aria-label="Search" value="bedroom">
                    <button class="mx-auto" type="submit">BROWSE</i></button>
                </form>
            </div><!-- .col-lg-2 -->
            <div class="col-lg-2 category-wrap">
                <img src="/assets/images-resized/dining-room-sketch-01.jpg" alt="Dining Room Sketch Image">
                <h3>DINING ROOM</h3>
                <p>Turn up the atmosphere in your dining room and wow your dinner guests!</p>
                <form class="form-inline search-group" method="get" action="/projects/index.php">
                    <input type="hidden" name="action" value="view-all">
                    <input class="form-control search-field" name="search" type="hidden" aria-label="Search" value="dining room">
                    <button class="mx-auto" type="submit">BROWSE</i></button>
                </form>
            </div><!-- .col-lg-2 -->
            <div class="col-lg-2 category-wrap">
                <img src="/assets/images-resized/living-room-sketch-03.jpg" alt="Living Room Sketch Image">
                <h3>LIVING ROOM</h3>
                <p>Turn your living room into a space you will actually want to spend time in!</p>
                <!-- <a class="mx-auto" href="#">BROWSE</a> -->
                <form class="form-inline search-group" method="get" action="/projects/index.php">
                    <input type="hidden" name="action" value="view-all">
                    <input class="form-control search-field" name="search" type="hidden" aria-label="Search" value="living room">
                    <button class="mx-auto" type="submit">BROWSE</i></button>
                </form>
            </div><!-- .col-lg-2 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #reno-section -->

<div id="foot">
    <p>Created by JegenDesigns</p>
</div><!-- #foot -->

<?php require_once("../elements/footer.php");
