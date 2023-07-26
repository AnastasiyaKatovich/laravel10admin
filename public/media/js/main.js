$(document).ready(function() {
    if ( $('#checkbox').is(':checked')){
        $('#countries').attr('disabled', 'disabled');
    } else {
        $('#countries').removeAttr('disabled');
    }
    // онлайн не активны страны
    $('#checkbox').click(function(){
        if ($(this).is(':checked')){
            $('#countries').attr('disabled', 'disabled');
        } else {
            $('#countries').removeAttr('disabled');
        }
    });

// пример прогресс бар
  $(function(){
    // $('#submit').click( function (){
    //   let elem = document.getElementById('progress-line'),
    //     width = 99,
    //     id = setInterval(progressStatus,50);
    //     function progressStatus() {
    //       if(width <= 0){
    //         clearInterval(id);
    //       }else{
    //         width--;
    //         elem.style.width = width + '%';
    //         elem.innerHTML = width * 1 + '%';
    //       }
    //     }
    // });
    $('#catalog_id').change(function(){
        // console.log($(this).val())
        $.ajax({
            'url':`/catalog/${$(this).val()}/subcatalog`,
            'method':'Get',
            'error':function(msg){
                console.log(msg)
            },
            'success':function(data){
                $('#subcatalog_empty').html(data);
            }
        })
      })
  });
});
