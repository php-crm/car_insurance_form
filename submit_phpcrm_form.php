<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
  $primary_name=$_POST['primary_name'];
  $commute_one_way=$_POST['commute_one_way'];
	$where_do_park=$_POST['where_do_park'];
  $comprehensive_collision=$_POST['comprehensive_collision'];
  $purchage_type=$_POST['purchage_type'];
  $satae_registered=$_POST['satae_registered'];

  $field1="<b>Primary driver of this vehicle:</b> ".$primary_name."<br>"."<b>How far is the primary driver's commute one way?: </b>".$commute_one_way."<br>"."<b>Where do you park your car?</b>: ".$where_do_park."<br>"."<b>Do you want Comprehensive and Collision coverage for this vehicle?</b>: ".$comprehensive_collision."<br>"."<b>Is this vehicle owned, leased, or financed?</b>: ".$purchage_type."<br>"."<b>In what state is your vehicle registered?</b>: ".$satae_registered;

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>