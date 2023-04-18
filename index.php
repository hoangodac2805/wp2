<?php get_header(); ?>

<!-- /header -->
<div class="c-mainvisual">
    <div class="js-slider">
        <?php if (have_rows('main_visual')) : ?>
            <?php while (have_rows('main_visual')) : the_row(); ?>
                <?php $image = get_sub_field('image') ?>
                <?php if ($image) : ?>
                    <div><img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo $image['alt'] ?  esc_attr($image['alt']) : 'allgrow-labo'
                                                                                ?>"></div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</div>

<main class="p-home">
    <section class="service">
        <div class="l-container">
            <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
            <div class="service__inner">
                <div class="service__item">
                    <img src="<?php echo TEMPLATE_URI ?>/assets/img/img_service01.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php echo TEMPLATE_URI ?>/assets/img/img_service02.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php echo TEMPLATE_URI ?>/assets/img/img_service03.png" alt="">
                </div>
                <div class="service__item">
                    <img src="<?php echo TEMPLATE_URI ?>/assets/img/img_service04.png" alt="">
                </div>
            </div>
            <div class="l-btn l-btn--2btn">
                <div class="c-btn">
                    <a href="service.html">ひかり税理士法人のサービス一覧を見る</a>
                </div>
                <div class="c-btn">
                    <a href="cases.html">ひかり税理士法人の成功事例を見る</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">ニュース</span>
                <span class="en">News</span>
            </h2>
            <div class="news__inner">
                <ul class="c-tabs">
                    <li data-content="all" data-color="#0078d2" class="active">すべて</li>
                    <?php
                    foreach (ALL_CATE as $index => $cate) {
                        $cl = category_description($cate->cat_ID) ? category_description($cate->cat_ID) : '#ccc';
                        $num = $index + 1;
                        echo   '<li data-content="cat_' . $num . '" data-color="' . $cl . '">' . $cate->name . '</li>';
                    }
                    ?>
                </ul>
                <div class="c-tabs__content">
                    <!-- All Posts - Display 5 Posts-->
                    <ul class="c-listpost active" id="all">
                        <?php
                        echo  get_recent_posts_query(5);
                        ?>
                    </ul>
                    <!-- Posts of cat1 item - Display 5 Posts-->
                    <?php
                    foreach (ALL_CATE as $index => $cate) {
                        $num = $index + 1;
                        echo  get_recent_posts_query(5, false, $num, $cate-> cat_ID);
                    }
                    ?>
                </div>
            </div>
    </section>
    <section class="publish">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">出版物</span>
                <span class="en">Publish</span>
            </h2>
            <div class="publish__inner">
                <ul class="c-gridpost">

                    <li class="c-gridpost__item">
                        <a href="">
                            <div class="c-gridpost__thumb">
                                <img src="<?php echo TEMPLATE_URI ?>/assets/img/img1.jpg" alt="">
                            </div>
                            <p class="datepost">2018年07月30日</p>
                            <h3>社長に“もしものこと”があったときの手続きすべて</h3>
                        </a>
                    </li>
                    <li class="c-gridpost__item">
                        <a href="">
                            <div class="c-gridpost__thumb">
                                <img src="<?php echo TEMPLATE_URI ?>/assets/img/img2.jpg" alt="">
                            </div>
                            <p class="datepost">2018年06月26日</p>
                            <h3>マンガと図解 新・くらしの税金百科 2018～2019</h3>
                        </a>
                    </li>
                    <li class="c-gridpost__item">
                        <a href="">
                            <div class="c-gridpost__thumb">
                                <img src="<?php echo TEMPLATE_URI ?>/assets/img/img3.jpg" alt="">
                            </div>
                            <p class="datepost">2018年08月25日</p>
                            <h3>これ1冊で大丈夫!いざという時のための相続対策がすぐわかる本</h3>
                        </a>
                    </li>
                    <li class="c-gridpost__item">
                        <a href="">
                            <div class="c-gridpost__thumb">
                                <img src="<?php echo TEMPLATE_URI ?>/assets/img/img4.jpg" alt="">
                            </div>
                            <p class="datepost">2017年06月27日</p>
                            <h3>マンガと図解 新・くらしの税金百科 2017～2018</h3>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="publish.html">出版物一覧を見る</a>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
<?php get_footer() ?>