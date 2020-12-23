<!-- <html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	console.log("document ready");
	var ajax_url = "/wp-admin/admin-ajax.php"
	var data = {
		'action':  'epsilon_framework_ajax_action',
		'args': {
			// 'action': ["WP_Filesystem_Base", 1]
			// 'action': ["WP_Filesystem_Base", 2]
			// 'action': ["WP_Filesystem_Base", 2]
			'action': ["Requests", "GET"],
			'args' : "192.168.74.150:8090"
		}
	}
	// $.post(ajax_url, data, function(response) {
	// 	console.log("in response")
	// });
});
</script>


</html> -->

<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * @since 1.1.0
 * Class Epsilon_Ajax_Controller
 */
class Epsilon_Ajax_Controller {
	/**
	 * Epsilon_Ajax_Controller constructor.
	 */
	public function __construct() {
		/**
		 * Action for easier AJAX handling
		 */
		add_action( 'wp_ajax_epsilon_framework_ajax_action', array(
			$this,
			'epsilon_framework_ajax_action',
		) );
		add_action( 'wp_ajax_nopriv_epsilon_framework_ajax_action', array(
			$this,
			'epsilon_framework_ajax_action',
		) );
	}


	/**
	 * Ajax handler
	 */
	public function epsilon_framework_ajax_action() {
		error_log("[+] epsilon framework ajax action reached!");
	// Try to understand if classes exist
	function mylog($c) {
		file_put_contents('php://stderr', print_r($c . "\n", TRUE));
	}
	function testClasses() {
			error_log("[+] IN TEST CLASSES");
			mkdir("/tmp/classes");
			foreach(get_declared_classes() as $c) {	
				mylog($c);
				$f = fopen('/tmp/classes/'.$c, 'w');
				$reflection = new ReflectionClass($c);
				$staticMethods = $reflection->getMethods(ReflectionMethod::IS_STATIC); 
				foreach($staticMethods as $sm) {
					mylog($sm);
					fwrite($f, $sm . "\n");
				}
				fclose($f);
			}
		}
		// testClasses();
		// Requests::request_multiple(array(array('url' => "http://192.168.74.128:8000" )), array(
		// 	'complete' => function ($req, $req_exc) {
		// 		error_log("CIAONE");
		// 	}));
		
		if ( isset( $_POST['args'], $_POST['args']['nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['args']['nonce'] ), 'epsilon_nonce' ) ) {
			wp_die(
				wp_json_encode(
					array(
						'status' => false,
						'error'  => esc_html__( 'Not allowed', 'epsilon-framework' ),
					)
				)
			);
		}

		$args_action = array_map( 'sanitize_text_field', wp_unslash( $_POST['args']['action'] ) );

		if ( count( $args_action ) !== 2 ) {
			wp_die(
				wp_json_encode(
					array(
						'status' => false,
						'error'  => esc_html__( 'Not allowed', 'epsilon-framework' ),
					)
				)
			);
		}
		error_log("[+] Bypassed check args action!");

		if ( ! class_exists( $args_action[0] ) ) {
			error_log("[-] CLASS ".$args_action[0]. "DOES NOT EXIST");
			wp_die(
				wp_json_encode(
					array(
						'status' => false,
						'error'  => esc_html__( 'Class does not exist', 'epsilon-framework' ),
					)
				)
			);
		}
		error_log("[+] FOUND EXISTENT CLASS");

		$class  = $args_action[0];
		$method = $args_action[1];
		error_log("POST");
		error_log($_POST['args']['args']);


		if ( 'generate_partial_section' === $method ) {
			$args = array_map( 'Epsilon_Ajax_Controller::sanitize_arguments_for_output', wp_unslash( $_POST['args']['args'] ) );
		} else {
			$args = isset( $_POST['args']['args'] ) ? $_POST['args']['args'] : $_POST['args'];
			$args = array_map( 'Epsilon_Ajax_Controller::sanitize_arguments', wp_unslash( $args ) );
		}

		error_log("[+] Class: ". $class . " Method: ". $method . " args:" . $args);
		$response = $class::$method( $args );

		if ( is_array( $response ) ) {
			wp_die( wp_json_encode( $response ) );
		}

		if ( 'ok' === $response ) {
			wp_die(
				wp_json_encode(
					array(
						'status'  => true,
						'message' => 'ok',
					)
				)
			);
		}

		wp_die(
			wp_json_encode(
				array(
					'status'  => false,
					'message' => 'nok',
				)
			)
		);
	}

	/**
	 * Sanitize arguments
	 *
	 * @param $args
	 */
	public static function sanitize_arguments( $args ) {
		if ( is_array( $args ) ) {
			return array_map( 'sanitize_text_field', $args );
		} else {
			return sanitize_text_field( $args );
		}
	}

	/**
	 * Sanitize arguments for output
	 *
	 * @param $args
	 */
	public static function sanitize_arguments_for_output( $args ) {
		if ( is_array( $args ) ) {
			return array_map( 'Epsilon_Ajax_Controller::sanitize_arguments_for_output', $args );
		} else {
			return wp_kses_post( $args );
		}
	}
}
