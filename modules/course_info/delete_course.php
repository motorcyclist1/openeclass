<?php
$require_current_course = TRUE;
$langFiles = 'course_info';
$require_prof = true;
include '../../include/baseTheme.php';

$nameTools = $langDelCourse;

$tool_content = "";

if($is_adminOfCourse) {
	if(isset($delete)) {
		
		
		mysql_select_db("$mysqlMainDb",$db); 
		mysql_query("DROP DATABASE `$currentCourseID`");
		mysql_query("DELETE FROM `$mysqlMainDb`.cours WHERE code='$currentCourseID'");
		mysql_query("DELETE FROM `$mysqlMainDb`.cours_user WHERE code_cours='$currentCourseID'");
		mysql_query("DELETE FROM `$mysqlMainDb`.cours_faculte WHERE code='$currentCourseID'");
		mysql_query("DELETE FROM `$mysqlMainDb`.annonces WHERE code_cours='$currentCourseID'");
		##[BEGIN personalisation modification]############
		mysql_query("DELETE FROM `$mysqlMainDb`.agenda WHERE lesson_code='$currentCourseID'");
		##[END personalisation modification]############
		@mkdir("../../courses/garbage");
		rename("../../courses/$currentCourseID", "../../courses/garbage/$currentCourseID");
		
		$tool_content .= "<table width=\"99%\">
				<tbody>
					<tr>
						<td class=\"success\">
							<p><b>$langCourse $currentCourseID $intitule $langHasDel</b></p>
							
							<p><a href=\"../../index.php\">".$langBackHome." ".$siteName."</a></p>
						</td>
					</tr>
				</tbody>
			</table>";
		
		draw($tool_content, 1);

		exit();
	} else {
		$tool_content .= "<table width=\"99%\">
				<tbody>
					<tr>
						<td class=\"caution\">
							<p><b>$langConfirmDel</b></p>
							
							<p>$langByDel $currentCourseID $intitule&nbsp;? <a href=\"".$_SERVER['PHP_SELF']."?delete=yes\">$langYes</a>&nbsp;|&nbsp;<a href=\"infocours.php\">$langNo</a></p>
				<p><a href=\"infocours.php\">$langBack</p>
						</td>
					</tr>
				</tbody>
			</table>";
//		$tool_content .= "<table width=\"99%\"><caption>$langConfirmDel</caption><tbody><tr><td><p>$langByDel $currentCourseID $intitule&nbsp;?</p><p><a href=\"".$_SERVER['PHP_SELF']."?delete=yes\">$langY</a>&nbsp;|&nbsp;<a href=\"infocours.php\">$langN</a></p></td></tr></tbody></table><br>";
//		$tool_content .= "<center><p><a href=\"infocours.php\">$langBack</p></center>";
	} // else
} else  {
	$tool_content .= "<center><p>$langForbidden</p></center>";
}

draw($tool_content, 2, 'course_info');

?>
