<!-- Coding Debugging (https://codingdebugging.com) -->
<!DOCTYPE html>
<html lang="en">

<head>

   <title>SIP Calculator - Coding Debugging</title>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />

   <!----------- jquery  --------->
   <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
   <!---------- bootstrap  --------->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

   <!-- My Stylesheet -->
   <style type="text/css">
      body {
         font-family: "Baloo Thambi 2", cursive;
      }

      .calc-container #form {
         width: 400px;
         max-width: 450px;
         min-height: 350px;
         box-shadow: -1px 5px 15px -4px rgba(0, 0, 0, .3);
         border-radius: 16px;
         padding: 40px;
      }

      #form input[type="radio"]:checked {
         position: absolute;
         left: -1100px;
      }

      #form input[type="radio"]:not(:checked) {
         position: absolute;
         left: -1150px;
      }


      #form input[type="radio"]:checked+.label,
      #form input[type="radio"]:not(:checked)+.label {
         position: relative;
         padding-left: 30px;
      }

      #form input[type="radio"]:checked+.label::after,
      #form input[type="radio"]:not(:checked)+.label::after {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         width: 20px;
         height: 20px;
         box-shadow: 0px 3px 11px -3px rgba(0, 0, 0, .5);
         border-radius: 50%;
      }

      #form input[type="radio"]:checked+.label::before,
      #form input[type="radio"]:not(:checked)+.label::before {
         content: '';
         position: absolute;
         top: 3px;
         left: 3px;
         width: 14px;
         height: 14px;
         border-radius: 50%;
      }

      #form input[type="radio"]:checked+.label::before {
         background: #f55;
         transition: all .2s linear;
      }

      #form label {
         margin: 0;
      }

      #form input[type="number"] {
         width: 75%;
         border-width: 0;
         border-bottom-width: 1px;
         padding: 3px 10px;
      }

      #form input[type="number"]:focus {
         box-shadow: none;
      }

      .result-container ul li {
         display: flex;
         justify-content: space-between;
         width: 90%;
         margin-bottom: 8px;
      }

      .result-container ul li .output {
         padding: 3px 15px;
         font-weight: bold;
      }
   </style>

</head>

<body>

   <div class="calc-container my-5 container-md mx-auto">
      <form action="" method="POST" id="form">
         <h3 class="text-center py-2">SIP Calculator</h3>
         <div class="options mb-3 row mx-auto p-0">
            <div class="col-4">
               <input type="radio" name="type" value="sip" id="sip" checked="checked">
               <label for="sip" class="label">SIP</label>
            </div>
            <div class="col-4">
               <input type="radio" name="type" value="lumpsum" id="lumpsum">
               <label for="lumpsum" class="label">LUMPSUM</label>
            </div>
         </div>
         <div class="mb-3">
            <label for="investment" class="form-label">Monthly Investment(Rs)</label>
            <input required type="number" name="investment" class="form-control" id="investment">
         </div>
         <div class="mb-3">
            <label for="period" class="form-label">Investment Period (Years)</label>
            <input required type="number" name="period" class="form-control" id="period">
         </div>
         <div class="mb-3">
            <label for="return" class="form-label">Expected Annual Returns (%)</label>
            <input required type="number" name="return" class="form-control" id="return">
         </div>
         <div class="mb-3">
            <button class="btn btn-danger" type="submit" name="submit">Calculate</button>
         </div>

         <div class="result-container">
            <h4>Result</h4>
            <ul class="list-unstyled">
               <?php
               if (isset($_POST['submit'])) {

                  $amount = $_POST['investment'];
                  $period = $_POST['period'];
                  $return = $_POST['return'];

                  $monthlyRate = $return / 12 / 100;
                  $months = $period * 12;

                  $futureValue = $amount * (pow(1 + $monthlyRate, $months) - 1) /
                     $monthlyRate;
                  $invested = $months * $amount;
                  $wealth_gain = $futureValue - $invested;

                  echo '<li>Expected Amount: <span class="output return">Rs ' . round($futureValue, 2) . '</span></li>
               <li>Amount Invested: <span class="output invest">Rs ' . round($invested, 2) . '</span></li>
               <li>Profit Amount: <span class="output profit">Rs ' . round($wealth_gain, 2) . '</span></li>';
               }
               ?>
            </ul>
         </div>
      </form>


   </div>





   <footer class="footer mt-auto py-3 bg-light">
      <div class="container text-center">
         <span class="text-muted">Copyright &copy;2020 | SIP Calculator</span>
      </div>
   </footer>
   <script>
      // $(document).ready(function() {
      //    let amount = "";
      //    let period = "";
      //    let returns = "";
      //    $('input[name=investment]').change(function() {
      //       amount = $(this).val();
      //    });
      //    $('input[name=period]').change(function() {
      //       period = $(this).val();
      //    });
      //    $('input[name=return]').change(function() {
      //       returns = $(this).val();
      //    });

      //    let monthlyRate = returns / 12 / 100;
      //    let months = period * 12;

      //    let futureValue = amount * (pow(1 + monthlyRate, months) - 1) / monthlyRate;
      //    let invested = months * amount;
      //    let wealth_gain = futureValue - invested;

      //    let a = round($futureValue, 2);
      //    let b = round($invested, 2);
      //    let c = round($wealth_gain, 2);

      //    $('.invest').html('444');
      //    $('.return').html(b);
      //    $('.profit').html(c);


      // })
   </script>
</body>

</html>