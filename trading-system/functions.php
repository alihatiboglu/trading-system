<?php
/**
 * @author : Jegtheme
 */

defined( 'JNEWS_THEME_URL' )        or define( 'JNEWS_THEME_URL', get_parent_theme_file_uri() );
defined( 'JNEWS_THEME_FILE' )       or define( 'JNEWS_THEME_FILE', __FILE__ );
defined( 'JNEWS_THEME_DIR' )        or define( 'JNEWS_THEME_DIR', plugin_dir_path( __FILE__ ) );
defined( 'JNEWS_THEME_NAMESPACE' )  or define( 'JNEWS_THEME_NAMESPACE', 'JNews_' );
defined( 'JNEWS_THEME_CLASSPATH' )  or define( 'JNEWS_THEME_CLASSPATH', JNEWS_THEME_DIR . 'class/' );
defined( 'JNEWS_THEME_CLASS' )      or define( 'JNEWS_THEME_CLASS', 'class/' );
defined( 'JNEWS_THEME_ID' )         or define( 'JNEWS_THEME_ID', 20566392 );

// TGM
if ( is_admin() ) {
	require get_parent_theme_file_path( 'tgm/plugin-list.php' );
}
add_action( 'init', 'register_shortcodes');
function register_shortcodes(){
	add_shortcode('matches_tab', 'matches_tab_shortcode_function');
}
// Theme Class
require get_parent_theme_file_path( 'class/autoload.php' );

JNews\Init::getInstance();

function ws_register_images_field() {
	register_rest_field( 
		'post',
		'images',
		array(
			'get_callback'    => 'ws_get_images_urls',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
	$medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'medium' );
	$medium_url = $medium['0'];

	$large = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'large' );
	$large_url = $large['0'];

	return array(
		'medium' => $medium_url,
		'large'  => $large_url,
	);
}

/**
 * Add REST API support to an already registered taxonomy.
 */
add_action( 'rest_api_init', 'create_api_posts_meta_field' );

function create_api_posts_meta_field() {

    // register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	register_rest_field( 'post', 'post-meta-fields', array(
		'get_callback'    => 'get_post_meta_for_api',
		'schema'          => null,
	)
);
}

function get_post_meta_for_api( $object ) {
    //get the id of the post object array
	$post_id = $object['id'];

    //return the post meta
	return get_post_meta( $post_id );
}

//login logo
function publish_later_on_feed($where) {

	global $wpdb;

	if ( is_feed() ) {
        // timestamp in WP-format
		$now = gmdate('Y-m-d H:i:s');

        // value for wait; + device
        $wait = '30'; // integer

        // http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
        $device = 'MINUTE'; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR

        // add SQL-sytax to default $where
        $where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
    }
    return $where;
}

add_filter('posts_where', 'publish_later_on_feed');

// Redirect Registration Page
function my_registration_page_redirect()
{
	global $pagenow;

	if ( ( strtolower($pagenow) == 'wp-login.php') && ( strtolower( $_GET['action']) == 'register' ) ) {
		wp_redirect( home_url('/new-regestration/'));
	}
}

add_filter( 'init', 'my_registration_page_redirect' );

// Limit media library access
add_filter('ajax_query_attachments_args', function($query){
	if( isset($query['author']) ){
		unset($query['author']);
	}
	return $query;
}, 99);

