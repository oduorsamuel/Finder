/**
 * Created by User on 3/21/2018.
 */
$(document).ready(
    function(){
        category();
        function category(){
            $.ajax(
                {
                   url: "action.php",
                    method: "POST",
                    data:{category:1},
                        success:function(data){
                            $("#get_category").html(data);
                        }
                }
            )

        }
    }

)
 
$(document).ready(
    function(){
        item();
        function item(){
            $.ajax(
                {
                   url: "action.php",
                    method: "POST",
                    data:{getItem:1},
                        success:function(data){
                            $("#get_items").html(data);
                        }
                }
            )

        }
		
		$("body").delegate(".category","click",function(event){
			event.preventDefault();
			var cid=$(this).attr('cid');
		
            $.ajax(
                {
                   url: "action.php",
                    method: "POST",
                    data:{get_selected_category:1, cat_name:cid},
                        success:function(data){
                            $("#get_items").html(data);
                        }
                }
            )
				
		
		})
		
    }

)