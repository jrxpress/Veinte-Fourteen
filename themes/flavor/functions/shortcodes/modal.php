<?php
/**
 *
 */
class itModal {
	
	/**
	 *
	 */
	public static function modal( $atts = null, $content = null ) {
		if( $atts == 'generator' ) {			
			$option = array( 
				'name' => __( 'Modal Dialog Box', IT_TEXTDOMAIN ),
				'value' => 'modal',
				'options' => array(
				
					array(
						'name' => __( 'Heading', IT_TEXTDOMAIN ),
						'desc' => __( 'The header for the modal', IT_TEXTDOMAIN ),
						'id' => 'heading',
						'default' => '',
						'type' => 'textarea'
					),
					array(
						'name' => __( 'Body', IT_TEXTDOMAIN ),
						'desc' => __( 'The body content for the modal', IT_TEXTDOMAIN ),
						'id' => 'content',
						'default' => '',
						'type' => 'textarea',
					),
					array(
						'name' => __( 'Footer', IT_TEXTDOMAIN ),
						'desc' => __( 'The footer content for the modal', IT_TEXTDOMAIN ),
						'id' => 'footer',
						'default' => '',
						'type' => 'textarea'
					),
					array(
						'name' => __( 'Heading Dismiss Button', IT_TEXTDOMAIN ),
						'id' => 'dismiss_header',
						'options' => array( 'dismiss_header' => __( 'Display the dismiss button in the heading', IT_TEXTDOMAIN ) ),
						'type' => 'checkbox'
					),
					array(
						'name' => __( 'Footer Dismiss Button', IT_TEXTDOMAIN ),
						'id' => 'dismiss_footer',
						'options' => array( 'dismiss_footer' => __( 'Display the dismiss button in the footer', IT_TEXTDOMAIN ) ),
						'type' => 'checkbox'
					),
					array(
						'name' => __( 'Trigger Button Text', IT_TEXTDOMAIN ),
						'desc' => __( 'This is the text that will appear in the button that triggers the modal to display.', IT_TEXTDOMAIN ),
						'id' => 'text',
						'default' => '',
						'type' => 'text'
					),
					array(
						'name' => __( 'Trigger Button Size', IT_TEXTDOMAIN ),
						'desc' => __( 'Size of the button that triggers the modal to display', IT_TEXTDOMAIN ),
						'id' => 'size',
						'default' => '',
						'options' => array(
							'btn-mini' => __('mini', IT_TEXTDOMAIN ),
							'btn-small' => __('small', IT_TEXTDOMAIN ),
							'btn-medium' => __('medium', IT_TEXTDOMAIN ),
							'btn-large' => __('large', IT_TEXTDOMAIN ),
						),
						'type' => 'select',
					),
					array(
						'name' => __( 'Trigger Button Style', IT_TEXTDOMAIN ),
						'desc' => __( 'Style of the button that triggers the modal to display.', IT_TEXTDOMAIN ),
						'id' => 'variation',
						'default' => '',
						'options' => array(
							'' => __('Default', IT_TEXTDOMAIN ),
							'btn-primary' => __('Primary', IT_TEXTDOMAIN ),
							'btn-info' => __('Info', IT_TEXTDOMAIN ),
							'btn-success' => __('Success', IT_TEXTDOMAIN ),
							'btn-warning' => __('Warning', IT_TEXTDOMAIN ),
							'btn-danger' => __('Danger', IT_TEXTDOMAIN ),
							'btn-inverse' => __('Inverse', IT_TEXTDOMAIN ),
							'btn-link' => __('Standard Link', IT_TEXTDOMAIN),
						),
						'type' => 'select',
					),
					
				'shortcode_has_atts' => true,
				)
			);
		
			return $option;
		}
			
		extract(shortcode_atts(array(
			'heading'      => '',
		    'footer'       => '',
			'dismiss_header' => '',
			'dismiss_footer' => '',
			'text'         => '',
			'size'         => '',
			'variation'    => '',
	    ), $atts));
		
		$id = 'modal_'.rand();
		
		$dismiss_header = ( $dismiss_header ) ? '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' : '';
		
		$dismiss_footer = ( $dismiss_footer ) ? '<button class="btn" data-dismiss="modal" aria-hidden="true">'.__('Close',IT_TEXTDOMAIN).'</button>' : '';

		$heading = ( $heading ) ? '<h3>'.$heading.'</h3>' : '';
		
		$content = ( $content ) ? '<div class="modal-body"><p>'.do_shortcode($content).'</p></div>' : '';
		
		$out = '<a href="#'.$id.'" role="button" class="btn '.$size.' '.$variation.'" data-toggle="modal">'.$text.'</a>';
		
		$out .= '<div id="'.$id.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header">'.$dismiss_header.' '.$heading.'</div>'.$content.'<div class="modal-footer">'.do_shortcode($footer).' '.$dismiss_footer.'</div></div>';

	    return $out;
	}
	
	public static function _options( $class ) {
		$shortcode = array();
		
		$class_methods = get_class_methods( $class );
		
		foreach( $class_methods as $method ) {
			if( $method[0] != '_' )
				$shortcode[] = call_user_func(array( &$class, $method ), $atts = 'generator' );
		}
		
		$options = array(
			'name' => __( 'Modal Dialog Box', IT_TEXTDOMAIN ),
			'value' => 'modal',
			'options' => $shortcode
		);
		
		return $options;
	}
	
}

?>
