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
  <?php if( !empty( get_field('block_creators') ) ): 
    $field = get_field('block_creators'); ?>
    <div class="container py-10">

      <div class="flex mb-10 justify-between">
        <div>
          <h3 class="text-4xl mb-2.5"><b> <?=$field['heading']?> </b></h3>
          <p><?=$field['description']?></p>
        </div>

        <?php if(!empty($field['rankings_link'])): ?>
          <div class="hidden md:block">
            <a href="<?=$field['rankings_link']['url']?>" 
            target="<?=$field['rankings_link']['target']?>"
            class="primary-outline-button flex items-center">
              <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/rocket.png';?>" class="mr-2">
              <?=$field['rankings_link']['title']?>
            </a> 
          </div>
        <?php endif; ?>

      </div>


      <div class="grid grid-cols-12 gap-6">
        <?php $i=1; foreach( $field['list'] as $creator ): ?>
          <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="bg-l-black rounded-[20px] p-5 md:text-center relative flex lg:block">      
              <span class="absolute top-3 left-3 lg:top-5 lg:left-5 rounded-full bg-d-black block w-[30px] h-[30px] text-l-gray flex items-center justify-center">
                <?=$i?>
              </span>        
              <img class="rounded-full lg:m-auto w-[60px] lg:w-auto lg:mb-5" src="<?=$creator['image']['url']?>" alt="<?=$creator['image']['alt']?>">
              <div class="ml-5 lg:ml-0">
                <h4 class="text-[22px] mb-[5px]"><?=$creator['name']?></h4>
                <p><span class="text-l-gray mr-2">Total Sales: </span><?=$creator['sales']?> ETH</p>
              </div>
            </div>
          </div>
        <?php $i++; endforeach; ?>
      </div>


      <?php if(!empty($field['rankings_link'])): ?>
          <div class="block md:hidden">
            <a href="<?=$field['rankings_link']['url']?>" 
            target="<?=$field['rankings_link']['target']?>"
            class="primary-outline-button flex items-center justify-center block md:hidden mt-6">
              <img src="<?=get_stylesheet_directory_uri().'/includes/basetheme-blocks-handler/blocks/'.$block_name.'/lib/images/rocket.png';?>" class="mr-2">
              <?=$field['rankings_link']['title']?>
            </a> 
          </div>
        <?php endif; ?>

    </div>
    
  <?php endif; ?>
</div>