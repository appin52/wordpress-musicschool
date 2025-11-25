<?php get_header(); ?>
    <main class="p-result-details">
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- result-details -->
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
        ?>
        <section class="p-result-details__section p-details">
            <div class="p-details__inner l-inner">
                <div class="p-details__imagearea">
                    <div class="p-details__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="No image">
                         <?php endif; ?>
                    </div>
                    <div class="c-category p-details__category">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'genre');
                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo $terms[0]->name;
                        }
                        ?>
                    </div>
                </div>
                <h1 class="p-details__title">
                    <?php the_title(); ?>
                </h1>
                <time datetime="the_time('Y-m-d')" class="p-details__time"><?php the_time('Y.m.d'); ?></time>
                <div class="p-details__tablearea">
                    <table class="p-details__table">
                        <tbody>
                            <tr>
                                <td>名前</td>
                                <td><?php the_field('name'); ?></td>
                            </tr>
                            <tr>
                                <td>職業</td>
                                <td><?php the_field('job'); ?></td>
                            </tr>
                            <tr>
                                <td>ジャンル</td>
                                <td>
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'genre');
                                    echo $terms[0]->name;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>実績</td>
                                <td><?php the_field('achievements'); ?></td>
                            </tr>
                            <tr>
                                <td>SNS</td>
                                <td><?php the_field('sns'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-details__text"><?php the_content(); ?></div>
                </div>

                <!-- ページネーション  -->
                <?php get_template_part('template-parts/single-pagination'); ?>
                
                <!-- 関連記事 -->
                <?php get_template_part('template-parts/related-articles'); ?> 
            </div>
        </section>
        <?php
            endwhile;
        endif;
        ?>
     <?php get_template_part('template-parts/fix-area'); ?>
    </main>
    <?php get_footer(); ?>  