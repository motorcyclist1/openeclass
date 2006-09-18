<?php
/*
      +----------------------------------------------------------------------+
      | CLAROLINE version 1.3.0 $Revision$                            |
      +----------------------------------------------------------------------+
      | Copyright (c) 2001, 2002 Universite catholique de Louvain (UCL)      |
      +----------------------------------------------------------------------+
      |   $Id$     |
      |   English Translation                                                |
      +----------------------------------------------------------------------+
      |   This program is free software; you can redistribute it and/or      |
      |   modify it under the terms of the GNU General Public License        |
      |   as published by the Free Software Foundation; either version 2     |
      |   of the License, or (at your option) any later version.             |
      |                                                                      |
      |   This program is distributed in the hope that it will be useful,    |
      |   but WITHOUT ANY WARRANTY; without even the implied warranty of     |
      |   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the      |
      |   GNU General Public License for more details.                       |
      |                                                                      |
      |   You should have received a copy of the GNU General Public License  |
      |   along with this program; if not, write to the Free Software        |
      |   Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA          |
      |   02111-1307, USA. The GNU GPL license is also available through     |
      |   the world-wide-web at http://www.gnu.org/copyleft/gpl.html         |
      +----------------------------------------------------------------------+
      | Authors: Thomas Depraetere <depraetere@ipm.ucl.ac.be>                |
      |          Hugues Peeters    <peeters@ipm.ucl.ac.be>                   |
      |          Christophe Gesch� <gesche@ipm.ucl.ac.be>                    |
      +----------------------------------------------------------------------+
      | Translator :                                                         |
      |          Thomas Depraetere <depraetere@ipm.ucl.ac.be>                |
      |          Andrew Lynn       <Andrew.Lynn@strath.ac.uk>                |
      +----------------------------------------------------------------------+
 */
// create_course.php
$langLn="Language";
$langLogin = "Login";

$langCreateSite="Create a course website";
$langCreate = "Create course";
$langFieldsRequ="All fields required";
$langFieldsOptional = "Optional fields";
$langFieldsOptionalNote = "note: you can change anything you wish later";
$langTitle="Course title";
$langDescrInfo='Brief course description (displayed on courses list)';
$langEx="e.g. <i>History of Literature</i>";
$langFac="Category";
$langDivision = "Division";
$langDescription = "Description";
$langTargetFac="This is the faculty, department or school where the course is delivered";
$langCode="Course code";
$langMax="max. 12 characters, e.g. <i>ROM2121</i>";
$langDoubt="If you doubt on your course's code, consult, ";
$langProfessors="Professor(s)";
$langExplanation="Once you click OK, a site with Forum, Agenda, Document manager etc. will be created. Your login, as creator of the site, allows you to modify it along your own requirements.";
$langExFac = "If you wish to create course, in another faculty, then contact Asynchronous Teleteaching Team";
$langEmpty="You left some fields empty.<br>Use the <b>Back</b> button on your browser and try again.<br>";
$langCodeTaken="This course code is already taken.  <br>Use the <b>Back</b> button on your browser and try again";


// tables MySQL
$langFormula="Yours sincerely, your professor";
$langForumLanguage="english";	// other possibilities are english, spanish (this uses phpbb language functions)
$langTestForum="Test forum";
$langDelAdmin="Remove this through the forum admin tool";
$langMessage="When you remove the test forum, it will remove all messages in that forum too.";
$langExMessage="Example message";
$langAnonymous="Anonymous";
$langExerciceEx="Sample exercise";
$langAntique="History of Ancient Philosophy";
$langSocraticIrony="Socratic irony is...";
$langManyAnswers="(more than one answer can be true)";
$langRidiculise="Ridiculise one\'s interlocutor in order to have him concede he is wrong.";
$langNoPsychology="No. Socratic irony is not a matter of psychology, it concerns argumentation.";
$langAdmitError="Admit one\'s own errors to invite one\'s interlocutor to do the same.";
$langNoSeduction="No. Socratic irony is not a seduction strategy or a method based on the example.";
$langForce="Compell one\'s interlocutor, by a series of questions and sub-questions, to admit he doesn\'t know what he claims to know.";
$langIndeed="Indeed. Socratic irony is an interrogative method. The Greek \"eirotao\" means \"ask questions\"";
$langContradiction="Use the Principle of Non Contradiction to force one\'s interlocutor into a dead end.";
$langNotFalse="This answer is not false. It is true that the revelation of the interlocutor\'s ignorance means showing the contradictory conclusions where lead his premisses.";



