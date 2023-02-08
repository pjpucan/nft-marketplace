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
  <?php if( !empty( get_field('block_subscribe') ) ): 
    $field = get_field('block_subscribe'); ?>
    <div class="container py-10">


      <div class="bg-l-black rounded-[20px] p-10">

        <div class="md:grid grid-cols-12 gap-6">        
          <div class="col-span-12 md:col-span-6 ">
            <img src="<?=$field['image']['url']?>" class="w-full md:pr-4">
          </div>

          <div class="col-span-12 md:col-span-6 md:flex items-center justify-center h-full mt-6 md:mt-0">
            <?=do_shortcode($field['form'])?>
          </div>
          
        </div>
      </div>
      
    </div>

  <?php endif; ?>
</div>