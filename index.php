<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Program</title>

    <style>
    #countdownnewyear {
      text-align: center;
      font-size: 30px;
      margin-top: 0px;
      display: none;
    }
   
    div#quiz-wrap {
        border: 5px dashed #4a2f2f;
        margin-top: 10px;
        background: #f1f1f1;
        padding: 10px 0;
        width: 100%;
        max-width: 350px;
        margin: 10px auto;
    }
    </style>
  </head>
  <body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
            <div id="quiz-wrap">
            <!-- <h1 class="text-center">New Year Countdown</h1> -->
            <h2 class="text-center">Play Quiz</h2>
            <p id="countdownnewyear"></p>			

			<form class="m-4" id="programs" action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST">
			
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Select Option</label>
			    <select class="form-control" name="program" id="select_program" required="">
                  <optgroup label="Airthmetic Quiz">
			      <option value="">--Select--</option>
			      <option value="sumOfDigits">Sum of Digit</option>
			      <option value="evenOddProgram">Odd/Even (Even or odd number)</option>
			      <option value="factorialProgram">Factorial</option>
			      <option value="tableOfNumber">Table of number</option>
			      <option value="primeNumber">First 15 prime number</option>
			      <option value="armstrongNumber">Armstrong Number</option>
                  <option value="palindromeNumber">Palindrome Number (Ex 1235321)</option>
              </optgroup>                              
			    </select>
			  </div>
			  <div class="form-group" id="digit_div">
			    <label for="digit">Enter number </label>
			    <input  class="form-control"  placeholder="" type="number" name="digit" id="digit" value="5" >
			  </div>				   
			   <input type="submit" name="submit" value="Check" class="btn btn-block btn-success">
			</form>

			<div class="m-4 font-italic font-weight-bold text-center">

                <div class="card bg-light mb-3" style="max-width: 18rem;">
                  <div class="card-header">Answer</div>
                  <div class="card-body">
                    <!-- <h5 class="card-title">Light card title</h5> -->
                    <p class="card-text" id="ajax_response" > To see the answer to the quiz, please select the option from the dropdown and enter a number. (Note: the default number is 5. You can change a number.) </p>
                  </div>
                </div>

            </div>
	       </div>
		</div>
	</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$("#select_program").on('change', function() {
    	  //alert( this.value );
    	  $("#ajax_response").text('');


    	  if(this.value == "primeNumber"){
    	  	$("#digit_div").hide();
    	  }
    	  else{
    	  	$("#digit_div").show();
    	  }

    	});
    </script>
    <script type="text/javascript">
    	// Variable to hold request
    	var request;

    	// Bind to the submit event of our form
    	$("#programs").submit(function(event){

    	    // Prevent default posting of form - put here to work in case of errors
    	    event.preventDefault();

    	    // Abort any pending request
    	    if (request) {
    	        request.abort();
    	    }
    	    // setup some local variables
    	    var $form = $(this);

    	    // Let's select and cache all the fields
    	    var $inputs = $form.find("input, select, button, textarea");

    	    // Serialize the data in the form
    	    var serializedData = $form.serialize();

    	    // Let's disable the inputs for the duration of the Ajax request.
    	    // Note: we disable elements AFTER the form data has been serialized.
    	    // Disabled form elements will not be serialized.
    	    $inputs.prop("disabled", true);

    	    // Fire off the request to /form.php
    	    request = $.ajax({
    	        url: "http://localhost/workshop/program-ajax.php",
    	        type: "post",
    	        data: serializedData
    	    });

    	    // Callback handler that will be called on success
    	    request.done(function (response, textStatus, jqXHR){
    	        // Log a message to the console
    	        //console.log("Hooray, it worked!");
    	        //console.log(response);
    	        $("#ajax_response").html(response);
    	    });

    	    // Callback handler that will be called on failure
    	    request.fail(function (jqXHR, textStatus, errorThrown){
    	        // Log the error to the console
    	        console.error(
    	            "The following error occurred: "+
    	            textStatus, errorThrown
    	        );
    	    });

    	    // Callback handler that will be called regardless
    	    // if the request failed or succeeded
    	    request.always(function () {
    	        // Reenable the inputs
    	        $inputs.prop("disabled", false);
    	    });

    	});
    </script>


    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 1, 2020 00:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="countdownnewyear"
      document.getElementById("countdownnewyear").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdownnewyear").innerHTML = "Happy New Year! 2020";
      }
    }, 1000);
    </script>
  </body>
</html>