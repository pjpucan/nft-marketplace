    <?php $footer = get_field('footer', 'option'); ?>
    <footer class="bg-l-black py-10"> 
      <div class="container">
        <div class="lg:grid lg:grid-cols-12">
					<div class="col-span-4 mb-10 lg:mb-6">
            <a class="flex mb-6 text-2xl items-center">
              <img src="<?=get_stylesheet_directory_uri()?>/assets/images/storefront.png" alt="" class="mr-2">
              <span>NFT Marketplace</span>
            </a>
            <p class="text-l-gray mb-6"><?=$footer['footer_description']?></p>
            <p class="text-l-gray mb-4">Join our community</p>
            <div class="flex">
              <?php if( !empty($footer['social_media']) ):?>
                <?php foreach( $footer['social_media'] as $sm ): ?>
                  <a href="<?=$sm['icon']['link']?>" class="mr-1">
                    <img src="<?=$sm['icon']['url']?>" alt="<?=$sm['icon']['alt']?>">
                  </a>
                <?php endforeach;?>
              <?php endif; ?>
            </div>
          </div>
					<div class="col-span-3 mb-10 lg:mb-6">
            <h2 class="mb-6 text-2xl">Explore</h2>
            <ul class="nav">
              <?php wp_nav_menu(array('theme_location'=>'footer-menu')); ?>
            </ul>
          </div>
					<div class="col-span-5 mb-10 lg:mb-6">
            <div class="form">
              <?=do_shortcode($footer['subscribe_form'])?>
            </div>
          </div>
        </div>
        <hr class="border-[#858584]">
        <div class="copyright mt-6 text-l-gray">
          <?=$footer['copyright']?>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>