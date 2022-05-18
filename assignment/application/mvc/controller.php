<?php
//include_once "../model/model.php";
$pageURI = $_SERVER['REQUEST_URI'];
$pageURI = substr($pageURI,strrpos($pageURI,'controller.php')+15);
// $pageURI = str_replace(".php", "", $pageURI);
header("Content-Type: application/json"); #returning json data
if(is_string($pageURI)){
echo $pageURI();
}

function home()
{
    # all your stuff to do with home data and returning it
    // $data = getHomeData();
    // return json_encode($data);
    return json_encode(array("data" => "Hello World!"));
}

function otherPage()
{
    return json_encode(array("name" => "John Smith"));
}
function getHomePage(){
    return file_get_contents('https://users.sussex.ac.uk/~gm398/3dapp/assignment/application/model/home.php');
}
function get3dModelPage(){
    return file_get_contents('https://users.sussex.ac.uk/~gm398/3dapp/assignment/application/model/3dpage.php');
}
function getAboutPage(){
    return file_get_contents('https://users.sussex.ac.uk/~gm398/3dapp/assignment/application/model/about.php');
}
function getContactPage(){
    return file_get_contents('https://users.sussex.ac.uk/~gm398/3dapp/assignment/application/model/contact.php');
}