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
  <?php if( !empty( get_field('block_trending_collection') ) ): 
    $field = get_field('block_trending_collection'); ?>
    <div class="container py-10">

      <div class="mb-10">
        <h3 class="text-4xl mb-2.5"><b> <?=$field['heading']?> </b></h3>
        <p><?=$field['description']?></p>
      </div>

      <div class="grid grid-cols-12 gap-6">
        <?php foreach( $field['display'] as $cat ): 
          $featured_image = get_field('featured_image', $cat);
          $author_name = get_field('collection_author_name', $cat);
          $author_image = get_field('collection_author_image', $cat);
          $gallery = get_field('collection_gallery', $cat);
          
          ?>
          
          <div class="col-span-12 md:col-span-4">
            
            <img src="<?=$featured_image['url']?>" alt="<?=$featured_image['alt']?>" class="w-full mb-4">
            
            <div class="grid grid-cols-12 gap-4">
              <?php foreach( $gallery as $image ):?>
                <div class="col-span-4">
                  <img src="<?=$image['url']?>" alt="<?=$image['alt']?>" class="w-full">
                </div>
              <?php endforeach; ?>
              <div class="col-span-4">
                <div class="bg-primary rounded-[20px] p-5 flex items-center justify-center h-full text-xl">
                  1025+
                </div>
              </div>
            
            </div>
            <h4 class="text-[22px] mt-6 mb-2"> <?=$cat->name?></h4>
            <div class="flex mb-6">
              <img class="w-6 mr-2 " src="<?=$author_image['url']?>" alt="<?=$author_image['alt']?>">
              <span><?=$author_name?></span>
            </div>

          </div>

        <?php endforeach; ?>
      </div>


    </div>
  <?php endif; ?>
</div>