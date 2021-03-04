$(document).ready(function () {//
    $("form").submit(function(evt){
        var formData = new FormData($(this)[0]);
         $.ajax({
             url: 'php/upload.php',
             type: 'post',
             data: formData,
             contentType: false,
             cache: false,
             processData: false,                        
             success: function (result) {
                 alert('Result: ' + result);
             }
         });
    });
});