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
  <?php if( !empty( get_field('block_collection_list') ) ): 
    $field = get_field('block_collection_list'); ?>
    <div class="container py-10">
      <h3 class="text-4xl mb-10"><b> <?=$field['heading']?> </b></h3>

      <div class="grid grid-cols-12 gap-6">
      <?php foreach( $field['display'] as $cat ): 
          $featured_image = get_field('featured_image', $cat);?>
          <div class="col-span-6 md:col-span-3">
            <div class="rounded-[20px] overflow-hidden"> 
              <img src="<?=$featured_image['url']?>" alt="<?=$featured_image['alt']?>" class="w-full">
              <div class="p-5 bg-l-black">
                <h3 class=""> <?=$cat->name ?> </h3>
              </div>
            </div>   
          </div>

        <?php endforeach; ?>
      </div>
    </div>

  <?php endif; ?>
</div>