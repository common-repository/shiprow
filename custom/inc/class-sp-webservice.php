<?php
/**
 * This class is using for called the webservices
 */
class SpWebservice
{	
	
	//this for testing.. will remove this url and enable the 
	var $api_url = '';  
	/**it iws exactly like this
	 * [sp_call_api this function are using to callled webservice]
	 * @param  [type] $filename [it will be the filename like "google-location.php" ]
	 * @param  [type] $postdata [send all post data in here]
	 * @return [type]           [api response]
	 */
	public  function sp_call_api( $filename , $postdata= '' ){
		$api_url = $this->api_url.$filename;

		$args = array();
		$args['body'] = $postdata;
		$response = wp_remote_post( $api_url , $args );

		$return = array();
		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    $return['success'] = false;
		    $return['message'] = $error_message;
		} else {
		    // Response body.
			$body = wp_remote_retrieve_body( $response );
			$return['success'] = true;
			$return['data'] = json_decode( $body, true );
		}

		return $return; 
		
	}
}
$sp_webservice = new SpWebservice();
?>
