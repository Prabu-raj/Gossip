var chat12 = {}  

chat12.fetchMessages = function () {
 /// alert(2);
     $.ajax ({
     	url: 'http://localhost/PDBMS/PHP_FILES/groupbuffer.php' ,
     	type: 'post',
     	data: { method: 'fetch'},
     	success: function(data) {	
         $('.groupboxer .grouper').html(data);
     	}
     });
 }

chat12.throwmsg = function (msg) {
  
  //alert("twhrorinnng");
   if($.trim(msg).length !=0) {
   	 	//alert(msg);
	   	  $.ajax ( {
						     	
		     	url: 'http://localhost/PDBMS/PHP_FILES/groupbuffer.php' ,
		     	type: 'post',
		     	data: { method: 'throw' , message : msg },
		     	success: function(data) {	

					chat12.fetchMessages();
					chat12.entry.val (' ');		       
		     }
	     });

   	}

}

chat12.entry = $('.groupboxer .groupentry');
chat12.entry.bind('keydown',function(o) {
if(o.keyCode ===13 && o.shiftKey ===false){
	chat12.throwmsg($(this).val());
	o.preventDefault();
 }
});

chat12.interval = setInterval(chat12.fetchMessages,4000);
chat12.fetchMessages();