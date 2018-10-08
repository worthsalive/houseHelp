<?php ERROR_REPORTING(0); ?>


<?php
if(isset($_POST["install"]))
{
$server_name = $_POST["server_name"];
$username = $_POST["username"];
$password = $_POST["password"];
$site_url = $_POST["site_url"];
$db_name = "prison_db";


// Create connection
$conn = mysqli_connect($server_name, $username, $password)or die(mysqli_error($conn));

$connect_db = mysqli_connect("$server_name", "$username", "$password") or die(mysqli_error($conn));

// Create database
$sql = "CREATE DATABASE $db_name";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
mysqli_select_db($connect_db,"$db_name") or die(mysqli_error($conn));


//////////////////////////////////////////////////////////////


 mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `diseases` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `Disease_Name` varchar(120) NOT NULL,
  `image_src_1` varchar(100) NOT NULL,
  `image_src_2` varchar(100) NOT NULL,
  `image_src_3` varchar(100) NOT NULL,
  `Details` longtext NOT NULL,
  `Symptoms` longtext NOT NULL,
  `Causes` longtext NOT NULL,
  `Prevention` longtext NOT NULL,
  `Recomendation` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;")or die(mysqli_error($conn));



 mysqli_query($conn,"INSERT INTO `diseases` (`id`, `Disease_Name`, `image_src_1`, `image_src_2`, `image_src_3`, `Details`, `Symptoms`, `Causes`, `Prevention`, `Recomendation`) VALUES
(8, 'Breast Cancer', 'Final-Stage1.jpg', 'Signs-and-Symptoms-of-Breast-Cancer.jpg', 'depiction-of-breast-cancer.jpg', 'details to be updated latter by lordhackon', 'Symptoms of breast Cancer\r\n•	a lump or area of thickened tissue in either breast \r\n•	a change in the size or shape of one or both breasts \r\n•	discharge from either of your nipples (which may be streaked with blood) \r\n•	a lump or swelling in either of your armpits \r\n•	dimpling on the skin of your breasts \r\n      ', 'causes of breast cancer\r\n•	Getting older\r\n•	A history of breast cancer\r\n•	Having had certain types of breast lumps\r\n•	Dense breast tissue\r\n        ', 'Cure for breast cancer\r\n•	Surgery \r\n•	Radiation therapy \r\n•	Chemotherapy         ', 'Preventing breast cancer\r\n•	Avoid becoming overweight. Obesity raises the risk of breast cancer after menopause, the time of life when breast cancer most often occurs. Avoid gaining weight over time, and try to maintain a body-mass index under 25 (calculators can be found online).\r\n        '),
(9, 'Liver Cancer', 'livercancer01.jpg', '1.jpg', 'Figure 2 Liver Tumor Removed.jpg', 'brief details about Liver Cancer', 'Symptoms of Liver Cancer\r\n•	Weight loss (without trying)\r\n•	Loss of appetite\r\n•	Feeling very full after a small meal\r\n•	Nausea or vomiting\r\n•	An enlarged liver, felt as a mass under the ribs on the right side\r\n•	An enlarged spleen, felt as a mass under the ribs on the left side \r\n•	Pain in the abdomen or near the right shoulder blade\r\n•	Swelling or fluid build-up in the abdomen\r\n•	Itching\r\n•	Yellowing of the skin and eyes (jaundice)\r\n', 'Causes of liver cancer\r\n•	Body weight: Being overweight or obese increases the risk of liver cancer. Diabetes and non alcoholic fatty liver disease are more common in people who are overweight, so this may partly explain the link.\r\n•	Gallbladder removal: People who have their gallbladder removed (cholecystectomy) to get rid of gallstones may have an increased risk of liver cancer. The increased risk may be due to raised pressure in the bile duct causing long term inflammation in the liver tissue.\r\n•	Diabetes: People with diabetes have a higher risk of liver cancer than people who do not have diabetes. The higher risk may be due to the higher levels of insulin in people with diabetes or due to liver damage caused by the diabetes. The risk may be increased more in people who have other risk factors such as liver cirrhosis and hepatitis infection.\r\n', 'Preventing liver cancer\r\n•	drinking alcohol in moderation, or ideally not at all, to reduce your risk of cirrhosis (scarring of the liver) \r\n•	eating healthily and exercising regularly to reduce your risk of developing non-alcoholic fatty liver disease \r\n•	taking steps to lower your risk of becoming infected with hepatitis C and hepatitis B\r\n', 'Drugs for liver cancer\r\n•	Nexavar (Sorafenib Tosylate)\r\n•	Sorafenib Tosylate\r\n•	doxorubicin (Adriamycin)\r\n•	 5-fluorouracil\r\n•	 cisplatin.floxuridine (FUDR)\r\n•	cisplatin\r\n•	 mitomycin C \r\n'),
(10, 'Adrenal Cancer', 'pic_adrenalectomy.jpg', 'kidney_stage1_print.jpg', 'images.jpg', 'Details on Adrenal Cancer', 'Symptoms of adrenal cancer\r\n&bull;	High blood pressure \r\n&bull;	Weakness \r\n&bull;	Muscle cramps \r\n&bull;	Low blood potassium levels \r\n&bull;	High blood pressure\r\n&bull;	Low potassium level\r\n&bull;	Heart palpitations\r\n&bull;	Nervousness\r\n&bull;	Feelings of anxiety or panic attacks\r\n&bull;	Headache\r\n&bull;	Excessive perspiration\r\n&bull;	Diabetes\r\n&bull;	Abdominal pain\r\n&bull;	Unexplained weight gain or weight loss\r\n&bull;	Weakness\r\n', 'Causes of adrenal cancer\n•	Age: When diagnosed, adrenal cancer is usually seen in children or in adults around 40 to 50 years old.\n•	Family history: It is  not common, but adrenal cancer may be associated with certain genetic disorders, such as multiple endocrine neoplasia type 1, Li-Fraumeni syndrome, Beckwith-Wiedemann syndrome, and familial adenomatous polyposis. However, most cases of adrenal cancer occur in people with no family history of these diseases.\n•	Smoking: If you smoke, especially if you are a heavy smoker, you may be at an increased risk of developing adrenal cancer.\n', 'To be updated latter', 'Causes of adrenal cancer\r\n&bull;	Age: When diagnosed, adrenal cancer is usually seen in children or in adults around 40 to 50 years old.\r\n&bull;	Family history: It&#039;s not common, but adrenal cancer may be associated with certain genetic disorders, such as multiple endocrine neoplasia type 1, Li-Fraumeni syndrome, Beckwith-Wiedemann syndrome, and familial adenomatous polyposis. However, most cases of adrenal cancer occur in people with no family history of these diseases.\r\n&bull;	Smoking: If you smoke, especially if you&#039;re a heavy smoker, you may be at an increased risk of developing adrenal cancer.\r\n'),
(11, 'Lung Cancer', 'lung-cancer-diagram.jpg', 'Non-Small-cell-Lung-Cancer.jpg', 'c38.jpg', 'Details on Lung Cancer to be updated latter', 'Symptoms of lung cancer\r\n&bull;	A cough that does not go away or gets worse.\r\n&bull;	Chest pain that is often worse with deep breathing, coughing, or laughing.\r\n&bull;	Hoarseness.\r\n&bull;	Weight loss and loss of appetite.\r\n&bull;	Coughing up blood or rust-colored sputum (spit or phlegm)\r\n&bull;	Shortness of breath.\r\n&bull;	Feeling tired or weak.\r\n&bull;	Fatigue\r\n&bull;	Cough\r\n&bull;	Chest pain, if a tumor spreads to the lining of the lung or other parts of the body near the lungs\r\n&bull;	Coughing up phlegm or mucus\r\n', 'Causes of lung cancer\r\n&bull;	Smoking\r\nSmoking is, by far, the leading risk factor for lung cancer. Risk increases with both quantity and duration of smoking\r\n&bull;	Radon\r\nRadon is a naturally occuring, colorless, oderless gas. Exposure to radon is one of the leading risk factors for lung cancer, possibly contributing to 10% of all lung cancer cases.(6) The mechanism by which radon leads to cancer is still unclear. Laboratory studies with radon have shown cellular damage that appears comparable to the damage caused by tobacco smoke, suggesting a similar mechanism of action\r\n&bull;	Chronic Lung Diseases\r\nChronic lung diseases such as asbestosis (scarring of lung tissue caused by asbestos), asthma, chronic bronchitis, emphysema, pneumonia, and tuberculosis have been suggested to increase risk of lung cancer.(9) All of these diseases damage lung tissue and can result in scar tissue on the lungs.\r\n&bull;	Second-Hand Smoke\r\nExposure to second-hand smoke also greatly increases risk of lung cancer. In 2006, the Surgeon General released a report addressing the harmful effects of second-hand smoke on health\r\n', 'Preventing lung cancer\r\n&bull;	Stop smoking:  If you smoke, the best way to prevent lung cancer and other serious conditions is to stop smoking as soon as possible\r\n&bull;	Diet : Research suggests that eating a low-fat, high-fibre diet, including at least five portions a day of fresh fruit and vegetables and plenty of whole grains, can help reduce your risk of lung cancer, as well as other types of cancer and heart disease.\r\n&bull;	Exercise: There is strong evidence to suggest that regular exercise can lower the risk of developing lung cancer and other types of cancer. Adults should do at least 150 minutes (2 hours and 30 minutes) of moderate-intensity aerobic activity each week.\r\n\r\n', 'Drugs for lung cancer\r\n&bull;	Abitrexate (Methotrexate)\r\n&bull;	Doxorubicin Hydrochloride\r\n&bull;	Etopophos (Etoposide Phosphate)\r\n&bull;	Etoposide\r\n&bull;	Etoposide Phosphate\r\n&bull;	Folex (Methotrexate)\r\n&bull;	Folex PFS (Methotrexate)\r\n&bull;	Hycamtin (Topotecan Hydrochloride)\r\n&bull;	Mechlorethamine Hydrochloride\r\n&bull;	Methotrexate\r\n&bull;	Methotrexate LPF (Methotrexate)\r\n&bull;	Mexate (Methotrexate)\r\n&bull;	Mexate-AQ (Methotrexate)\r\n&bull;	Mustargen (Mechlorethamine Hydrochloride)\r\n&bull;	Toposar (Etoposide)\r\n&bull;	Topotecan Hydrochloride\r\n&bull;	VePesid (Etoposide)\r\n'),
(12, 'Kidney Cancer', 'rcc1.jpg', 'M1310620-Kidney_cancer-SPL.jpg', 'images.jpg', 'Details Kidney Cancer', 'Symptoms of kidney cancer\r\n&bull;	Blood in the urine\r\n&bull;	Pain or pressure in the side or back\r\n&bull;	A mass or lump in the side or back\r\n&bull;	Swelling of the ankles and legs\r\n&bull;	High blood pressure\r\n&bull;	Anemia, which is a low red blood cell count\r\n&bull;	Fatigue\r\n&bull;	Loss of appetite\r\n&bull;	Unexplained weight loss\r\n&bull;	Recurrent fever that is not from cold, flu, or other infection\r\n&bull;	For men, a rapid development of a cluster of enlarged veins, known as a varicocele, around a testicle\r\n', 'Causes of kidney cancer\r\n&bull;	Obesity: People who are obese have an increased risk of kidney cancer\r\n&bull;	Smoking: Cigarette smoking is a major risk factor. Cigarette smokers are twice as likely as nonsmokers to develop kidney cancer.\r\n&bull;	Gender: Males are more likely than females to be diagnosed with kidney cancer.\r\n&bull;	Occupation: Some people have a higher risk of getting kidney cancer because they come in contact with certain chemicals or substances in their workplace. Coke oven workers in the iron and steel industry are at risk. Workers exposed to asbestos or cadmium also may be at risk.\r\n&bull;	Long-term dialysis: Dialysis is a treatment for people whose kidneys do not work well, if at all. It removes wastes from the blood. Being on dialysis for many years is a risk factor for kidney cancer.\r\n&bull;	High blood pressure: High blood pressure increases the risk of kidney cancer.\r\n', 'Preventing kidney cancer\r\n&bull;	Quit smoking. If you smoke, quit. Many options for quitting exist, including support programs, medications and nicotine replacement products. Tell your doctor you want to quit, and discuss your options together. \r\n&bull;	Maintain a healthy weight. Work to maintain a healthy weight. If you&#039;re overweight or obese, reduce the number of calories you consume each day and try to exercise most days of the week. Ask your doctor about other healthy strategies to help you lose weight. \r\n&bull;	Control high blood pressure. Ask your doctor to check your blood pressure at your next appointment. If your blood pressure is high, you can discuss options for lowering your numbers. Lifestyle measures such as exercise, weight loss and diet changes can help. Some people may need to add medications to lower their blood pressure.\r\n', 'Cure for kidney cancer\r\n&bull;	Active surveillance\r\n&bull;	Surgery\r\n&bull;	Targeted therapy\r\n&bull;	Immunotherapy\r\n&bull;	Radiation therapy\r\n&bull;	Chemotherapy\r\n');")or die(mysqli_error($conn));



 mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `symptoms` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `symp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;")or die(mysqli_error($conn));


 mysqli_query($conn,"INSERT INTO `symptoms` (`id`, `symp`) VALUES
(1, 'A lump or area of thickened tissue in either breast'),
(2, 'A change in the size or shape of one or both breasts '),
(3, 'A lump or swelling in either of your armpits '),
(5, 'Weight loss (without trying)'),
(6, 'Loss of appetite'),
(7, 'Feeling very full after a small meal'),
(8, 'Nausea or vomiting'),
(9, 'An enlarged liver, felt as a mass under the ribs on the right side'),
(10, 'An enlarged spleen, felt as a mass under the ribs on the left side '),
(11, 'Pain in the abdomen or near the right shoulder blade'),
(12, 'Swelling or fluid build-up in the abdomen'),
(13, 'Itching'),
(14, 'Yellowing of the skin and eyes (jaundice)'),
(15, 'High blood pressure '),
(16, 'Weakness '),
(17, 'Muscle cramps '),
(18, 'Low blood potassium levels '),
(19, 'High blood pressure'),
(20, 'Low potassium level'),
(21, 'Heart palpitations'),
(22, 'Nervousness'),
(23, 'Feelings of anxiety or panic attacks'),
(24, 'Headache'),
(25, 'Excessive perspiration'),
(26, 'Diabetes'),
(27, 'Abdominal pain'),
(28, 'Unexplained weight gain or weight loss'),
(29, 'Weakness'),
(30, 'Abdominal stretch marks'),
(31, 'Excessive hair growth'),
(32, 'Unusual acne'),
(33, 'Change in libido (sex drive)'),
(34, 'A cough that does not go away or gets worse'),
(35, 'Chest pain that is often worse with deep breathing, coughing, or laughing.'),
(36, 'Hoarseness'),
(37, 'Weight loss and loss of appetite'),
(38, 'Coughing up blood or rust-colored sputum (spit or phlegm)'),
(39, 'Shortness of breath'),
(40, 'Feeling tired or weak'),
(41, 'Fatigue'),
(42, 'Cough'),
(43, 'Chest pain, if a tumor spreads to the lining of the lung or other parts of the body near the lungs'),
(44, 'Coughing up phlegm or mucus'),
(45, 'Blood in the urine'),
(46, 'Pain or pressure in the side or back'),
(47, 'A mass or lump in the side or back'),
(48, 'Swelling of the ankles and legs'),
(49, 'High blood pressure'),
(50, 'Anemia, which is a low red blood cell count'),
(51, 'Fatigue'),
(52, 'Loss of appetite'),
(53, 'Unexplained weight loss'),
(54, 'Recurrent fever that is not from cold, flu, or other infection');")or die(mysqli_error($conn));




?>

<?php
Error_Reporting(0);
$myfile = fopen("../inc/set.php", "w") or die("Unable to open file!");

$db_host =$server_name;
$db_user = $username;
$db_pass =$password;
$db_name = $db_name;
$site_url = $site_url;


$php_opening_tag = "<"."?"."php \n";
fwrite($myfile, $php_opening_tag);


$newline = "$"."db_host = '".$db_host."'; \n";
fwrite($myfile, $newline);

$newline = "$"."db_user = '".$db_user."'; \n";
fwrite($myfile, $newline);


$newline = "$"."db_pass = '".$db_pass."'; \n";
fwrite($myfile, $newline);

$newline = "$"."db_name = '".$db_name."'; \n";
fwrite($myfile, $newline);

$newline = "$"."site_url = '".$site_url."'; \n";
fwrite($myfile, $newline);



$php_clossing_tag = " ?>\n";
fwrite($myfile, $php_clossing_tag);



fclose($myfile);

echo "Done";

?>
<?php


header("location: ../index.php?msg=Software Installed Successfully");
  } else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<!-- General meta information -->
	<title>Install Wizard</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->


	<!-- Load Javascript -->
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="./js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
	<!-- // Load stylesheets -->

<script>


	$(document).ready(function(){

	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>

</head>
<body>

	<div id="wrapper">
<center>	<font color="green"><h2>Pls make changes where neccessary!</h2></font></center>
<br/><br/>

		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Install </h2>
<form action="#" method="POST">

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
 					<input type="text" id="url" name="server_name"  value="localhost" placeholder="Server Name"  required>
					<img id="url_password" src="./images/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>

<br/><br/><br/>
<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
 					<input type="text" id="url" name="username" value="root" placeholder="db User"  required>
					<img id="url_password" src="./images/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>




<br/><br/><br/>
<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
 					<input type="text" id="url" name="password" placeholder="Db Password" value="" >
					<img id="url_password" src="./images/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>
<?php
$mystring = 'http://' . $_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"];

$myurl = str_replace("install/index.php", "", $mystring);
 ?>

<br/><br/><br/>
<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
 					<input type="text" id="url" name="site_url" value="<?php echo $myurl; ?>"placeholder="Site url" required>
					<img id="url_password" src="./images/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>










			<div >
				<input  id="submit" name="install" type="submit" id="submit1" value="">
				</form>
			</div>




		</div>

		<div id="wrapperbottom"></div>

		<div id="powered">
 		</div>
	</div>

</body>
</html>

<?php } ?>