function AddQuestionsAjax(form){
    $.ajax(
    {
        url : '../php/AddQuestion.php',
        type: 'POST',
        cache : false,
        data: $("form").serialize(),
        success: function(data){
           $("#errores").text(data);
            ShowQuestionsAjax();
        },
        error: function(data){
            $("#errores").text(data);
        }

    });
    
        
	}
