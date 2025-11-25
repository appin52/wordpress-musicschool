                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <div class="p-blog-details__pagination p-pagination">
                    <?php if (!empty($prev_post)): ?>
                    <a href="<?php echo get_permalink($prev_post->ID); ?>">
                        <div class="p-pagination__article">
                            <p class="p-pagination__prev">
                                ◀︎ 前の記事
                            </p>
                            <div class="p-pagination__articlearea">
                                <div class="p-pagination__image u-pc">
                                    <?php if (has_post_thumbnail($prev_post->ID)): ?>
                                        <?php echo get_the_post_thumbnail($prev_post->ID); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>
                                </div>
                                <p class="p-pagination__title js-ellipsis25">
                                    <?php echo wp_trim_words($prev_post->post_title, 25, '...'); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($next_post)): ?>
                    <a class="p-pagination__link is-next" href="<?php echo get_permalink($next_post->ID); ?>">
                        <div class="p-pagination__article">
                            <p class="p-pagination__prev p-pagination__next">
                                次の記事 ▶︎
                            </p>
                            <div class="p-prev__articlearea">
                                <div class="p-pagination__image u-pc">
                                    <?php if (has_post_thumbnail($next_post->ID)): ?>
                                        <?php echo get_the_post_thumbnail($next_post->ID); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>
                                </div>
                                <p class="p-pagination__title js-ellipsis25">
                                    <?php echo wp_trim_words($next_post->post_title, 25, '...'); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <?php endif; ?>
                    </div>                   