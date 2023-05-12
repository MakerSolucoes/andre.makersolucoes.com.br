<?php

/**
 * Version: 1.0
 * Date: 2021/10/21
 * Developers: Grupo Glorium
 * Developers URI: https://glorium.com.br
 * Description: Developers Grupo Glorium - All Rights Reserved <a target="_blank" href="https://glorium.com.br">Grupo Glorium</a> 2020
 */
$timezone = new DateTimeZone('America/Sao_Paulo');
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$ms['post_type']   = get_post_type();
$ms['slug']      = get_the_slug();
get_header();

ms_page($ms['post_type'], $ms['slug']);

?>
<style>
  body::before {
    background: #040404 url(<?php echo get_field('background_site', 'options') ?>) top right no-repeat;
    background-size: cover;
  }
</style>
<!-- ======= Header ======= -->
<header id="header">
<div class="container">
    <h1><a href="<?php echo get_home_url(); ?>"><?php echo get_field('principal_name', 'options'); ?></a></h1><?php echo do_shortcode('[gtranslate]'); ?>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="mr-auto"><img src="<?php echo get_template_directory_uri(); ?>/adm/assets/img/logo.png" alt="" class="img-fluid"></a> -->

    <h2><?php echo get_field('default_phrase', 'options'); ?></h2>
    

	<nav id="navbar" class="navbar">
		
      <ul>
        <li><a class="nav-link active" href="#header">Início</a></li>
        <li><a class="nav-link" href="#about">Sobre</a></li>
        <li><a class="nav-link" href="#resume">Currículo</a></li>
        <li><a class="nav-link" href="#services">Serviços</a></li>
        <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link" href="#contact">Contato</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <?php
    if (!empty(get_field('social_links', 'options'))) {
    ?>
      <div class="social-links">
        <?php
        foreach (get_field('social_links', 'options') as $social_link) {
          echo '<a target="_blank" href="' . $social_link['link'] . '"><i class="' . $social_link['icon_class'] . '"></i></a>';
        }
        ?>
      </div>
    <?php
    }
    ?>
  </div>
</header>