// Home Page MySQL Table "accueil"
$langAgenda="Agenda";
$langLinks="Links";
$langDoc="Documents";
$langVideo="Video";
$langVideoLinks="Video Links";
$langWorks="Student Papers";
$langCourseProgram="Course program";
$langAnnouncements="Announcements";
$langUsers="Users";
$langForums="Forums";
$langExercices="Exercices";
$langStatistics="Statistics";
$langAddPageHome="Upload Webpage";
$langLinkSite="Add link on Homepage";
$langModifyInfo="Lesson Admin";
$langConference ="Tele cooperation";
$langDropBox = "DropBox";
$langLearnPath = "Learning Path";
$langToolManagement = "Tool management";
$langUsage ="Usage statistics";
$langGroups="Groups";


// Other SQL tables
$langVideoText="This is an example of a RealVideo file. You can upload any audio and video file type (.mov, .rm, .mpeg...), as far as your students have the corresponding plug-in to read them";
$langGoogle="Quick and powerfull search engine";
$langIntroductionText="This is the introduction text of your course. To replace it by your own text, click below on <b>modify</b>.";
$langIntroductionTwo="This page allows any student or group to upload a document on the course\'s website. Send HTML file only if it contains no image.";
$langQuestionnaire = "Questionnaire";
$langCourseDescription="Write here the description that will appear in the course list.";
$langProfessor="Professor";
$langAnnouncementEx="This is an example of announcement. Only the profesor and other administrators of the course can publish announcements.";
$langJustCreated="You just created the course website";
$langEnter="Back to my courses list";
$langCourseDesc = "Course description";
 // Groups
$langCreateCourseGroups="Groups";
$langCatagoryMain="Main";
$langCatagoryGroup="Groups forums";
$langChat ="Tele cooperation";

//neos odhgos dhmiourgias mathimaton
$langEnterMetadata="You can enter additional information about your course from the course management page";
$langCreateCourse="Create new course wizard";
$langCreateCourseStep="Step";
$langCreateCourseStep2="from";
$langCreateCourseStep1Title="Basic information about the course";
$langCreateCourseStep2Title="Additional information about the course";
$langCreateCourseStep3Title="System options about the course";
$langcourse_objectives="Course objectives";
$langCoursePrereq="Prerequisite knowledge";
$langFieldsRequAsterisk="<font face=\"arial, helvetica\" color=\"#FF0000\" size=\"5\">*</font>";
$langNextStep="Next Step";
$langPreviousStep="Previous Step";
$langFinalize="Create Course!";
$langCourseCategory="The category the course belongs to";
$langProfessorsInfo="Full names of the instructors of the course; seperated by commas (e.g.<i>John Doe, George Smith</i>)";
$langCoursePrereqNote="<i>e.g.: Prerequisites are good knowledge and skills in Algebra</i>";

$langCourseKeywords = "Course Keywords:";
$langCourseAddon = "Add on Information:";

$langPublic="Open (Free access from the homepage without password)";
$langPrivOpen="Open by registration (You have to register in order to grant access)";
$langPrivate="Private (Access is granted only to students added in the Users List)";

$langAccess = "Choose your access type:";
$langAvailableTypes = "Available Access Types";
$langModules = "Modules:";

?>
