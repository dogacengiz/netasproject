$(document).ready(loadJSON());
function loadJSON(path = "json/product.json") {
  let urlParams = new URLSearchParams(window.location.search);
  $.getJSON(path, function (json) {
      if (urlParams.has('id')) {
        json.products.forEach(item => {
            if (item.id == urlParams.get('id')) {
              $('#productName').append('\
              <h1 class="text-left text-secondary border-bottom border-dark ">' + item.name + '</h1>'
                )
              $('#productImg').append('\
                  <img src=' + item.img + ' alt="foto_product" class="shadow-lg p-4 m-5 bg-white rounded text-center">')
              $('#productDescrip').append('\
                  <h4 class="border-top border-dark text-secondary">' + item.description + '</h4>')
              $('#productPrice').append('\
                  <div class="d-flex justify-content-center my-3 flex-wrap">\
                    <div class="col-6 my-auto">\
                      <h4 class=" text-secondary">Price:</h4>\
                    </div>\
                    <div class="col-4 my-auto">\
                      <h4 class="text-secondary">'+item.price + '</h4>\
                    </div>')
            }
          });
        }
      });
  }