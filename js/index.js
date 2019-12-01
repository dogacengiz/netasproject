$(document).ready(loadJSON());

function loadJSON() {

  $.getJSON("json/product.json", function (json) {

    if (json.carouselVegetable) {
      for (let i = 0; i < 3; i++) {
        if (i == 0) {
          $('#carouselVegetable').append('\
          <div class="carousel-item active">\
            <img class="d-block img-fluid" src="' + json.carouselVegetable[i].img + '">\
          </div>')
        } else {
          $('#carouselVegetable').append('\
          <div class="carousel-item">\
            <img class="d-block img-fluid" src="' + json.carouselVegetable[i].img + '">\
          </div>')
        }
      }
    }
    if (json.carouselFruit) {
      for (let i = 0; i < 3; i++) {
        if (i == 0) {
          $('#carouselFruit').append('\
          <div class="carousel-item active">\
            <img class="d-block img-fluid" src="' + json.carouselFruit[i].img + '">\
          </div>')
        } else {
          $('#carouselFruit').append('\
          <div class="carousel-item">\
            <img class="d-block img-fluid" src="' + json.carouselFruit[i].img + '">\
          </div>')
        }
      }
    }

    if (json.products) {
      json.products.filter(f => f.type == "vegetable").slice(0, 8).forEach(item => {
        $('#vegProducts').append('\
        <div class="col-lg-3 col-md-6 mb-4">\
            <div class="card h-65">\
              <a href="product.php?id=' + item.id + '"><img class="card-img-top pb-4" src="' + item.img + '" alt=""></a>\
              <div class="card-body border-top border-dark">\
                <p class="card-title"><a href="product.php?id=' + item.id + '" class="text-secondary h5">' + item.name + '</a></p>\
                <p class="h4">' + item.price + '</p>\
              </div>\
            </div>\
          </div>\
        ')
      });
    }
    var i=108;
    if (json.products) {
      $("#vegLoad").click(function () {
        json.products.filter(f => i< f.id && f.id< i+5).slice(0, 4).forEach(item => {
          $('#vegProducts').append('\
        <div class="col-lg-3 col-md-6 mb-4">\
            <div class="card h-65">\
              <a href="product.php?id=' + item.id + '"><img class="card-img-top pb-4" src="' + item.img + '" alt=""></a>\
              <div class="card-body border-top border-dark">\
                <p class="card-title"><a href="product.php?id=' + item.id + '" class="text-secondary h5">' + item.name + '</a></p>\
                <p class="h4">' + item.price + '</p>\
              </div>\
            </div>\
          </div>\
        ')
        });
        i=i+4;
      });
    }
    
    var j=8;
    if (json.products) {
      $("#fruitLoad").click(function () {
        json.products.filter(f => j< f.id && f.id< j+5).slice(0, 4).forEach(item => {
          $('#fruitProducts').append('\
      <div class="col-lg-3 col-md-6 mb-4">\
          <div class="card h-65">\
            <a href="product.php?id=' + item.id + '"><img class="card-img-top pb-4" src="' + item.img + '" alt=""></a>\
            <div class="card-body border-top border-dark">\
              <p class="card-title"><a href="product.php?id=' + item.id + '" class="text-secondary h5">' + item.name + '</a></p>\
              <p class="h4">' + item.price + '</p>\
            </div>\
          </div>\
        </div>\
      ')
        });
        j=j+4;
      });
    }


    if (json.products) {
      json.products.filter(f => f.type == "fruit").slice(0, 8).forEach(item => {
        $('#fruitProducts').append('\
      <div class="col-lg-3 col-md-6 mb-4">\
          <div class="card h-65">\
            <a href="product.php?id=' + item.id + '"><img class="card-img-top pb-4" src="' + item.img + '" alt=""></a>\
            <div class="card-body border-top border-dark">\
              <p class="card-title"><a href="product.php?id=' + item.id + '" class="text-secondary h5">' + item.name + '</a></p>\
              <p class="h4">' + item.price + '</p>\
            </div>\
          </div>\
        </div>\
      ')
      });
    }

  });

 

} 