<!-- ======= About Section ======= -->
<section id="about" class="about">

  <!-- ======= About Me ======= -->
  <div class="about-me container">

    <div class="section-title">
      <h2>Sobre</h2>
      <p>Mais sobre mim</p>
    </div>

    <div class="row">
      <div class="col-lg-4" data-aos="fade-right">
        <img src="<?php echo get_field('about_pic', 'options'); ?>" class="img-fluid" alt="<?php echo get_field('principal_name', 'options'); ?>">
      </div>
      <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3><?php echo get_field('job', 'options'); ?></h3>
        <p class="fst-italic">
          <?php echo get_field('job_desc', 'options'); ?>
        </p>
        <div class="row">
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Aniversário:</strong> <span>
                  <?php

                  $born_date = new DateTime(get_field('born_date', 'options'), $timezone);
                  $now = new DateTime('now', $timezone); // Pega o momento atual

                  echo $born_date->format('d/m/Y');
                  ?>

                </span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Site:</strong> <span><a style="text-decoration: none; color: white" href="<?php echo get_home_url(); ?>"><?php echo get_home_url(); ?></a></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Telefone:</strong> <span><?php echo get_field('phone_number', 'options'); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Cidade:</strong> <span><?php echo get_field('city', 'options'); ?></span></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php
                                                                                  $intervalo = $now->diff($born_date);
                                                                                  echo ($intervalo->y > 0) ? $intervalo->y . ' Anos ' : 'Ano,';
                                                                                  echo ($intervalo->m > 1) ? ', ' . $intervalo->m . ' meses,' : (($intervalo->m == 0) ? 'e ' : ', ' . $intervalo->m . ' mês');
                                                                                  echo ($intervalo->d > 1) ? (($intervalo->m == 0) ? ' ' : 'e ') . $intervalo->d . ' dias. - ' : (($intervalo->d == 0) ? '.' : (($intervalo->m == 0) ? ' ' : 'e ') . $intervalo->d . ' dia. - ');
                                                                                  echo '(' . $intervalo->h . ':' . $intervalo->i . ':' . $intervalo->s . ')';
                                                                                  ?></span></li>

              <li><i class="bi bi-chevron-right"></i> <strong>Escolaridade:</strong> <span><?php echo get_field('degree', 'options'); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><a style="text-decoration: none; color: white" href="mailto:<?php echo get_field('contact_mail', 'options'); ?>"><?php echo get_field('contact_mail', 'options'); ?></a></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?php echo (get_field('freelancer_avaliable', 'options') ? 'Disponível' : 'Não disponível'); ?></span></li>
            </ul>
          </div>
        </div>
        <p>
          <?php echo get_field('profile_description', 'options'); ?>
        </p>
      </div>
    </div>

  </div><!-- End About Me -->

  <!-- ======= Counts ======= -->
  <div class="counts container">

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="count-box">
          <i class="bi bi-emoji-smile"></i>
          <span data-purecounter-start="0" data-purecounter-end="<?php echo get_field('satisfect_cliets', 'options'); ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Clientes/Parceiros Satisfeitos</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
        <div class="count-box">
          <i class="bi bi-journal-richtext"></i>
          <span data-purecounter-start="0" data-purecounter-end="<?php echo get_field('projects', 'options'); ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Projetos</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
          <i class="bi bi-headset"></i>
          <span data-purecounter-start="0" data-purecounter-end="<?php echo get_field('time_support', 'options'); ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Horas de Suporte</p>
        </div>
      </div>

    </div>

  </div><!-- End Counts -->

  <!-- ======= Skills  ======= -->
  <div class="skills container">

    <div class="section-title">
      <h2>Skills</h2>
    </div>

    <div class="row skills-content">

      <?php

      $skills = get_field('skills', 'options');
      foreach ($skills as $skill) {
      ?>
        <div class="col-lg-6">
          <div class="progress">
            <span class="skill"><?php echo $skill['title'] ?><i class="val"><?php echo $skill['percent'] ?></i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>


    </div>

  </div><!-- End Skills -->

  <!-- ======= Interests ======= -->
  <?php
  if (!empty(get_field('interests', 'options'))) {
  ?>
    <div class="interests container">
      <div class="section-title">
        <h2>Interesses</h2>
      </div>
      <div class="row">
        <?php
        foreach (get_field('interests', 'options') as $interests) {
        ?>
        <?php
          echo '<div class="col-lg-3 col-md-4">
                    <div class="icon-box">
                      <i class="' . $interests['icon_class'] . '" style="color: ' . $interests['icon_color'] . '"></i>
                      <h3>' . $interests['text'] . '</h3>
                    </div>
                  </div>';
        }
        ?>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- ======= Interests ======= -->
  <?php
  if (!empty(get_field('testimonials', 'options'))) {
  ?>
    <div class="testimonials container">
      <div class="section-title">
        <h2>Recomendações</h2>
      </div>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php
          foreach (get_field('testimonials', 'options') as $testimonial) {
          ?>
          <?php
            echo ' <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        ' . $testimonial['description'] . '
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                      </p>
                      <img src="' . $testimonial['image'] . '" class="testimonial-img" alt="' . $testimonial['name'] . '">
                      <h3>' . $testimonial['name'] . '</h3>
                      <h4>' . $testimonial['job_function'] . '</h4>
                    </div>
                  </div>';
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="owl-carousel testimonials-carousel"></div>
    </div>
  <?php
  }
  ?>
</section><!-- End About Section -->

<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
  <div class="container">

    <div class="section-title">
      <h2>Currículo</h2>
      <p>Dê uma olhada no meu perfil</p>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <h3 class="resume-title">Currículo</h3>
        <div class="resume-item pb-0">
          <h4> <a href="<?php echo get_field('cv', 'options'); ?>"><?php echo get_field('principal_name', 'options'); ?></a></h4>
          <p><em></em></p>
          <p>
          <ul>
            <li><?php echo get_field('city', 'options'); ?></li>
            <li><?php echo get_field('phone_number', 'options'); ?></li>
            <li><a style="text-decoration: none; color: white" href="mailto:<?php echo get_field('contact_mail', 'options'); ?>"><?php echo get_field('contact_mail', 'options'); ?></a></li>
          </ul>
          </p>
        </div>

        <h3 class="resume-title">Educação</h3>
        <?php

        $educations = get_field('educations', 'options');
        foreach ($educations as $education) {
          echo '
            <div class="resume-item">
              <h4>' . $education['name'] . '</h4>
              <h5>' . $education['start_date'] . ' - ' . $education['final_date'] . '</h5>
              <p><em>' . $education['location'] . '</em></p>
              <p>' . $education['description'] . '</p>
            </div>
            ';
        }
        ?>
      </div>
      <div class="col-lg-6">
        <h3 class="resume-title">Experiência Profissional</h3>
        <?php

        $works = get_field('works', 'options');
        foreach ($works as $work) {
          echo '
            <div class="resume-item">
              <h4>' . $work['name'] . '</h4>
              <h5>' . $work['start_date'] . ' - ' . $work['final_date'] . '</h5>
              <p><em>' . $work['location'] . '</em></p>
              <p>' . $work['description'] . '</p>
            </div>
            ';
        }
        ?>
      </div>
    </div>

  </div>
</section><!-- End Resume Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="section-title">
      <h2>Serviços</h2>
      <p>Meus serviços</p>
    </div>

    <div class="row">
      <?php
      $services = get_field('services', 'options');
      foreach ($services as $service) {
        echo '
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="' . $service['icon'] . '"></i></div>
                <h4>' . $service['title'] . '</h4>
                <p>' . $service['description'] . '</p>
              </div>
            </div>
            ';
      }
      ?>
    </div>
  </div>
  </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">
      <h2>Portfólio</h2>
      <p>Meus parceiros</p>
    </div>
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <?php
          $categorys = get_terms();
          foreach ($categorys as $category) {
            echo '<li data-filter=".filter-' . $category->slug . '">' . $category->name . '</li>';
          }
          ?>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container">
      <?php

      $wp_query = new WP_Query(array(
        'post_type' => 'portfolio',
        'order' => 'asc',
        'posts_per_page' => 20,
        'paged' => get_query_var('paged')
      ));
      if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
      $category = get_the_category();
      $thumbnail = get_the_post_thumbnail_url();
      if(isset($category))
      ?>
          <div class="col-lg-4 col-md-6 portfolio-item 
          <?php 
          foreach ($category as $cat) {
            echo ' filter-'.$cat->slug;
          }
          ?>"
          >
            <div class="portfolio-wrap">
              <img src="<?php echo  $thumbnail ; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php the_title(); ?></h4>
                <p><?php the_content(); ?></p>
                <div class="portfolio-links">
                  <a href="<?php echo get_field('link'); ?>" class="portfolio-lightbox" target="_blank"><i class="ri-arrow-go-forward-line"></i></a>
                </div>
              </div>
            </div>
          </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </div>
</section><!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Contato</h2>
      <p>Fale Comigo</p>
    </div>

    <div class="row mt-2">

      <div class="col-md-6 d-flex align-items-stretch">
        <div class="info-box">
          <i class="bx bx-map"></i>
          <h3>Endereço</h3>
          <p><?php echo get_field('address', 'options').' - '.get_field('city', 'options'); ?></p>
        </div>
      </div>

      <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
        <div class="info-box">
          <i class="bx bx-share-alt"></i>
          <h3>Social</h3>
          <div class="social-links">
          <?php
            foreach (get_field('social_links', 'options') as $social_link) {
              echo '<a target="_blank" href="' . $social_link['link'] . '"><i class="' . $social_link['icon_class'] . '"></i></a>';
            }
          ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mt-4 d-flex align-items-stretch">
        <div class="info-box">
          <i class="bx bx-envelope"></i>
          <h3>Email</h3>
          <p><?php echo get_field('contact_mail', 'options'); ?></p>
        </div>
      </div>
      <div class="col-md-6 mt-4 d-flex align-items-stretch">
        <div class="info-box">
          <i class="bx bx-phone-call"></i>
          <h3>Me ligue</h3>
          <p><a href="tel:<?php echo get_field('phone_number', 'options'); ?>"></a><?php echo get_field('phone_number', 'options'); ?></p>
        </div>
      </div>
    </div>
    <?php
      $form = get_field('cf7-form', 'options');

      echo do_shortcode('[wpforms id="'.$form.'"]');

    ?>
    

    <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
      <div class="row">
        <div class="col-md-6 form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
        </div>
      </div>
      <div class="form-group mt-3">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
      </div>
      <div class="form-group mt-3">
        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
      </div>
      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit">Send Message</button></div>
    </form> -->

  </div>
</section><!-- End Contact Section -->

<div class="credits container d-flex justify-content-between">
  <!-- All the links in the footer should remain intact. -->
  <!-- You can delete the links only if you purchased the pro version. -->
  <!-- Licensing information: https://bootstrapmade.com/license/ -->
  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
  <span>Layout por <a href="https://bootstrapmade.com/">BootstrapMade</a></span>
  <span>Implementado por <a href="https://andrefreire.com.br/"><?php echo get_field('principal_name', 'options') ?></a></span>
</div>

<?php

get_footer();

?>