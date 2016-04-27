<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Search</title>
		<!-- Bootstrap -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
	$(document).ready(function(){
    $("form").submit(function(event){
    	event.preventDefault();
    	c = $("#inputCountry").val();
		console.log("c="+c);   
            $.get("http://ws.audioscrobbler.com/2.0?method=geo.gettopartists&country="+c+"&api_key=9b8fe797db777de34100a61d9726a5d3&format=json", function(data, status){
            console.log("Data: " + data + "\nStatus: " + status);
        	var length = data.length;
        	var txt = "";
        	if(length > 0){
                    for(var i=0;i<length;i++){
                        if(data[i].topartists){
                            txt += "<tr><td>"+data[i].topartists+"</td><td>"+data[i].image+"</td></tr>";
                        }
                    }
                    if(txt != ""){
                        $("#table").append(txt).removeClass("hidden");
                    }
                }	
        });
    });
    });
    
    </script>
        
    </head>
    <body>
     <div class="container">
	      <h2 class="form-search-heading">Search Artist</h2>
       	   <form id="target" action="/search">
           <div class="form-group">	       	   
            <input type="text" id="inputCountry" class="form-control" placeholder="Country" required autofocus />
           </div>
           <div class="form-group" align="center">	  
            <button type="submit" class="btn btn-default">Search</button>
            </div>
       </form>
		<table id="table" class="hidden">
    <tr>
        <th>Album</th>
        <th>Artist</th>
    </tr>
</table>	
    </div> <!-- /container -->
    </body>
</html>
