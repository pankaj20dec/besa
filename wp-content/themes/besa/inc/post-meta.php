<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Option
Container::make('theme_options', 'Theme Options')
    ->add_fields(array(
        Field::make('text', 'crb_facebook_link'),
        Field::make('text', 'crb_instagram_link'),
		Field::make('image', 'crb_logo_image')->set_value_type('url')		
    ));
	
