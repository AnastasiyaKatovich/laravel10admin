$(document).ready(function() {

//кнопка вверх
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
//конец кнопки вверх


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
