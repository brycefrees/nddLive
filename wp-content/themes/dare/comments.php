
	<?php if ( post_password_required() ) : ?>
	
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', THEME_SLUG ); ?></p>
	</div><!-- #comments -->
	<?php return; endif;
	?>
	
	<?php if ( have_comments() ) : ?>
	

		<h5 id="comments-title"><?php printf( _n( 'Comments (1)', 'Comments (%1$s)', get_comments_number(), THEME_SLUG ), number_format_i18n( get_comments_number() ) ); ?></h5>
			
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', THEME_SLUG ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', THEME_SLUG ) ); ?></div>
		</nav>
		<?php endif;  ?>

		<div id="comments" class="clearfix">	
			<ul class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tf_comment' ) ); ?>
			</ul>
		</div>	
		<div class="clear"></div>
		<hr />
	
			
	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			
		<p class="nocomments"><?php _e( 'Comments are closed.', THEME_SLUG ); ?></p>
		
	<?php endif; ?>
	

	<?php comment_form(); ?>
	

<?php
function tf_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', THEME_SLUG ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default:
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<div class="avatar"><?php echo get_avatar( $comment, 50, THEME_IMG.'/avatar.png' ); ?></div>
		
		<div class="details">
			
			<?php printf( '%1$s',sprintf( '<span class="author">%s</span>', get_comment_author_link() )); ?>
			<?php printf( '%1$s',sprintf( '<span class="date">'.__('on', THEME_SLUG).' %s</span>', sprintf( '%1$s', get_comment_date(), get_comment_time() ) )); ?>

			<span class="reply">-&nbsp; <?php comment_reply_link( array( 'reply_text' => __( 'Reply', THEME_SLUG ), $comment->comment_ID ,'depth' => $depth, 'max_depth' => $args['max_depth'] ),  $comment->comment_ID ); ?></span>
			<?php edit_comment_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
			
			<div class="comment-text">
			
				<?php comment_text(); ?>
				
				<?php if ( $comment->comment_approved == '0' ): ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', THEME_SLUG ); ?></em>
					<br />
				<?php endif; ?>
			
			</div>
		
		</div>	
		<div class="clear"></div>
	
	
		
	<?php
	break;
	endswitch;
}
?>