    <!-- Article single -->
    <div class="row">
        <div class="col-md-8 blog-main">

            <?php
            $attachments = get_posts(array(
                "post_type" => "attachment",
                "numberposts" => -1,
                "post_status" => null,
                "post_parent" => get_the_ID(),
            ));
            ?>

        <?php if ( is_singular('post') && !in_the_loop() ): have_posts(); the_post() ?>

            <!-- Article content -->
            <div class="blog-post">

                <!-- Article header -->
                <h2 class="blog-post-title"><?= get_the_title() ?></h2>

                <!-- Figure : image associée à l'article -->
                <?php if ($attachments): ?>
                <figure>
                    <?= wp_get_attachment_image( $attachments[0]->ID, array("900","400"), false, array("class" => "img-fluid") ) ?>
                </figure>
                <?php endif; ?>


                <p class="blog-post-meta">
                    <time datetime=""><?= get_the_date() ?> à <?= get_the_time() ?></time>
                    <?= get_the_author() ?>
                </p>
                <!-- end Article header -->

                <?php the_content() ?>

            </div>
            <!-- /.blog-post - end Article content -->

            <!-- Article navigation -->
            <nav class="blog-pagination">
                <?php previous_post_link() ?>
                <?php next_post_link() ?>
            </nav> 
            
        <?php else: ?>

            <!-- Article content -->
            <div class="blog-post">

                <div class="media">
                    
                    <!-- Figure : aperçu associée à l'article -->
                    <?php if ($attachments): ?>
                    <figure class="mr-3">
                        <?= wp_get_attachment_image( $attachments[0]->ID, "thumbnail", false, array("class" => "img-fluid") ) ?>
                    </figure>
                    <?php endif; ?>

                    <div class="media-body">
                        
                        <!-- Article header -->
                        <h2 class="blog-post-title"><?= get_the_title() ?></h2>
                        <p class="blog-post-meta">
                            <time datetime=""><?= get_the_date() ?> à <?= get_the_time() ?></time>
                            <?= get_the_author() ?>
                        </p>
                        <!-- end Article header -->

                        <?php the_excerpt() ?>
                        <a href="<?= get_the_permalink() ?>">Lire plus</a>

                    </div>
                </div>

            </div>
            <!-- /.blog-post - end Article content -->

        <?php endif; ?>

        </div>
        <!-- /.blog-main -->

        <?php get_sidebar() ?>
    </div>
    <!-- /.row - end Article single -->