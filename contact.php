<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
<!-- i used this website for design -> https://bootsnipp.com/snippets/35VBm -->
    
<!--Contact page -->
<div class="container" id="contactForm">
    <div class="shadow-lg p-3 mt-5 bg-white ">
        <h3 class="text-center font-weight-bold">Contact Us!</h3>
    </div>
</div>

<div class="container" >
    <div class="shadow-lg p-3 bg-white ">
        <div class="form-group " >
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user "></i></div>
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name and Surname" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope "></i></div>
                </div>
                <input type="email" class="form-control" id="name" name="email" placeholder="example@gmail.com" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-comment "></i></div>
                </div>
                <textarea class="form-control" placeholder="Enter your message!" required></textarea>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" id="contactButton" value="Send" class="btn btn-block rounded-0 py-2">
        </div>
      </div>
</div>
<!--End Contact-->
 
<?php include('templates/footer.php'); ?>

    
</html>
