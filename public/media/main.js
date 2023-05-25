$(document).ready(function() {
// аккордеон
  $(".panel-header p").on('click', function(){
    $(this).parent().siblings('.panel-body').toggle();
  });


  //rotate
  var tmpAnimation = 0
  $('.rotate-a').click(function(){
    var element = $('.rotate-img')
    tmpAnimation = tmpAnimation + 360;
    $({degrees:tmpAnimation -360}).animate({degrees:tmpAnimation},{
      duration: 1000,
      step: function(now){
        element.css({
          transform:'rotate('+now+ 'deg)'
        });
      }
    });
  });


  $(function(){
    $('.repeat-cooke').click(function(){
      // буквы
        var classes =  $(this).parent().attr('class');
          $(this).parent().attr('class', 'animate');
          var indicator = $(this);
          setTimeout(function(){
            $(indicator).parent().addClass(classes);
          }, 100);
      });
  });

  $('.salatImg').click(function(){
    let cardBlock = $(this);
    cardBlock.animate(
        {
            justFun: 90
        },
        {
            step: function (currentValue) {
                cardBlock.css('transform', `rotateY(${currentValue}deg)`);
            },
            complete: function () {
                cardBlock.find('.cover').toggle();
                cardBlock.find('.face').toggle();
                cardBlock.animate(
                    { justFun: 0 },
                    {
                        step: function (currentValue, fx) {
                            cardBlock.css('transform', `rotateY(${currentValue}deg)`);
                        },
                        duration: 2000
                    });
            },
            duration: 2000
        });
  });



// добавление продуктов
  window.onload = function() {

    var aLi = document.getElementsByTagName('li');
    var oDiv = document.getElementsByClassName('div2')[0];

    var obj = {};
    var iNum = 0;
    var allMoney = null;

    for(var i = 0; i < aLi.length; i++) {
        aLi[i].ondragstart = function(ev) {

            var aP = this.getElementsByTagName('p');

            ev.dataTransfer.setData('title', aP[0].innerHTML);
            ev.dataTransfer.setData('money', aP[1].innerHTML);

            ev.dataTransfer.setDragImage(this, 0, 0);
        };

        oDiv.ondragover = function(ev) {

            ev.preventDefault();

        }

        oDiv.ondrop = function(ev) {

            ev.preventDefault();

            var Ltitle = ev.dataTransfer.getData('title');
            var Lmoney = ev.dataTransfer.getData('money');

            if(!obj[Ltitle]) {

                var oP = document.createElement('p');
                var oSpan = document.createElement('span');

                oSpan.className = 'box1';
                oSpan.innerHTML = 1;

                oP.appendChild(oSpan);

                var oSpan = document.createElement('span');

                oSpan.className = 'box2';
                oSpan.innerHTML = Ltitle;

                oP.appendChild(oSpan);

                var oSpan = document.createElement('span');

                oSpan.className = 'box3';
                oSpan.innerHTML = Lmoney;

                oP.appendChild(oSpan);

                oDiv.appendChild(oP);

                obj[Ltitle] = 1;

            } else {

                var aBox1 = document.getElementsByClassName('box1');
                var aBox2 = document.getElementsByClassName('box2');

                for(var i = 0; i < aBox2.length; i++) {
                    if(aBox2[i].innerHTML == Ltitle) {
                        aBox1[i].innerHTML = parseInt(aBox1[i].innerHTML) + 1;

                    }

                }
            }

            if(!allMoney) {
                allMoney = document.createElement('div');
                allMoney.className = 'allMoney';
            }
            iNum += parseInt(Lmoney);

            allMoney.innerHTML = 'Итого:' + iNum + 'р.';

            oDiv.appendChild(allMoney);
        }
    }

}
// прогресс бар
  $(function(){
    $('#submit').click( function (){
      let elem = document.getElementById('progress-line'),
        width = 99,
        id = setInterval(progressStatus,50);
        function progressStatus() {
          if(width <= 0){
            clearInterval(id);
          }else{
            width--;
            elem.style.width = width + '%';
            elem.innerHTML = width * 1 + '%';
          }
        }
    });
  });

});
