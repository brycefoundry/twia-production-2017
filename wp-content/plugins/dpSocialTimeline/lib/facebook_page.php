<?php

if(isset($_GET['debug']) && $_GET['debug'] ) {
	error_reporting(E_ALL ^ E_NOTICE);
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
}

if(empty($_GET['page_id'])) 
	die('The FB Page ID is required');
	
$screen_name_data = (isset($_GET['page_id']) ? $_GET['page_id'] : '');

$_GET['fb_count'] = (isset($_GET['count']) ? $_GET['count'] : '');;
unset($_GET['count']);
$count = (isset($_GET['fb_count']) ? $_GET['fb_count'] : '');

if($count == "" || $count <= 20) 
	$count = 20;

//Include Configuration
require_once (dirname (__FILE__) . '/../../../../wp-load.php');
global $dpSocialTimeline;

require_once( 'Facebook/facebook.php' );

$facebook = new FacebookGraphV2(array(
  'appId'  => $dpSocialTimeline['facebook_app_id'],
  'secret' => $dpSocialTimeline['facebook_app_secret'],
));

$fields = array('status_type', 'picture', 'object_id', 'source', 'link', 'message', 'description', 'id', 'from', 'created_time', 'type');

$response = $facebook->api('/'.$screen_name_data.'/posts', 'get', array('limit' => $count, 'fields' => $fields));
$graph_arr = $response['data'];
if(empty($response['data'])) {
	$response = $facebook->api('/'.$screen_name_data.'/feed', 'get', array('limit' => $count, 'fields' => $fields));
	$graph_arr = $response['data'];
}
/*
echo '<pre>';
print_r($graph_arr);
echo '</pre>';
*/
$count = 0;
$json_decoded = array();

$json_decoded['responseData']['feed']['link'] = "https://facebook.com/";
$json_decoded['responseData']['feed']['entries'] = array();

if(is_array($graph_arr)) {
	/*echo '<pre>';
	print_r($graph_arr);
	echo '</pre>';
	die();*/
	foreach($graph_arr as $data)
	{
		
		/*
		if($data['from']['name'] == "") {
			$post_data = $facebook->api('/'.$data['id'], 'get');
			$post_arr = $post_data;
			echo $data['id'];
			echo '<pre>';
			print_r($post_arr);
			echo '</pre>';
			die();
		}*/
		$picture = $data['picture'];
		
		if(!isset($data['object_id'])) {
			$pic_id = explode("_", $picture);	
			$data['object_id'] = $pic_id[1];
		}
		
		if($data['type'] == "link" && strpos($picture, 'hprofile') !== false) {
			$picture = "";
		} else {

			if(strpos($picture, 'safe_image.php') === false && is_numeric($data['object_id'])) {
				$picture = 'https://graph.facebook.com/'.$data['object_id'].'/picture?type=normal';
			}
			
		}
		
		if($data['message'] == '') {
			$data['message'] = $data['description'];	
		}
		
		if($data['source'] != '' && strpos($data['link'], 'facebook.com') !== false) {
			$data['message'] .= '<video width="480" height="320" controls="controls">
			<source src="'.str_replace(array('https://', 'http://'), 'nolinkVideo', $data['source']).'" type="video/mp4">
			</video>';	
			$picture = "";
		}
		if(substr($data['link'], 0, 8) == '/events/') {
			$data['link'] = "https://facebook.com".$data['link'];
			
			if(strpos($picture, 'safe_image.php') === false && is_numeric($data['object_id'])) {
				$picture = 'https://graph.facebook.com/'.$data['object_id'].'/picture?type=large';
			}
		}
		
		if($data['story'] != '') {
			$data['link'] = '';
			$data['message'] = $data['message'] == '' ? $data['story'] : $data['message'];
			$picture = $data['picture'];
		}
		

		if(($data['message'] == '' && $picture == '') || (is_numeric($_GET['fb_count']) && $count >= $_GET['fb_count'])) {

			continue;
		}
		
		
		/*$picture = str_replace(array("s130x130/", "p130x130/", "p118x90/"), '', $data['picture']);
		$picture = str_replace('/v/t1.0-0/', '/t1.0-0/', $picture);
		$picture = str_replace('/v/t1.0-9/', '/t1.0-9/', $picture);
		$picture = str_replace('/v/l/t1.0-0/', '/t1.0-0/', $picture);
		$picture = str_replace('/v/l/t1.0-9/', '/t1.0-9/', $picture);
		$picture = str_replace('/192x/', '/736x/', $picture);*/
		
		$json_decoded['responseData']['feed']['entries'][$count]['link'] = ($data['link'] != "" ? $data['link'] : "https://facebook.com/".$data['id']);
		$json_decoded['responseData']['feed']['entries'][$count]['contentSnippet'] = nl2br($data['message']);
		$json_decoded['responseData']['feed']['entries'][$count]['content'] = nl2br($data['message']);
		$json_decoded['responseData']['feed']['entries'][$count]['title'] = nl2br($data['message']);
		$json_decoded['responseData']['feed']['entries'][$count]['thumbnail'] = $picture;
		$json_decoded['responseData']['feed']['entries'][$count]['author'] = $data['from']['name'];
		$json_decoded['responseData']['feed']['entries'][$count]['publishedDate'] = date("D, d M Y H:i:s O", strtotime($data['created_time']));
		
		$count++;
	}
}

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($json_decoded);
?>