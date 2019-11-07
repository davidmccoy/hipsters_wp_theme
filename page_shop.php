<?php
/*
Template Name: Shop
*/
?>

<?php get_header(); ?>

<div id="container">


	<div id="content" class="shop">

                <div class="post-area">
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' )[0]; ?>
                  <div class="postimg_single" style="background-image: url('<?php echo $image ?>');"></div>

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                          <div class="page-title">
                            <h1 class="title_page">
                              <?php the_title(); ?>
                            </h1>
                            <p class="masthead-edit">
                              <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
                            </p>
                            <p>
                              Get your hands on some sweet <a href="https://teespring.com/stores/hipsters-of-the-coast" traget="_blank" onclick="ga('send', 'event', 'Teespring Storefront', 'click', 'Hipsters Apparel Spring 2018');">Hipsters gear</a>!
                            </p>

                            <div id="shop">
                              <div class="products-container">
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-of-the-coast-sunset" target="_blank" onclick="ga('send', 'event', 'Sun Logo T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-sunset-t-shirts.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        T-SHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-of-the-coast-sunset" target="_blank" onclick="ga('send', 'event', 'Sun Logo T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          T-Shirt With Sun Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in nine colors and in sizes XS-3XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$23.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-of-the-coast-stacked" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Dark T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-stacked-t-shirts.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        T-SHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-of-the-coast-stacked" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Dark T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          T-Shirt With Stacked Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in eight colors and in sizes XS-3XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$23.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-of-the-coast-stackedw" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Light T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-stacked-white-t-shirts.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        T-SHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-of-the-coast-stackedw" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Light T-Shirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          T-Shirt With Stacked Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in white and in sizes XS-3XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$23.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-sunset-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Sun Logo Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-stacked-sweatshirts.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        SWEATSHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-sunset-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Sun Logo Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          Sweatshirt With Sun Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in six colors and in sizes S-2XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$44.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-stacked-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Dark Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-stacked-sweatshirts.png')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        SWEATSHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-stacked-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Dark Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          Sweathirt With Stacked Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in five colors and in sizes S-2XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$44.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://teespring.com/hipsters-light-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Light Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-stacked-light-sweatshirts.png')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        SWEATSHIRT
                                      </div>
                                      <div class="product-title">
                                        <a href="https://teespring.com/hipsters-light-sweatshirt" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Light Sweatshirt', 'click', 'Hipsters Apparel Spring 2018');">
                                          Sweathirt With Stacked Logo
                                        </a>
                                      </div>
                                      <div class="product-description">
                                        Available in white and gray and in sizes S-2XL.
                                      </div>
                                      <div class="product-price">
                                        <em>$44.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://www.inkedgaming.com/products/hipster-sun-playmat" target="_blank" onclick="ga('send', 'event', 'Sun Logo Playmat', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-playmat-sun-logo.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        PLAYMAT
                                      </div>
                                      <a href="https://www.inkedgaming.com/products/hipster-sun-playmat" target="_blank" onclick="ga('send', 'event', 'Sun Logo Playmat', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-title">
                                          Playmat With Sun Logo
                                        </div>
                                      </a>
                                      <div class="product-description">
                                        Standard playmat size of 24" x 14".
                                      </div>
                                      <div class="product-price">
                                        <em>$19.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-container">
                                  <div class="product">
                                    <div>
                                      <a href="https://www.inkedgaming.com/collections/art/products/hipsters-of-the-coast-playmat" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Playmat', 'click', 'Hipsters Apparel Spring 2018');">
                                        <div class="product-image" style="background-image: url('/assets/products/hipsters-store-sunset-playmat.jpg')">
                                        </div>
                                      </a>
                                    </div>
                                    <div class="product-info">
                                      <div class="product-category">
                                        PLAYMAT
                                      </div>
                                      <div class="product-title">
																				<a href="https://www.inkedgaming.com/collections/art/products/hipsters-of-the-coast-playmat" target="_blank" onclick="ga('send', 'event', 'Stacked Logo Playmat', 'click', 'Hipsters Apparel Spring 2018');">
																					Playmat With Stacked Logo
																				</a>
                                      </div>
                                      <div class="product-description">
                                        Standard playmat size of 24" x 14".
                                      </div>
																			<div class="product-price">
                                        <em>$19.99</em>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php if(of_get_option('display_socialpage') == '1') { ?>
                        <?php } else { ?>
                        <?php } ?>

                        <?php endwhile; else: ?>
        			<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
                        <?php endif; ?>

                </div>

                <?php get_footer(); ?>
	</div>

</div>
