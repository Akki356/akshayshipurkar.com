<?php $category = get_the_category();
?>
<ul class="meta_info">
	<li><?php nouveau_posted_on(); ?>   <span class="divider">/</span></li>
	 <?php if ( nouveau_categorized_blog() ) : ?>
    <li><?php the_category( __( ', ', 'nouveau' ) ); ?><span class="divider">/</span></li>
 <?php endif; ?>
	<li><i class="fa fa-comment"></i> <?php comments_number( __( '0' , 'nouveau' ), __( '1', 'nouveau' ),'%' ) ?> </li>
	<li><?php edit_post_link( __( 'Edit This Post', 'nouveau' ), '<span class="edit-link"><span class="divider">/</span> <i class="fa fa-pencil"></i>', '</span>' ); ?></li>
</ul>

<div class="clearfix"></div>