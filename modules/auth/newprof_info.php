<?php
/**=============================================================================
       	GUnet e-Class 2.0 
        E-learning and Course Management Program  
================================================================================
       	Copyright(c) 2003-2006  Greek Universities Network - GUnet
        � full copyright notice can be read in "/info/copyright.txt".
        
       	Authors:    Costas Tsibanis <k.tsibanis@noc.uoa.gr>
        	    Yannis Exidaridis <jexi@noc.uoa.gr> 
      		    Alexandros Diamantidis <adia@noc.uoa.gr> 

        For a full list of contributors, see "credits.txt".  
     
        This program is a free software under the terms of the GNU 
        (General Public License) as published by the Free Software 
        Foundation. See the GNU License for more details. 
        The full license can be read in "license.txt".
     
       	Contact address: GUnet Asynchronous Teleteaching Group, 
        Network Operations Center, University of Athens, 
        Panepistimiopolis Ilissia, 15784, Athens, Greece
        eMail: eclassadmin@gunet.gr
==============================================================================*/

/**===========================================================================
	newuser_info.php
	@last update: 27-06-2006 by Stratos Karatzidis
	@authors list: Karatzidis Stratos <kstratos@uom.gr>
		       Vagelis Pitsioygas <vagpits@uom.gr>
==============================================================================        
        @Description: Display all the available auth methods for user registration

 	Purpose: TDisplay all the available auth methods for user registration

==============================================================================
*/

$langFiles = array('registration', 'admin', 'gunet');
include '../../include/baseTheme.php';
// added by jexi - adia
session_register("prof");
$prof=1;
include 'auth.inc.php';

if(isset($already_second))
{
	session_register("uid");
	session_unregister("statut");
	session_unregister("prenom");
	session_unregister("nom");
	session_unregister("uname");
}
$nameTools = $regprof;


$tool_content = "";
// Main body
//$navigation[] = array ("url"=>"../admin/", "name"=> $admin);

$tool_content .= "<table width=\"99%\">
				<tr>
					<td>".$dearprof."<br /><br />
					<p>$langAuthenticateVia2:</p><br />";
					
					
						$auth = get_auth_active_methods();
						if(!empty($auth))
						{
							$tool_content .= "<ul>";
							$tool_content .= "<li><a href=\"newprof.php\">".$regprofnoldap."</a><br /></li>";
							foreach($auth as $k=>$v)
							{
								if($v==1)		// bypass the eclass auth method, as it has already been displayed
								{
									continue;
								}
								else
								{
								$auth_method_settings = get_auth_settings($v);
								$tool_content .= "<li><a href=\"ldapnewprof.php?auth=".$v."\">$langAuthenticateVia ".$auth_method_settings['auth_name']."</a>";
								if(!empty($auth_method_settings))
								{
									$tool_content .= "<br />".$auth_method_settings['auth_instructions'];
								}
								$tool_content .= "</li>";
								}
							//}
							}
							$tool_content .= "</ul>";
						}
						else
						{
							$tool_content .= "<br />� ������� ���� ���������, ���� �� ����� ��� �����������.<br />
							�����������, ���������� �� ����������� ��� ����������<br />";
						}

				$tool_content .= "<br /><br /></td>
				</tr>
			</table>";



draw($tool_content,0);

?>
