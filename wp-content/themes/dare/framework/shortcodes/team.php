<?php


function add_shortcode_team_group( $atts, $content ){

	$output='';

	global $add_tabs_script;$add_tabs_script=true;

	$GLOBALS['member_count'] = 0;

	do_shortcode( $content );

	if( is_array( $GLOBALS['members'] ) ){

		foreach( $GLOBALS['members'] as $member ){
					
			$members[] = '<div class="member">';
				$members[] .= '<div class="picture"><img src="'.theme_resize($member['image'],300,0,false).'" alt="" /></div>';
				$members[] .= '<div class="desc">'.$member['content'].'</div>';
				$members[] .= '<div class="clear"></div>';
			$members[] .= '</div>';
			
		}
		
		$output .= '<div class="team-members">';
		
			$output .= '<div class="ten columns first">';
				$output .=do_shortcode(implode( "\n", $members ));
			$output .= '</div>';
			
			$output .= '<div class="nav two columns last">';
				$output .= '<div class="up"></div>';
				$output .= '<div class="down"></div>';
			$output .= '</div>';

			$output .= '<div class="clear"></div>';
			
		$output .= '</div>';
		

		
	}
	
	return $output;
	
}

add_shortcode( 'team-group', 'add_shortcode_team_group' );


function add_shortcode_team_member( $atts, $content ){

	extract(shortcode_atts(array(
	'image' => ''
	), $atts));

	$x = $GLOBALS['member_count'];
	$GLOBALS['members'][$x] = array( 'image' => sprintf( $image, $GLOBALS['member_count'] ), 'content' =>  $content );

	$GLOBALS['member_count']++;
	
}

add_shortcode( 'member', 'add_shortcode_team_member' );

?>