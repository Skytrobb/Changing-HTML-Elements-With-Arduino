<!-- This webpage will read from database and update the color of a 'div' -->

<html> 
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<head> 

    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>

   <title>jQuery AJAX Example</title> 

</head>  

<body>

 <p><strong>Change color with potentiometer</strong></p> 
 
<div id="records"></div>

</div> 

<p>
	<div id="red"></div>
</p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
<script type="text/javascript"> 

//AJAX and Jquery is used to update the webpage without needing to refresh
	
	function fetchdata(){ 
	//we will perform a 'GET' request using the php script that queries our database
      $.ajax({ method: "GET", url: "getdatamyversion.php", })
    
        .done(function(data) { 
		//parse the JSON that was returned from the php script
          var result = $.parseJSON(data); 
        //create string that holds the HTML elements
          var string = '<table><tr> <th>data</th> <th>reading</th> <tr>';
 
       /* from result create a string of data and append to the div */
       //.each will interate through the array that holds the key-value pairs
	   //with the results from the database query.
        $.each( result, function( key, value ) { 
		
		var dataread = key;
		//put the acquired data into the HTML file
             string += "<tr> <td> " +value['data']+' </td> <td> '+ value['reading']+"</td> </tr>"; }); 
             string += '</table>'; 
			 
          //display data on webpage at the #records element
          $("#records").html(string); 
          //call the 'red' <div> and use the .css() function to change the color
		  //of block.
          $("#red").css('background-color','rgb('+result[0]['data']+',220,200)')
		  //display the data to the console for troubleshooting purposes.
		  console.log(result[0]['data']);
		});
	}
    //whenever the document is ready. perform our AJAX function, fetchdata(), every 750ms
	//I've found that you can't get much faster than this without running into errors
	$(document).ready(function(){setInterval(fetchdata,750);
	});
	
	

</script> 



</body>

</html>