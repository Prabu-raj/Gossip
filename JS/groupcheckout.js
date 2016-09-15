$('.Groupchater').click(function() {
//alert(1);	
var t='#';
var x=($(t+$(this).attr('id')).html());
var match, result = "", regex = /<b>(.*?)<\/b>/ig;
while (match = regex.exec(x)) { result += match[1]; }
$.ajax({
        type: "POST",
        url: 'http://localhost/PDBMS/PHP_FILES/grouppostname.php',
        data: { RESName : result },
        success: function(data)
         {
           var a=0;
           }
      });
});