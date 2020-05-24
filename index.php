<?php

    include 'logic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

   <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- My Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <title>Covid-19 </title>
</head>
<body>

<div class="header">
  <a href="#default" class="logo"><img src="https://www.animatedimages.org/data/media/118/animated-robot-image-0048.gif" alt="Computer Man" style="width:100px;height:100px;"></a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="contact.html">Contact</a>
    <a href="about.html">About</a>
  </div>
</div>

<div class="container-fluid bg-light p-4 text-center my-5">
 <h1 class="">HI! THIS IS MIKE</h1>
</div>
    <div class="container-fluid bg-light p-5 text-center my-3">
        <h1 class="">Covid-19 Tracker</h1>
       
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-4 text-warning">
                <h5>Confirmed</h5>
                <?php echo $total_confirmed;?>
            </div>
            <div class="col-4 text-success">
                <h5>Recovered</h5>
                <?php echo $total_recovered;?>
            </div>
            <div class="col-4 text-danger">
                <h5>Deceased</h5>
                <?php echo $total_deaths;?>
            </div>
        </div>
    </div>

    <div class="container bg-light p-3 my-5 text-center">
        <h5 class="text-info">"Prevention is the Cure."</h5>
        <p class="text-muted">Stay Indoors Stay Safe.</p>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Countries</th>
                        <th scope="col">Confirmed</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">Deceased</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $key => $value){
                            $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key?></th>
                            <td>
                                <?php echo $value[$days_count]['confirmed'];?>
                                <?php if($increase != 0){ ?>
                                    <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>  
                                <?php } ?>    
                            </td>
                            <td><?php echo $value[$days_count]['recovered'];?></td>
                            <td><?php echo $value[$days_count]['deaths'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Copyright &copy;2020, <a href="https://packetcode.in" target="_blank">Packetcode</a></span>
        </div>
    </footer>

 <script>
            window.watsonAssistantChatOptions = {
                integrationID: "9f6af214-7f74-4ce6-923e-40e29c078712", // The ID of this integration.
                region: "eu-gb", // The region your integration is hosted in.
                serviceInstanceID: "17db458f-d1f9-4dd1-9ef9-6a856eac728f", // The ID of your service instance.
                onLoad: function(instance) { instance.render(); }
              };
            setTimeout(function(){
              const t=document.createElement('script');
              t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
              document.head.appendChild(t);
            });
          </script>
          <script>
            window.watsonAssistantChatOptions = {
              // A UUID like '1d7e34d5-3952-4b86-90eb-7c7232b9b540' included in the embed code provided in Watson Assistant.
              integrationID: "9f6af214-7f74-4ce6-923e-40e29c078712",
              // Your assistants region e.g. 'us-south', 'us-east', 'jp-tok' 'au-syd', 'eu-gb', 'eu-de', etc.
              region: "eu-gb",
              // The callback function that is called after the widget instance has been created.
              onLoad: function(instance) {
                instance.updateCSSVariables({
                'BASE-font-family': '"Times New Roman", Times, serif',
                '$focus': '#000000',
                '$hover-primary': '#FFD700',
                '$interactive-01': '#800000'
      });
                instance.render();
              }
            };
            setTimeout(function(){const t=document.createElement('script');t.src='https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js';document.head.appendChild(t);});
          </script>

</body>
</html>