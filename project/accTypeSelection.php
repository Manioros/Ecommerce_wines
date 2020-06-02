<?PHP
$accType = $_POST['accType'];

if($accType == "customer")
{
    
    include 'custCreation.php';
} else
{
	include 'mercCreation.php';
}
?>