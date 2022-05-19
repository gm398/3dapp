<?php
include_once "../model/config.php";
$dbhandle = NULL;
$cardData = NULL;
$titleData = NULL;
    // Change connection string for different databases, currently using SQLite

$conn = dbConnection();

if (is_string($conn)) {
    $cardData = array();
    http_response_code(500);
    echo "<script>console.log('" . $conn ."')</script>";
    echo "<h1>There seems to be an error</h1>";
    exit;
}

$stmt = $conn->query("SELECT * FROM homeContent");
$cardData = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->query("SELECT * FROM homeTitle");
$titleData = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
          <div class="row"> <!-- Main_3D Image or Carousel -->
            <div class ="col-sm-12">
              <div id="main_3d_image">
              </div> 
              <div id="main_text" class="col-xs-12 col-sm-4">
                    <div id="title_home"><?php echo $titleData[0]["title"]; ?></div>
                    <div id="subTitle_home"><?php echo $titleData[0]["subTitle"]; ?></div>
                    <div id="description_home"><?php echo $titleData[0]["description"]; ?></div>
                </div> 
            </div>
          </div>

          <!-- Row of cards on the grid -->
          <div class="row">

              <?php for ($i = 0; $i < count($cardData); $i++)
                  { ?>
            <div class="col-sm-4">
                <div class="card">
                    <a href="<?php echo $cardData[$i]["renderIMG"]; ?>" data-fancybox data-caption="My 3D <?php echo $cardData[$i]["title"]?> Render">
                        <img id = "cardImage" class="card-img-top img-fluid img-thumbnail" src="<?php echo $cardData[$i]["imgURL"]; ?>" alt="Coca Cola">
                    </a>
                    <div class="card-body">
                        <div id="title_left" class="card-title drinksText"><?php echo $cardData[$i]["title"]; ?></div>
                        <div id="subTitle_left" class="card-subtitle drinksText"><?php echo $cardData[$i]["subtitle"]; ?></div>
                        <div id="description_left" class="card-text drinksText"><?php echo $cardData[$i]["description"]; ?></div>
                        <a href="<?php echo $cardData[$i]["urlToCoke"]; ?>" class="btn btn-primary btn-responsive">Find out more ...</a>
                    </div>
                </div>
            </div>
              <?php } ?>


    