function getQuestion(){
            
    var id = document.getElementById("idQ").value;
    alert("IBI");
    $.ajax({
        url: 'ClientGetQuestion.php?id='+id+'',
        success:function($datos){
            alert("DATOS->");
            alert($datos);
            $("#questionResult").html($datos);
        }
    });
}