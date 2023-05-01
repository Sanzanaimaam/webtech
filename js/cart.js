const product=[
    {
        id:0,
        image:'image/homon.jpg',
        title:'honeymoon packages',
        price:2000,
    },
    {
        id:0,
        image:'image/family.jpg',
        title:'Family package',
        price:5000,
    },
    {
        id:2,
        image:'image/holiday.jpg',
        title:'Basic Holiday package',
        price:1000,
        
    },
    {
        id:3,
        image:'image/lux.jpg',
        title:'luxury Holiday package',
        price:1000,
        
    }
];

const categories = [...new Set(product.map((item) => {
    return item
  }))];
  
  let i=0;
  
  document.getElementById('root').innerHTML = categories.map((item) => {
    const { image, title, price } = item;
    return `
      <div class='box'>
        <div class='img-box'>
          <img class='images' src=${image} />
        </div>
        <div class='bottom'>
          <p>${title}</p>
          <h2>${price}.00</h2>
          <button onclick='addtocart(${i++})'>Add to cart</button>
        </div>
      </div>
    `;
  }).join('');
  
  let cart = [];
  
  function addtocart(a){
      cart.push({...categories[a]});
      displaycart();
  }
  
  function delElement(a){
      cart.splice(a, 1);
      displaycart();
  }
  
  function displaycart(a) {
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if (cart.length == 0) {
      document.getElementById('cartItem').innerText = "Your Cart is Empty";
      document.getElementById("total").innerHTML="$"+0+".00";
    } else {
      document.getElementById("cartItem").innerHTML = cart.map((item) => {
        const { image, title, price } = item;
        total=total+price;
        document.getElementById("total").innerHTML="$"+total+".00";
        return `
          <div class='cart-item'>
            <div class='row-img'>
              <img class='rowimg' src=${image}>
            </div>
            <p style='font-size:12px;'>${title}</p>
            <h2 style='font-size:15px;'>$ ${price}.00</h2>
            <i class='fa-solid fa-trash' onclick='delElement(${j++})'></i>
          </div>
        `;
      }).join('');
    }
  }
  
  function confirmCart() {
    if (cart.length > 0) {
      const paymentOptions = `
        <div>
          <h2>Please select a payment option:</h2>
          <div>
            <button class="payment-option">PayPal</button>
            <button class="payment-option">Credit Card</button>
            <button class="payment-option">Bkash</button>
            <button class="payment-option">Nogod</button>
          </div>
        </div>
      `;
      document.getElementById('paymentOptions').innerHTML = paymentOptions;
    }
  }
  