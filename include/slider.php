<?php
include_once 'classes/Product.php';

$pd = new Product();
$datap = $pd->getiphone();
$datap1 = $pd->getsamsung();
$datap2 = $pd->getwalton();
$datap3 = $pd->getsinger();
//$slider = $pd->slider_image();
?>

<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">

            <?php

            if ($datap) {
                while ($row = mysqli_fetch_assoc($datap)) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>iPhone</h2>
                            <p><?php echo $row['p_title']; ?></p>
                            <div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>

            <?php }
            } else {
                echo "No featured products found.";
            }
            ?>

            <?php

            if ($datap1) {
                while ($row = mysqli_fetch_assoc($datap1)) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Samsung</h2>
                            <p><?php echo $row['p_title']; ?></p>
                            <div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>

            <?php }
            } else {
                echo "No featured products found.";
            }
            ?>
        </div>
        <div class="section group">
            <?php

            if ($datap2) {
                while ($row = mysqli_fetch_assoc($datap2)) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Walton</h2>
                            <p><?php echo $row['p_title']; ?></p>
                            <div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>

            <?php }
            } else {
                echo "No featured products found.";
            }
            ?>
            <?php

            if ($datap3) {
                while ($row = mysqli_fetch_assoc($datap3)) { ?>
                    <div class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" /></a>
                        </div>
                        <div class="text list_2_of_1">
                            <h2>Singer</h2>
                            <p><?php echo $row['p_title']; ?></p>
                            <div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>">Add to cart</a></span></div>
                        </div>
                    </div>

            <?php }
            } else {
                echo "No featured products found.";
            }
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/1.jpg" alt="" /></li>
                    <li><img src="images/2.jpg" alt="" /></li>
                    <li><img src="images/3.jpg" alt="" /></li>
                    <li><img src="images/4.jpg" alt="" /></li>
                </ul>

                <!-- ============dynamic slider start=================all coomnet out korlei hbe -->
                <!-- <ul class="slides">
                    <?php
                    // if ($slider) {
                    //     while ($result2 = $slider->fetch_assoc()) { 
                    ?>

                            <li>
                                <a href="details.php?id=<?php //echo $result2['id']; 
                                                        ?>">
                                    <img src="images/product-img/<?php //echo $result2['image']; 
                                                                    ?>" alt="Image 1" style="height:180px;" />
                                </a>
                            </li>

                    <?php    //}
                    //  } 
                    ?>

                </ul> -->
                <!-- ============dynamic slider end================= -->
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>