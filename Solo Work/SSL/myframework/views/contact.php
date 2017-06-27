<?php echo $data['style']; ?>
<?

  function create_image($cap){
   
    unlink("./assets/image1.png");

    global $image;

    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

    $background_color = imagecolorallocate($image, 255, 255, 255);

    $text_color = imagecolorallocate($image, 0, 255, 255);

    $line_color = imagecolorallocate($image, 64, 64, 64);

    $pixel_color = imagecolorallocate($image, 0, 0, 255);

    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    for ($i = 0; $i < 3; $i++) {

      imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);

    }

    for ($i = 0; $i < 1000; $i++) {

      imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);

    }

    $text_color = imagecolorallocate($image, 0, 0, 0);

    ImageString($image, 5, 30, 22, $cap, $text_color);

    imagepng($image, "./assets/image1.png");

}
  create_image($data["cap"]);

  echo "<img src='/assets/image1.png'>";

?>


<form action="/welcome/reciveContact" method="POST" id="myForm">
  <div>
    <label for="exampleInputEmail1">Enter Captcha </label>
    <input name="captcha" type="captcha" id="captcha"  placeholder="">
  </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
      </div>
  <div class="form-group">
    <label for="example-text-input" class="col-2 col-form-label">Name</label>
  <div class="col-10">
    <input class="form-control" type="text" name="name" id="example-text-input" required>
  </div>
  </div>
  <div class="form-group">
     <label for="example-text-input" class="col-2 col-form-label">Subject</label>
    <div class="col-10">
    <input class="form-control" type="text" name="subject" id="example-text-input" required>
  </div>
  </div>
  <div class="form-group">
    <label for="exampleSelect1">How long will the prject take?</label>
    <select class="form-control" id="exampleSelect1" name="time">
      <option>2 weeks</option>
      <option>1 month</option>
      <option>1 to 2 months</option>
      <option>6 months</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Project Description</label>
    <textarea class="form-control" id="exampleTextarea" rows="3" required></textarea>
  </div>
  <fieldset class="form-group">
    <legend>Focus of project</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Development" checked>
        Development
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="Design">
        Design 
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="Social Media">
        Social Media
      </label>
    </div>
  </fieldset>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="check" value="Yes">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>