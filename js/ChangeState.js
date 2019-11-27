function ChangeState(){
    alert("change");
      var email =$("#elegirmail").val();
      if(confirm("Estas seguro de que quieres Bloquear a "+email+"")==true){
        $.ajax({
        url: 'ChangeState.php?email='+email+'',
            success:function(datos){
              alert(datos);
            }
            });
        mostrarUsuarios();
      }
}