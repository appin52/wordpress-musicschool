<form class="p-side-search__form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input class="p-side-search__input" type="search" name="s" placeholder="検索ワード">
        <button class="p-side-search__button" type="submit" class="search-btn">
            <span>
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-search.svg" alt="検索">
            </span>
        </button>
</form>