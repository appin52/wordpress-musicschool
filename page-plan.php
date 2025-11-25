<?php get_header(); ?>
    <main class="p-plan">
        <!-- ファーストビュー -->
        <section class="p-plan__fv p-fv-lower">
            <div class="p-fv-lower__bg">
                <picture>
                    <source media="(max-width: 767px)" src="<?php echo get_template_directory_uri(); ?>/images/plan/plan-sp.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/plan/plan.jpg" alt="プラン・料金">
                </picture>
            </div>
            <div class="p-fv-lower__title">
                <h1>プラン・料金</h1>
            </div>
        </section>
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- price -->
        <section class="p-plan__price p-plan-price">
            <div class="p-plan-price__inner l-inner">
                <h2 class="p-plan-price__title c-title2">
                    料金体系
                </h2>
                <div class="p-plan-price__btns">
                    <p class="p-plan-price__btn">入会金 39,000円</p>
                    <span class="p-plan-price__plus"></span>
                    <p class="p-plan-price__btn">月額料金</p>
                </div>
                <p class="p-plan-price__text">
                    きたむらミュージックスクールでは、個人に合わせたサポートを行う完全オーダーメイドのプランを用意しており、サポート内容により月額料金が異なります。
                    担当者があなたに最適なプランを提案いたしますので、お気軽にお問い合わせください。
                    ※すべての料金は税込価格となります。
                </p>
            </div>
        </section>
        <!-- table -->
         <section class="p-plan__table p-plan-table">
            <div class="p-plan-table__inner l-inner">
                <h2 class="p-plan-table__title c-title2">
                    プラン内容・月額料金
                </h2>
                <div class="p-plan-table__wrap">
                    <table class="p-plan-table__list">
                        <thead>
                            <tr class="p-plan-table__head p-table-head">
                                <th></th>
                                <th class="p-table-head__black">
                                    <p class="p-table-head__inner">
                                    ベーシック<br class="u-sp">プラン
                                    </p>
                                </th>
                                <th class="p-table-head__red">
                                    <span>おすすめ</span><br>
                                    スタンダード<br class="u-sp">プラン
                                </th>
                                <th class="p-table-head__black">
                                    <p class="p-table-head__inner">
                                    プレミアム<br class="u-sp">プラン
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="p-plan-table__body p-table-body">
                                <td class="p-table-body__category">
                                    月額料金
                                </td>
                                <td class="p-table-body__price">
                                    39,000円
                                </td>
                                <td class="p-table-body__price p-table-body__red">
                                    59,000円
                                </td>
                                <td class="p-table-body__price">
                                    128,000円
                                </td>
                            </tr>
                            <tr class="p-table-body p-table-body__gray">
                                <td class="p-table-body__category">
                                    マンツーマン授業
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span><br>
                                    週１回
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__red"></span><br>
                                    週２回
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span><br>
                                    無制限
                                </td>
                            </tr>
                            <tr class="p-table-body">
                                <td class="p-table-body__category">
                                    ビジネス基本講座
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span>
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__red"></span>
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span>
                                </td>
                            </tr>
                            <tr class="p-table-body p-table-body__gray">
                                <td class="p-table-body__category">
                                    練習ROOM利用
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span><br>
                                    月10時間
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__red"></span><br>
                                    月20時間
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span><br>
                                    無制限
                                </td>
                            </tr>
                            <tr class="p-table-body">
                                <td class="p-table-body__category">
                                    ビジネスコンサル
                                </td>
                                <td class="p-table-body__item">
                                    <span class="p-table-body__line"></span>
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__red"></span><br>
                                    月２回
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span><br>
                                    月３回
                                </td>
                            </tr>
                            <tr class="p-table-body p-table-body__gray">
                                <td class="p-table-body__category">
                                    コミュニティ<br class="u-sp">参加資格
                                </td>
                                <td class="p-table-body__item">
                                    <span class="p-table-body__line"></span>
                                </td>
                                <td class="p-table-body__item">
                                    <span class="p-table-body__line"></span>
                                </td>
                                <td class="p-table-body__item">
                                    <span class="c-circle c-circle__black"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="p-plan-table__text">
                    ※各サービスは１回ごとのオプション追加が可能です。詳しくは事務局までお問い合わせください。
                </p>
            </div>
         </section>
    <?php get_template_part('template-parts/fix-area'); ?>
    </main>
    <?php get_footer(); ?>  