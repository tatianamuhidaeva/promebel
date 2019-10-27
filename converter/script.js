window.addEventListener('DOMContentLoaded', function () {
  'use strict';

  let inputRub = document.getElementById('rub'),
    inputUsd = document.getElementById('usd');

  inputRub.addEventListener('input', () => {

    let request = new XMLHttpRequest();



    request.open('GET', 'current.json');
    request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    request.send();

    request.addEventListener('readystatechange', function () {
      function postData() {
        return new Promise(function (resolve, reject) {
          if (request.readyState < 4) {
            console.log("request.readyState" + request.readyState);
            resolve("Загрузка...");
          } else if (request.readyState === 4 && request.status == 200) {
            console.log("request.readyState" + request.readyState);
            let data = JSON.parse(request.response);
            resolve(inputRub.value / data.usd);

          } else {
            console.log("request.readyState" + request.readyState);
            reject('Что-то пошло не так...');
            // 
          }
        });
      }
      postData()
        .then((res) => {
          console.log("then 1" + res);
          inputUsd.value = res;
        })
        .catch((miss) => {
          console.log("catch");
          inputUsd.value = miss;
        });
    });
  });
});