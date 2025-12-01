<?php

Class OxygenCompositeElements {

	public $composite_elements;

	function __construct() {

		$this->composite_elements = $this->get_composite_elements();

		if ( isset( $this->composite_elements->error ) ) {
			// do we need a way to show error message somewhere?
			return;
		}

		if ( !isset( $this->composite_elements->components ) || !is_array( $this->composite_elements->components ) ) {
			return;
		}

		add_action("oxygen_basics_components_containers", 	array( $this, "buttons_basic_containers"), 20);
		add_action("oxygen_basics_components_text", 		array( $this, "buttons_basic_text"), 20);
		add_action("oxygen_basics_components_links", 		array( $this, "buttons_basic_links"), 20);
		add_action("oxygen_basics_components_visual", 		array( $this, "buttons_basic_visual"), 20);
		add_action("ct_toolbar_fundamentals_list", 			array( $this, "buttons_basic_other"), 20);
		add_action("oxygen_helpers_components_composite", 	array( $this, "buttons_helpers_composite"), 20);
		add_action("oxygen_helpers_components_dynamic", 	array( $this, "buttons_helpers_dynamic"), 20);
		add_action("oxygen_helpers_components_interactive", array( $this, "buttons_helpers_interactive"), 20);
		add_action("oxygen_helpers_components_external", 	array( $this, "buttons_helpers_external"), 20);
		add_action("oxy_folder_wordpress_components", 		array( $this, "buttons_wordpress"), 20);
		add_action("oxygen_add_plus_woo_single", 			array( $this, "buttons_woo_single"), 20);
		add_action("oxygen_add_plus_woo_archive", 			array( $this, "buttons_woo_archive"), 20);
		add_action("oxygen_add_plus_woo_page", 				array( $this, "buttons_woo_page"), 20);
		add_action("oxygen_add_plus_woo_other", 			array( $this, "buttons_woo_other"), 20);

		// Make WooCo Composite Elements searchable
		add_action("ct_toolbar_components_list_searchable",	array( $this, "buttons_woo_single"), 20);
		add_action("ct_toolbar_components_list_searchable",	array( $this, "buttons_woo_archive"), 20);
		add_action("ct_toolbar_components_list_searchable",	array( $this, "buttons_woo_page"), 20);
		add_action("ct_toolbar_components_list_searchable",	array( $this, "buttons_woo_other"), 20);
	}


	function buttons($location) {
	
		$design_name = "composite-elements";

		foreach ( $this->composite_elements->components as $key => $element ) : 
			
			if ( !isset($element->min_version) || version_compare(CT_VERSION, $element->min_version) === -1 ) {
				continue;
			}

			if (oxygen_hide_element_button($element->id."-".$element->page)) {
				continue;
			}

			if ( isset($element->location) && $element->location == $location ) : ?>
			<div class='oxygen-add-section-element oxygen-add-composite-element'
				data-searchid="<?php echo strtolower( preg_replace('/\s+/', '_', sanitize_text_field( $element->name ) ) ) ?>"
				data-searchname="<?php echo esc_attr( $element->name ); ?>"
				data-searchcat="<?php echo esc_attr( $location ); ?>"
				ng-click="iframeScope.showAddItemDialog(<?php echo $element->id; ?>, 'component', '0', '', '<?php echo $element->source; ?>', <?php echo $element->page; ?>, '<?php echo $element->name; ?>', '<?php echo $element->category; ?>', '<?php echo $design_name; ?>')">
				<?php if ( isset($element->icon_url) ) : ?>
				<img src='<?php echo str_replace(array('http://','https://'), "//", $element->icon_url); ?>' />
				<img src='<?php echo str_replace(array('http://','https://'), "//", $element->icon_url); ?>' />
				<?php else: ?>
				<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/add-icons/widgets.svg' />
				<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/add-icons/widgets-active.svg' />
				<?php endif; ?>
				<?php echo ( isset($element->name) ) ? sanitize_text_field( $element->name ) : __("No name element", "oxygen"); ?>
			</div>
		<?php endif;
		endforeach;
	}

	function buttons_basic_containers () {
		$this->buttons("basic_containers");
	}


	function buttons_basic_text () {
		$this->buttons("basic_text");
	}


	function buttons_basic_links () {
		$this->buttons("basic_links");
	}


	function buttons_basic_visual () {
		$this->buttons("basic_visual");
	}


	function buttons_basic_other () {
		$this->buttons("basic_other");
	}


	function buttons_helpers_composite () {
		$this->buttons("helpers_composite");
	}


	function buttons_helpers_dynamic () {
		$this->buttons("helpers_dynamic");
	}


	function buttons_helpers_interactive () {
		$this->buttons("helpers_interactive");
	}


	function buttons_helpers_external () {
		$this->buttons("helpers_external");
	}


	function buttons_wordpress () {
		$this->buttons("wordpress");
	}

	
	function buttons_woo_single () {
		$this->buttons("woo_single");
	}


	function buttons_woo_archive () {
		$this->buttons("woo_archive");
	}


	function buttons_woo_page () {
		$this->buttons("woo_page");
	}


	function buttons_woo_other () {
		$this->buttons("woo_other");
	}

	function get_composite_elements() {
	return json_decode( '{"components":[{"id":1,"name":"Contact Form","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=contact-form&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":284},{"id":1,"name":"Logo Slider","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=logo-slider&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":232},{"id":15,"name":"Dashboard Tabs","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=dashboard-tabs&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":218,"location":"helpers_composite","min_version":"3.6"},{"id":0,"name":"Rotating Carousel","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=rotating-carousel&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":206},{"id":1,"name":"Flip Box","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=flip-box&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":193,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/flip-box\/flip-box.svg","min_version":"3.5"},{"id":5,"name":"Section Indicator","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=section-indicator&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":189,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/section-indicator\/section-indicator.svg","min_version":"3.5"},{"id":1,"name":"Dropdown Button","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=dropdown-button&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":185,"location":"basic_links","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/dropdown-button\/dropdown-button.svg","min_version":"3.5"},{"id":2,"name":"Advanced Search","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=advanced-search&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":180},{"id":0,"name":"Walkthrough","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=walkthrough&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":167},{"id":0,"name":"Smart Video","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=smart-video&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":154},{"id":90,"name":"Mega Menu","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=mega-menu&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":143,"location":"wordpress","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/mega-menu\/mega-menu.svg","min_version":"3.6"},{"id":1,"name":"Woo Other","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=woo-other&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":134},{"id":1,"name":"Woo Pages","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=woo-pages&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":133},{"id":1,"name":"Woo Archive","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=woo-archive&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":132},{"id":1,"name":"Woo Single","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=woo-single&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":131},{"id":367,"name":"Circular Counter","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=circular-counter&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":127,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/pie-counter\/pie-counter.svg","min_version":"3.5"},{"id":1,"name":"Review Box","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=review-box&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":119,"location":"helpers_composite","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/review-box\/reivew-box.svg","min_version":"3.2"},{"id":1,"name":"Number Counter","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=number-counter&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":116,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/number-counter\/number-counter.svg","min_version":"3.5"},{"id":2,"name":"Lottie Container","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=lottie-container&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":108},{"id":1,"name":"Switcher","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=switcher&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":106,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/switcher\/switcher.svg","min_version":"3.2"},{"id":1,"name":"Grid Table","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=grid-table&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":97},{"id":1,"name":"Horizontal Divider","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=horizontal-divider&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":95,"location":"basic_visual","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/horizontal-divider\/horizontal-divider.svg","min_version":"3.2"},{"id":1,"name":"Dynamic Slider","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=dynamic-slider&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":87,"location":"helpers_dynamic","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/dynamic-slider\/dynamic-slider.svg","min_version":"3.2"},{"id":1,"name":"Icon List","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=icon-list&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":86,"location":"basic_visual","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/icons-list\/icons-list.svg","min_version":"3.2"},{"id":1,"name":"Back To Top Button","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=back-to-top-button&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":68,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/back-to-top\/back-to-top.svg","min_version":"3.2"},{"id":1,"name":"Table Of Contents","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=table-of-contents&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":65,"location":"helpers_dynamic","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/table-of-contents\/table-of-contents.svg","min_version":"3.2"},{"id":9,"name":"Image Comparison","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=image-comparison&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":56,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/image-comparison\/image-comparison.svg","min_version":"3.2"},{"id":1,"name":"Expanding Menu","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=expanding-menu&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":55},{"id":16,"name":"Gradient Outline Button","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=gradient-outline-button&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":53,"location":"basic_links"},{"id":16,"name":"Gradient Button","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=gradient-button&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":49,"location":"basic_links"},{"id":1,"name":"Icon Button","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=icon-button&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":48,"location":"basic_links","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/icon-button\/icon-button.svg","min_version":"3.2"},{"id":29,"name":"Image Carousel","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=image-carousel&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":41},{"id":2,"name":"Hover Scrolling Image","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=hover-scrolling-image&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":36,"location":"basic_visual","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/Scroll-Image\/scroll-image.svg","min_version":"3.2"},{"id":1,"name":"Accordion","category":"Uncategorized","source":"https:\/\/elements.oxy.host","url":"https:\/\/elements.oxy.host\/?oxy_user_library=accordion&render_component_screenshot=true","screenshot_url":"http:\/\/placehold.it\/600x100?text=no+screenshot","page":29,"location":"helpers_interactive","icon_url":"http:\/\/elements.oxy.host\/wp-content\/uploads\/sites\/52\/2020\/11\/Composite-Elements-Icons\/accordion\/accordion.svg","min_version":"3.2"}],"pages":[]}' );
		$access_key  = "4zccZ9B5QyZg"; // to find it you should base64_decode Site Key setting from Oxygen > Settings > Library
		$desgin_url  = "https://elements.oxy.host";

		// ilya's local server
		//$access_key  = "1koQttxtVeKa";
		//$desgin_url  = "http://oxygen-server.test";

		$composite_license_key = get_option("oxygen_composite_elements_license_key");
		$oxygen_license_key = get_option("oxygen_license_key");

		$composite_license_status = get_option("oxygen_composite_elements_license_status");
		$oxygen_license_status = get_option("oxygen_license_status");

		if (!$composite_license_key && !$oxygen_license_key) {
			return array();
		}

		if ($composite_license_status!=='valid' && !$oxygen_license_key) {
			return array();
		}

		if ($composite_license_status!=='valid' && !oxygen_vsb_is_composite_elements_agency_bundle()) {
			return array();
		}

		// only ping server license check if local checks are OK
		$args = array(
			'headers' => array(
				'oxygenclientversion' => '3.7rc1',
				'compositeelementslicensekey' => $composite_license_key,
				'oxygenlicensekey' => $oxygen_license_key,
				'compositeelementssiteurl' => OxygenCompositeElementsPluginUpdater::clean_site_url(home_url()),
				'auth' => md5($access_key)
			),
			'timeout' => 30,
		);

		$response = wp_remote_request( $desgin_url . '/wp-json/oxygen-vsb-connection/v1/items', $args );
		$status   = wp_remote_retrieve_response_code( $response );

		if ( is_wp_error( $response ) ) {
			return array(
				'error' => $response->get_error_message(),
			);
		} 
		else if ( $status !== 200 ) {
			return array(
				'error' => wp_remote_retrieve_response_message( $response ),
			);
		}

		if ( is_array( $response ) && isset( $response['body'] ) ) {
			$elements = json_decode( $response['body'] );
			return $elements;
		}

		return array();
	}
}


function run_oxygen_composite_elements() {

	if (defined('SHOW_CT_BUILDER') && !defined('OXYGEN_IFRAME')) {
		$OxygenCompositeElements = new OxygenCompositeElements();
	}
}
add_action('init', "run_oxygen_composite_elements");