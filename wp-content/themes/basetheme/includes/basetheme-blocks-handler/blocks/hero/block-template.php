<?php 
include dirname(__FILE__).'/variables.php'; ?>

<!-- Block: <?php echo $block_title.' - '.$block_name; ?> -->

<?php
if( is_admin() ){ // Block Hover preview
    $prev_path = dirname(__FILE__).'/preview/';
    $prev_file = glob($prev_path."*.{jpg,jpeg,png,svg}", GLOB_BRACE);
    echo '<center><img style="max-width: 100%; margin:0 auto;" src="'.get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/preview/'.basename($prev_file[0]).'"></center>';
    return false;
}

$classes = ['block_'.$block_name.' relative'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

$anchor = '';
if( !empty( $block['anchor'] ) )
	$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
?>

<div class="bg-d-black <?=join( ' ', $classes )?>" <?=$anchor?>>
  <?php if( !empty( get_field('block_hero') ) ): 
    $field = get_field('block_hero'); ?>
    <div class="container py-10">
      <div class="grid grid-cols-12 gap-6">      
        <div class="col-span-12 md:col-span-6 ">
          <h2 class="text-3xl md:text-4xl lg:text-6xl xl:text-8xl"><?=$field['heading']?></h2>
          <p class="py-5 text-base md:text-xl text-2xl lg:pr-24"><?=$field['description']?></p>
         
          <div class="mt-5 hidden md:block">
            <a href="<?=$field['button']['url']?>" 
              target="<?=$field['button']['target']?>"
              class="primary-button inline-flex items-center justify-center">
              <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/rocket-white.png';?>" class="mr-2">
              <?=$field['button']['title']?>
            </a>
          </div>

          <div class="py-10 text-2xl hidden md:flex">  
            <div class="col-span-4">
              <p><b>240k+</b></p>
              <p>Total Sale</p>
            </div>
            <div class="col-span-4 px-10">
              <p><b>100k+</b></p>
              <p>Auctions</p>
            </div>
            <div class="col-span-4">
              <p><b>240k+ </b></p>
              <p>Artists</p>
            </div>
          </div>

        </div>
        <div class="col-span-12 md:col-span-6 ">
          <?php $post = $field['display']?>

          <div class="rounded-[20px] overflow-hidden"> 
            <?php $bgimage = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <img src="<?=$bgimage?>" class="w-full">
            <div class="p-5 bg-l-black">
              <h4 class="text-[22px] mb-[5px]"><?=$post->post_title?></h4>
              <?php $nft_field=get_field('nft', $post->ID); ?>
              <div class="flex mt-4 ">
                <img class="w-6 mr-2 " src="<?=$nft_field['author_image']['url']?>" alt="<?=$nft_field['author_image']['alt']?>">
                <span><?=$nft_field['auhtor_name']?></span>
              </div>
            </div>
          </div> 
        </div>
      </div>

      <a href="<?=$field['button']['url']?>" 
        target="<?=$field['button']['target']?>"
        class="primary-button mt-10 block md:hidden flex items-center justify-center">
        <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/rocket-white.png';?>" class="mr-2">
        <?=$field['button']['title']?>
      </a>
    </div>

  <?php endif; ?>
</div>