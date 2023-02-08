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
  <?php if( !empty( get_field('block_how_it_works') ) ): 
    $field = get_field('block_how_it_works'); ?>
    <div class="container py-10">
      
      <div class="mb-10">
        <h3 class="text-4xl mb-2.5"><b> <?=$field['heading']?> </b></h3>
        <p><?=$field['description']?></p>
      </div>

      <div class="grid grid-cols-12 gap-6">      
        <div class="col-span-12 md:col-span-4">
          

        </div>
      </div>

      <div class="grid grid-cols-12 gap-6">
        <?php $i=1; foreach( $field['list'] as $item ): ?>
          <div class="col-span-12 md:col-span-4">
            <div class="bg-l-black rounded-[20px] py-5 px-6 text-center relative h-full">      
              <img class="rounded-full m-auto  lg:mb-5" src="<?=$item['image']['url']?>" alt="<?=$item['image']['alt']?>">
              <div class="ml-5 lg:ml-0">
                <h4 class="text-[22px] mb-4"><?=$item['title']?></h4>
                <p class="mb-4"><?=$item['content']?></p>
              </div>
            </div>
          </div>
        <?php $i++; endforeach; ?>
      </div>

    </div>

  <?php endif; ?>
</div>