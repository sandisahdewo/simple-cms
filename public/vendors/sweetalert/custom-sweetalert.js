function confirm(msg = 'Data', action) {
swal({
  title: "Apakah Anda yakin?",
  text: msg,
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "OK",
},
function(){
    if($.isFunction(action)) {
        action();
    } else {
        document.location.href=action;
    }
});
}
