<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.","wpbootstrap"); ?></div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
	<h3 id="comments"><?php comments_number('<span>' . __("No","wpbootstrap") . '</span> ' . __("Responses","wpbootstrap") . '', '<span>' . __("One","wpbootstrap") . '</span> ' . __("Response","wpbootstrap") . '', '<span>%</span> ' . __("Responses","wpbootstrap") );?> <?php _e("to","wpbootstrap"); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","wpbootstrap") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","wpbootstrap") ) ?></li>
	 	</ul>
	</nav>
	
	
	
	<?php endif; ?>
	
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
		<h3 id="pings">Trackbacks/Pingbacks</h3>
		
		<ol class="pinglist">
			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ol>
	<?php endif; ?>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","wpbootstrap") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","wpbootstrap") ) ?></li>
		</ul>
	</nav>

	<?php if ( ! comments_open() ) : ?>
	<p class="alert alert-info"><?php _e("Comments are closed","wpbootstrap"); ?>.</p>
	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<div class="single-comment-form">
	<?php $comments_args = array(
			// change the title of send button
			'label_submit' => 'Submit',
			// change the title of the reply section
			'title_reply' => 'Leave Comment',
			// remove "Text or HTML to be displayed after the set of comment fields"
			// 'comment_notes_after' => '<p><small>Your comment may be subject to editorial review.</small></p>',
			'fields' => apply_filters('comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' . '<input id="author" class="form-control" placeholder="Name" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' required="required"/>' . ($req ? '<span style="color:red" class="required">*</span>' : '') . '</p>',
				'email' => '<p class="comment-form-email">' . '<input id="email" class="form-control" placeholder="Email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' required="required" />' . ($req ? '<span style="color:red" class="required">*</span>' : '') . '</p>'
			)) ,
			// redefine your own textarea (the comment body)
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="message" class="form-control" rows="6" cols="37" wrap="hard"></textarea></p>',
		);
		comment_form($comments_args);  ?>
	</div>	
		<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>
<?php endif; // if you delete this the sky will fall on your head ?>
