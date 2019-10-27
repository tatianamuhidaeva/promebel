let drink = 0;

function shoot(arrow, headshot, fail) {
  console.log('Вы сделали выстрел..');

  let promise = new Promise(function(resolve, reject){
    setTimeout(function(){
      Math.random() > .5 ? resolve('Вы попали!') : reject("Вы промахнулись");
    }, 3000)
  })
  return promise;
};

function win(){
  console.log('Вы победили!');
  (drink ==1) ?  buyBeer() : giveMoney();
}

function buyBeer(){
  console.log('Вы купили пиво!');
}

function giveMoney(){
  console.log('Вы взяли деньги!');
}

function loose(){
  console.log('Вы проиграли!')
}
shoot({})
  .then((mark) => 
  console.log(mark))
  .then(() => {
    win();
  })
  .catch(
    (miss) =>{
      console.error(miss);
      loose();
    })
  