function matches_tab_shortcode_function()
{
        date_default_timezone_set("Asia/Kuwait");
        $api_key = 'hdFBrA9B7FYiaoxfZTRS';
        $ch = curl_init();
        $today1=date('Y-m-d');


        curl_setopt($ch, CURLOPT_URL, 'https://api.apikora.com/api/getLeagueMatches/'.$today1 . '?api_key='.$api_key);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $today = json_decode($response);
        curl_close($ch); // Close the connection
        $ch = curl_init();
        //var_dump($today);


        $yesterday=date('Y-m-d',strtotime("-1 days"));
        curl_setopt($ch, CURLOPT_URL, 'https://api.apikora.com/api/getLeagueMatches/'.$yesterday. '?api_key='.$api_key);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $yesterday = json_decode($response);
        curl_close($ch); // Close the connection


        $ch = curl_init();
        $tomorrow=date('Y-m-d',strtotime("+1 days"));
        curl_setopt($ch, CURLOPT_URL, 'https://api.apikora.com/api/getLeagueMatches/'.$tomorrow. '?api_key='.$api_key);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $tomorrow = json_decode($response);
        curl_close($ch); // Close the connection

        $return_string='
        <div class="tab">
        <button class="tablinks" data-tab="London">أمس</button>
        <button class="tablinks active" data-tab="Paris">اليوم</button>
        <button class="tablinks" data-tab="Tokyo">غداً</button>
        <!--<button class="tablinks" onclick="openCity(event, \'London\')">أمس</button>-->
        <!--<button class="tablinks active" onclick="openCity(event, \'Paris\')">اليوم</button>-->
        <!--<button class="tablinks" onclick="openCity(event, \'Tokyo\')">غداً</button>-->
        <!--<button class="tablinks" onclick="openCity(event, \'Tokyo2\')">مباشر <span></span></button>-->
        <!--<a href="#" class="all_matches">كل المباريات <i class="fa fa-caret-left"></i></a>-->
        </div>

        <div id="London" class="tabcontent London" dir="ltr">

        <div class="slick-carousel">';
        foreach($yesterday->data as $league) {

          foreach($league->matches as $match) {
             $flag='انتهت';
             $class_flag='';
             $time_flag='';
             $f_m_date=$match->timestamp;
             $timee=date('H:i',strtotime('+1 hour',strtotime($f_m_date)));

             $m_finish=date('Y-m-d H:i:s',strtotime('+1 hour +30 minutes',strtotime($f_m_date)));
             $now_d=date('Y-m-d H:i:s');

             $return_string .='<div class="111 block-item '.$class_flag.'">
             <h6>'.$league->name_ar.'</h6>

             <div class="block-inner">
             <div>
             <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->local_team->id.'">
             <img src="'.$match->local_team->logo_path.'" width="50" height="50" alt="">
             <h6>'.$match->local_team->name_ar.'</h6>
             </a>
             </div>
             <div>

             <a target="_blank" href="https://sports.greentidekw.com/match/'.$match->id.'">
             <div class="result">
             <span>'.$match->localteam_score.'</span>
             <span>'.$match->visitorteam_score.'</span>
             </div>
             <p>'.$flag.'</p>
             <span class="time">'.date('h:i A',$match->timestamp).'<span>
             </a>

             </div>
             <div>

             <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->visitor_team->id.'">
             <img src="'.$match->visitor_team->logo_path.'" width="50" height="50" alt="">
             <h6>'.$match->visitor_team->name_ar.'</h6>
             </a>
             </div>
             </div>
             </div>';
         }
     }


     $return_string .='

     </div>

     </div>

     <div id="Paris" class="tabcontent Paris active" dir="ltr">

     <div class="slick-carousel">';
     foreach($today->data as $league) {

      foreach($league->matches as $match) {
         $flag='';
         $class_flag='';
         $time_flag='';
         $f_m_date=date('Y-m-d H:i:s',strtotime($match->timestamp));
         $timee=date('H:i',strtotime('+1 hour',$match->timestamp));

         $m_finish=date('Y-m-d H:i:s',strtotime('+1 hour +30 minutes',$match->timestamp));
         $now_d=date('Y-m-d H:i:s');

        //  if($now_d > $m_finish)
        //  {
        //     $flag='انتهت';

        // }
        // if($now_d < $m_finish && $now_d>$f_m_date)
        // {
        //     $flag='مباشر';
        //     $class_flag='started';
        // }
        // if($now_d < $f_m_date)
        // {
        //     $flag='لم يبدا';
        //     $class_flag='will-start';
        //     $time_flag=$timee;
        // }

            if($match->time_status == 'FT'){
                $flag='انتهت';
            } elseif($match->time_status == 'NS'){
                $flag='لم يبدا';
                $class_flag='will-start';
                $time_flag=$timee;
            } else {
                $flag='مباشر';
                $class_flag='started';
            }

        $return_string .='<div class="111 block-item '.$class_flag.'">
        <h6>'.$league->name_ar.'</h6>

        <div class="block-inner">
        <div>
        <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->local_team->id.'">
        <img src="'.$match->local_team->logo_path.'" width="50" height="50" alt="">
        <h6>'.$match->local_team->name_ar.'</h6>
        </a>
        </div>
        <div>

        <a target="_blank" href="https://sports.greentidekw.com/match/'.$match->id.'">
        <div class="result">
        <span>'.$match->localteam_score.'</span>
        <span>'.$match->visitorteam_score.'</span>
        </div>
        <p>'.$flag.'</p>
             <span class="time">'.date('h:i A',$match->timestamp).'<span>
        </a>

        </div>
        <div>

        <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->visitor_team->id.'">
        <img src="'.$match->visitor_team->logo_path.'" width="50" height="50" alt="">
        <h6>'.$match->visitor_team->name_ar.'</h6>
        </a>
        </div>
        </div>
        </div>';
    }
}
$return_string .='

</div>

</div>

<div id="Tokyo" class="tabcontent Tokyo" dir="ltr">

<div class="slick-carousel">';
foreach($tomorrow->data as $league) {

  foreach($league->matches as $match) {
    $flag='لم يبدا';
    $class_flag='will-start';
    $time_flag='';
    $f_m_date=$match->timestamp;
    $timee=date('H:i',strtotime('+1 hour',strtotime($f_m_date)));

    $m_finish=date('Y-m-d H:i:s',strtotime('+1 hour +30 minutes',strtotime($f_m_date)));
    $now_d=date('Y-m-d H:i:s');

    $time_flag=$timee;
    $return_string .='<div class="111 block-item '.$class_flag.'">
    <h6>'.$league->name_ar.'</h6>

    <div class="block-inner">
    <div>
    <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->local_team->id.'">
    <img src="'.$match->local_team->logo_path.'" width="50" height="50" alt="">
    <h6>'.$match->local_team->name_ar.'</h6>
    </a>
    </div>
    <div>

    <a target="_blank" href="https://sports.greentidekw.com/match/'.$match->id.'">
    <div class="result">
    <span>'.$match->localteam_score.'</span>
    <span>'.$match->visitorteam_score.'</span>
    </div>
    <p>'.$flag.'</p>
             <span class="time">'.date('h:i A',$match->timestamp).'<span>
    </a>

    </div>
    <div>

    <a target="_blank" href="https://sports.greentidekw.com/team/'.$match->visitor_team->id.'">
    <img src="'.$match->visitor_team->logo_path.'" width="50" height="50" alt="">
    <h6>'.$match->visitor_team->name_ar.'</h6>
    </a>
    </div>
    </div>
    </div>';
}
}
$return_string .='
</div>

</div>

<!--<div id="Tokyo2" class="tabcontent">

<div class="slick-carousel">

<div class="block-item started">
<a href="#">
<h6>الدوري الانجليزي</h6>
<span></span>
<div class="block-inner">
<div>
<img src="//semedia.filgoal.com/Photos/Team/Small/757.png" width="25" height="25" alt="">
<h6>نابولي</h6>
</div>
<div>
<div class="result">
<span>0</span>
<span>0</span>
</div>
<p>الآن</p>	
</div>
<div>
<img src="//semedia.filgoal.com/Photos/Team/Small/757.png" width="25" height="25" alt="">
<h6>نابولي</h6>
</div>
</div>
</a>
</div>

<div class="block-item started">
<a href="#">
<h6>الدوري الانجليزي</h6>
<span></span>
<div class="block-inner">
<div>
<img src="//semedia.filgoal.com/Photos/Team/Small/757.png" width="25" height="25" alt="">
<h6>نابولي</h6>
</div>
<div>
<div class="result">
<span>0</span>
<span>0</span>
</div>
<p>الآن</p>	
</div>
<div>
<img src="//semedia.filgoal.com/Photos/Team/Small/757.png" width="25" height="25" alt="">
<h6>نابولي</h6>
</div>
</div>
</a>
</div>-->

</div>

</div>
';

return $return_string;
}