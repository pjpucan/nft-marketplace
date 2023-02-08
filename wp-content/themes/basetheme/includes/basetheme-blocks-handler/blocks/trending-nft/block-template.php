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
  <?php if( !empty( get_field('block_trending') ) ): 
    $field = get_field('block_trending'); ?>
    <div class="container py-10">

      <div class="flex mb-10 justify-between">
        <div>
          <h3 class="text-4xl mb-2.5"><b> <?=$field['heading']?> </b></h3>
          <p><?=$field['description']?></p>
        </div>

        <?php if(!empty($field['button'])): ?>
          <div class="hidden md:block">
            <a href="<?=$field['button']['url']?>" 
            target="<?=$field['button']['target']?>"
            class="primary-outline-button flex items-center">
              <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/eye.png';?>" class="mr-2">
              <?=$field['button']['title']?>
            </a> 
          </div>
        <?php endif; ?>
      </div>

      <div class="grid grid-cols-12 gap-6">
        <?php foreach( $field['display'] as $post ): ?>
          
          <?php $bgimage = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
          <div class="col-span-12 md:col-span-4">
        
          <div class="rounded-[20px] overflow-hidden"> 
            <img src="<?=$bgimage?>" class="w-full">
            <div class="p-5 bg-l-black">
              <h4 class="text-[22px] mb-[5px]"><?=$post->post_title?></h4>
              <?php $nft_field=get_field('nft', $post->ID)?>
              <div class="flex mt-2 mb-6">
                <img class="w-6 mr-2 " src="<?=$nft_field['author_image']['url']?>" alt="<?=$nft_field['author_image']['alt']?>">
                <span><?=$nft_field['auhtor_name']?></span>
              </div>

              <div class="flex justify-between">

                <div>
                  <p class="text-xs text-[#858584]">Pirce</p>
                  <p><?=$nft_field['price']?> ETH</p>
                </div>

                <div class="text-right">
                  <p class="text-xs text-[#858584]">Highest Bid</p>
                  <p><?=$nft_field['highest_bid']?> wETH</p>
                </div>

              </div>

            </div>
          </div> 

        </div>
        <?php endforeach; ?>
      </div>


      <?php if(!empty($field['button'])): ?>
        <div class="block md:hidden">
          <a href="<?=$field['button']['url']?>" 
          target="<?=$field['button']['target']?>"
          class="primary-outline-button flex items-center justify-center block md:hidden mt-6">
            <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/eye.png';?>" class="mr-2">
            <?=$field['button']['title']?>
          </a> 
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>
</div>