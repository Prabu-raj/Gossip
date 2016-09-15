var chat12 = {}  

//alert(9);
chat12.fetchMessages = function () {
  //   script(2);
     $.ajax ({
     	url: 'http://localhost/PDBMS/PHP_FILES/chatbuffer.php' ,
     	type: 'post',
     	data: { method: 'fetch'},
     	success: function(data) {	
      //   script(3);
      //alert(data);
         $('.Chatboxer .chater').html(data);
     	}
     });
 }

chat12.throwmsg = function (msg) {
  
  //alert("twhrorinnng");
   if($.trim(msg).length !=0) {
   	 	//alert(msg);
	   	  $.ajax ( {
						     	
		     	url: 'http://localhost/PDBMS/PHP_FILES/chatbuffer.php' ,
		     	type: 'post',
		     	data: { method: 'throw' , message : msg },
		     	success: function(data) {	
		     	//	alert(data);
					chat12.fetchMessages();
					chat12.entry.val (' ');		       
		     }
	     });

   	}

}

chat12.entry = $('.Chatboxer .chatentry');
chat12.entry.bind('keydown',function(o) {
if(o.keyCode ===13 && o.shiftKey ===false){
	//alert($(this).val());
	chat12.throwmsg($(this).val());
	o.preventDefault();
 }
});

chat12.interval = setInterval(chat12.fetchMessages,2000);
chat12.fetchMessages();