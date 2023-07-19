function confirmacion(evento){
    if (confirm("¿Estás seguro de borrar el elemento seleccionado?")){
        return true
    } else{
        evento.preventDefault();
    }
}

let LinkDelete = document.querySelectorAll(".eliminar_bd");
for (var i=0;i<LinkDelete.length; i++){
    LinkDelete[i].addEventListener('click',confirmacion);
}