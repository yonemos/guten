<?php
/*
Template Name: LP CUSTOM
*/
?>
<?php get_header(); ?>
<main class="mymain">

  <section class="myhero" style="background-image: 
  linear-gradient(
    rgba(0, 0, 0, .5),
    rgba(0, 0, 0, .5)
      ),
    url(<?php echo get_field('hero_img')['url']; ?>);">

    <h1><?php the_field('hero_main'); ?></h1>
    <p><?php the_field('hero_sub'); ?></p>
    <a href="#"><?php the_field('hero_button'); ?></a>
  </section>

  <section class="mycon">
    <h2 class='sec-title'>CONCEPT</h2>
    <p>すべてが揃う。そんな場所を目指しています</p>

    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con1.png" alt="">
      <h3>簡単設定</h3>
      <p>面倒な受付手続きはスキップ。オンラインで簡単スピーディーに設定できます。</p>
    </div>

    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con2.png" alt="">
      <h3>全天候型</h3>
      <p>天気に左右されない全天候型の施設を完備。明日の天気の心配はありません。</p>
    </div>

    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con3.png" alt="">
      <h3>飲食フリー</h3>
      <p>あちこちに飲食スペースが設けてあって一息付けます。持ち込みフードも
        OKです。
      </p>
    </div>

    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con4.png" alt="">
      <h3>いつでも睡眠</h3>
      <p>洗剤型だからこそできるのが、いつでもベッドルームに戻って寝ることです。</p>
    </div>

  </section>

  <section class="mypoint1">
    <p>集中的に仕事をすすめることができる、そんな環境が整っています。</p>
  </section>

  <section class="mynews">
    <h2 class="sec-title">LAST NEWS</h2>
    <p>最新情報です</p>

    <?php $myposts = get_posts(array(
      'post_type' => 'post',
      'posts_per_page' => '6'
    )); ?>
    <?php if ($myposts) :
      foreach ($myposts as $post) :
        setup_postdata($post); ?>

        <article <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <figure>
                <?php the_post_thumbnail(); ?>
              </figure>
            <?php endif; ?>
            <h3><?php the_title(); ?></h3>
          </a>
        </article>
    <?php endforeach;
      wp_reset_postdata();
    endif; ?>

  </section>

  <section class="mypoint2" style="background-color:
  <?php the_field('point2_bkcolor'); ?>;">
    <figure>
      <?php echo wp_get_attachment_image(get_field('point2_img')['ID'], 'full'); ?>
    </figure>
    <div>
      <p>
        <?php the_field('point2_big'); ?>
      </p>
      <p><?php the_field('point2_small'); ?></p>
    </div>
  </section>

  <section class="mytest">
    <h2 class="sec-title">TESTMONIALS</h2>
    <p>たくさんの方にご利用いただいています</p>

    <div class="mytest1">
      <figure><img src=<?php echo get_template_directory_uri(); ?>/lp-custom/img/test1.jpg" alt=""></figure>
      <div>
        <p>その日の気分に合わせてワークスペースを運ぶことができたのでとても便利でした。</p>
        <p><strong>TANAKA HANAKO</strong><br>
          Designer</p>
      </div>
    </div>

    <div class="mytest2">
      <figure><img src=<?php echo get_template_directory_uri(); ?>/lp-custom/img/test2.jpg" alt=""></figure>
      <div>
        <p>わからないことがあっても、テクニカルアドバイザーに質問できるので安心です。</p>
        <p><strong>SUZUKI TARO</strong><br>
          Front-end ENgineer</p>
      </div>
    </div>
  </section>

  <section class="myaction">
    <p>日常のその先へ</p>
    <p>いつでも、お越しをお待ちしております。</p>
    <a href="#">ワークスペースを申し込む</a>
  </section>

</main>
<?php get_footer(); ?>