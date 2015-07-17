<?php
/* ========================================================================
 * Open eClass 3.0
* E-learning and Course Management System
* ========================================================================
* Copyright 2003-2014  Greek Universities Network - GUnet
* A full copyright notice can be read in "/info/copyright.txt".
* For a full list of contributors, see "credits.txt".
*
* Open eClass is an open platform distributed in the hope that it will
* be useful (without any warranty), under the terms of the GNU (General
		* Public License) as published by the Free Software Foundation.
* The full license can be read in "/info/license/license_gpl.txt".
*
* Contact address: GUnet Asynchronous eLearning Group,
*                  Network Operations Center, University of Athens,
*                  Panepistimiopolis Ilissia, 15784, Athens, Greece
*                  e-mail: info@openeclass.org
* ======================================================================== */

$require_current_course = TRUE;

require_once '../../include/baseTheme.php';
require_once 'modules/wall/wall_functions.php';

$head_content .= '<link rel="stylesheet" type="text/css" href="css/wall.css">';

load_js('waypoints-infinite');

$posts_per_page = 5;

//handle submit
if (isset($_POST['submit'])) {
    if ($is_editor || allow_to_post($course_id, $uid)) {
        if ($_POST['type'] == 'text') {
            if (!empty($_POST['message'])) {
                Database::get()->query("INSERT INTO wall_post (course_id, user_id, content, timestamp) VALUES (?d,?d,?s,UNIX_TIMESTAMP())",
                    $course_id, $uid, links_autodetection($_POST['message']));
                Session::Messages($langWallPostSaved, 'alert-success');
            } else {
                Session::Messages($langWallMessageEmpty);
            }
        } elseif ($_POST['type'] == 'video') {
            if (empty($_POST['video'])) {
                if (!empty($_POST['message'])) {
                    Session::flash('content', $_POST['message']);
                }
                Session::flash('type', 'video');
                Session::Messages($langWallVideoLinkEmpty);
            } elseif (validate_youtube_link($_POST['video']) === FALSE) {
                if (!empty($_POST['message'])) {
                    Session::flash('content', $_POST['message']);
                }
                Session::flash('type', 'video');
                Session::flash('video_link', $_POST['video']);
                Session::Messages($langWallVideoLinkNotValid);
            } else {
                if (empty($_POST['message'])) {
                    $content = '';
                } else {
                    $content = links_autodetection($_POST['message']);
                }
                Database::get()->query("INSERT INTO wall_post (course_id, user_id, content, video_link, timestamp) VALUES (?d,?d,?s,?s, UNIX_TIMESTAMP())",
                    $course_id, $uid, $content, $_POST['video']);
                Session::Messages($langWallPostSaved, 'alert-success');
            }
        }
        redirect_to_home_page("modules/wall/index.php?course=$course_code");
    }
}

//show post form
if ($is_editor || allow_to_post($course_id, $uid)) {
    if (Session::has('type') && Session::get('type') == 'video') {
        $jquery_string = "$('#type_input').val('video');";
    } else {
        $jquery_string = "$('#hidden_input').hide();";
    }
    
    $head_content .= "<script>
                          $(function() {
                              $jquery_string
                              $('#type_input').change(function(){
                                  if($('#type_input').val() == 'video') {
                                      $('#hidden_input').show(); 
                                  } else {
                                      $('#hidden_input').hide(); 
                                  } 
                              });
                          });
            
                          $(function() {
                              $('#wall_form').submit(function() {
                                  if($('#type_input').val() != 'video') {
                                      $('#video_link').remove();
                                  }
                              });
                          })
                      </script>";
    
    $content = Session::has('content')? Session::get('content'): '';
    $video_link = Session::has('video_link')? Session::get('video_link'): '';
    
    $tool_content .= '<div class="row">
        <div class="col-sm-12">
            <div class="form-wrapper">
                <form id="wall_form" method="post" action="" enctype="multipart/form-data">
                    <fieldset> 
                        <div class="form-group">
                            <label for="message_input">'.$langMessage.'</label>
                            <textarea class="form-control" rows="6" name="message" id="message_input">'.$content.'</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type_input">'.$langType.'</label>
                            <select class="form-control" name="type" id="type_input">
                                <option value="text">'.$langWallText.'</option>
                                <option value="video">'.$langWallVideo.'</option>
                            </select>
                        </div>
                        <div class="form-group" id="hidden_input">
                            <label for="video_link">'.$langWallVideoLink.'</label>
                            <input class="form-control" type="url" name="video" id="video_link" value="'.$video_link.'">
                        </div>                
                    </fieldset>
                    <div class="form-group">'.
                        form_buttons(array(
                            array(
                                'text'  =>  $langSubmit,
                                'name'  =>  'submit',
                                'value' =>  $langSubmit
                            )
                        ))
                  .'</div>        
                </form>
            </div>
        </div>
    </div>';
}

//show wall posts
$posts = Database::get()->queryArray("SELECT id, user_id, content, video_link, FROM_UNIXTIME(timestamp) as datetime, pinned  FROM wall_post WHERE course_id = ?d ORDER BY timestamp DESC LIMIT ?d", $course_id, $posts_per_page);
if (count($posts) == 0) {
    $tool_content .= '<div class="alert alert-warning">'.$langNoWallPosts.'</div>';
} else {
    $tool_content .= '<div class="infinite-container">';
    foreach ($posts as $post) {
        $user_id = $post->user_id;
        $id = $post->id;
        $content = $post->content;
        $pinned = $post->pinned;
        $token = token_generate($user_id, true);
        $datetime = nice_format($post->datetime, true);
        if ($post->video_link == '') {
            $shared = $langWallSharedPost;
        } else {
            $shared = $langWallSharedVideo;
        }
        
        $tool_content .= '<div class="infinite-item">';
        
        $tool_content .= '<div class="row margin-right-thin margin-left-thin margin-top-thin">
                              <div class="col-sm-12">
                                  <div class="media">
                                      <a class="media-left" href="'.$urlServer.'main/profile/display_profile.php?id='.$user_id.'&amp;token='.$token.'">
                                        '. profile_image($user_id, IMAGESIZE_SMALL) .'
                                      </a>
                                      <div class="media-body bubble">
                                          <div class="label label-success media-heading">'.$datetime.'</div>
                                          <small>'.$langWallUser.display_user($user_id, false, false).$shared.'</small>    
                                          <div class="margin-top-thin">
                                              '.standard_text_escape($content).'
                                          </div>
                                      </div>    
                                  </div>
                              </div>
                          </div>';
        
        $tool_content .= '</div>';
    }
    $tool_content .= '</div>';
    if (count($posts) == $posts_per_page) {
        $tool_content .= '<a class="infinite-more-link" href="loadMore.php?course='.$course_code.'&amp;page=2">'.$langMore.'</a>';
    }
    
    $tool_content .= '<script>
                          var infinite = new Waypoint.Infinite({
                              element: $(".infinite-container")[0]
                          })
                      </script>';
}


draw($tool_content, 2, null, $head_content);
