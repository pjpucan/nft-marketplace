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

<div class="bg-d-black py-10 <?=join( ' ', $classes )?>" <?=$anchor?> >
  <?php if( !empty( get_field('block_auction_countdown') ) ): 
    $field = get_field('block_auction_countdown'); ?>
    <div class="h-screen relative w-full bg-cover bg-center" style="background-image: url(<?=$field['background_image']['url']?>)">

    <div class="absolute h-screen w-full top-0 left-0" style="background: linear-gradient(180deg, rgba(162, 89, 255, 0) 0%, #A259FF 100%);"></div>

      <div class="absolute bottom-0 w-full pb-20 ">
        <div class="container flex justify-between">      
          <div>
            <?php $post = $field['display'];
            $nft_field=get_field('nft', $post->ID)?>
            <span class="inline-flex mt-2 bg-l-black px-4 py-2 rounded-full">
              <img class="w-6 mr-2" src="<?=$nft_field['author_image']['url']?>" alt="<?=$nft_field['author_image']['alt']?>">
              <span><?=$nft_field['auhtor_name']?></span>
            </span>
            <h2 class="text-4xl my-8"><?=$post->post_title;?></h2>
            <a href="<?=get_the_permalink($post->ID)?>" 
              class="button-white inline-flex items-center justify-center">
              <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/eye.png';?>" class="mr-2">
              <b>See NFT</b>
            </a>
          </div>
          <div >
            <div class="w-full h-full flex justify-end items-end">
              <div class="mt-2 relative p-8 rounded-[20px] overflow-hidden">
              
              
                <div class="absolute h-screen w-full bg-l-black opacity-70 top-0 left-0" ></div>
                <div class="relative">
                  <p>Auction ends in:</p>
                  <div class="flex justify-start">
                    <div>
                      <h3 class="text-4xl pt-1">59</h3>
                      <p>hours</p>
                    </div>
                    <span class="text-4xl px-2">:</span>
                    <div>
                      <h3 class="text-4xl pt-1">59</h3>
                      <p>minutes</p>
                    </div>
                    <span class="text-4xl px-2">:</span>
                    <div>
                      <h3 class="text-4xl pt-1">59</h3>
                      <p>seconds</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  <?php endif; ?>
</div>