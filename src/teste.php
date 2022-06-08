 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Autocomplete textbox using jQuery, PHP and MySQL</title>  
           <?php include("head-contents.php"); ?> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <style>  


          #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Autocomplete textbox using jQuery, PHP and MySQL</h3><br />  
                <label>Enter Country Name</label>  
                <input type="text" name="country" id="country" class="form-control countries" placeholder="Enter Country Name" /> 
                <div id="countryList"></div> 
                <label>Code</label>  
                <input type="text" name="country" class="form-control countries" placeholder="Enter Country Name" />  
                
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
 	
      $('#country').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"auto.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           } 
           else{
           		$('#countryList').fadeOut(); 
           } 
      });  
      $(document).on('click', 'li', function(){  
           $('#country').val($(this).text());  
           $('#countryList').fadeOut();  
      });  
 });  
 </script>  