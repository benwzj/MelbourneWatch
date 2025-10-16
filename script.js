// Product list
const productList = [
  {
    id: "1", 
    name: "Garmin vivoactive 5 (Black/Slate) 44mm domn Band",
    image: "https://cdn.shopify.com/s/files/1/0024/9803/5810/products/665844-Product-0-I-638307609604535334_600x600.jpg?v=1695164595", 
    thumb1: "https://www.jbhifi.com.au/cdn/shop/products/665844-Product-5-I-638307609604836700.jpg?v=1695164595",
    thumb2: "https://www.jbhifi.com.au/cdn/shop/products/665844-Product-7-I-638307609605643815.jpg?v=1695164595",
    thumb3: "https://www.jbhifi.com.au/cdn/shop/products/665844-Product-1-I-638307609605480716.jpg?v=1695164595",
    thumb4: "https://www.jbhifi.com.au/cdn/shop/products/665844-Product-4-I-638307609605183603.jpg?v=1695164595",
    model: "010-02862-10",
    price:350,
    overview: `Garmin vivoactive 5 (Black/Slate) 44mm domn Band, 
      Key Features
      Bright AMOLED display
      Designed with a bright, colourful display, get a more complete picture of your health, thanks to battery life of up to 11 days in smartwatch mode.

      Body Battery™ energy monitoring
      Body Battery™ energy monitoring helps you understand when you’re charged up or need to rest, with even more personalized insights based on sleep, naps, stress levels, workouts and more (data presented is intended to be a close estimation of metrics tracked).

      Sleep coaching
      Get a sleep score and personalized sleep coaching for how much sleep you need — and get tips on how to improve plus key metrics such as HRV status to better understand your health (data presented is intended to be a close estimation of metrics tracked).

      30 built-in sports apps
      Find new ways to keep your body moving with more than 30 built-in indoor and GPS sports apps, including walking, running, cycling, HIIT, swimming, golf and more.
     `
  },
  {
    id: "2", 
    name: "Apple Watch Ultra 49mm GPS + Cellular",
    image: "https://cdn.shopify.com/s/files/1/0024/9803/5810/files/663051-Product-0-I-638615422208592294_600x600.jpg?v=1725945498", 
    thumb1: "https://www.jbhifi.com.au/cdn/shop/files/663051-Product-0-I-638615422208592294.jpg?v=1725945498",
    thumb2: "https://www.jbhifi.com.au/cdn/shop/files/663051-Product-1-I-638615422207106369.jpg?v=1725945498",
    thumb3: "https://www.jbhifi.com.au/cdn/shop/files/663051-Product-2-I-638615422207093308.jpg?v=1725945498",
    thumb4: "https://www.jbhifi.com.au/cdn/shop/files/663051-Product-5-I-638615422207970914.jpg?v=1725945498",
    model: "MX4P3ZP/A",
    price: 1259,
    overview: `Apple Watch Ultra 2, the ultimate sports and adventure watch, 
      is now available in a satin Black titanium finish. 
      It features multiday battery life, precision dual-frequency GPS1 and Apple’s brightest display ever. 
      It also has a durable titanium case, sapphire front crystal and customisable Action button.
      Freedom Calls
      With a carrier plan, you can call and text without your iPhone nearby.
      6 Stream your favourite music and podcasts. Get directions with Maps.
      Maximise Your Training
      Advanced metrics, views and experiences in the Workout app, including Heart Rate Zones, customised workouts and training load, which can provide insights into the impact your workouts have on your body over time.
      For Runners: Precision dual-frequency GPS for incredible accuracy.1 Automatic track detection. Advanced running form metrics to help understand how efficiently you run. Customisable workouts that can include warm-ups, recovery intervals and time to cool down.
      `
  },
  {id: "3", name: "Apple Watch Series 10 46mm GPS and Cellular Ocean Band",image: "https://www.jbhifi.com.au/cdn/shop/files/656226-Product-0-I-638615334006044870.jpg?v=1725937968", price:1288},
  {id: "4", name: "Apple Watch SE 40mm GPS + Cellular Golden Case",image: "https://www.jbhifi.com.au/cdn/shop/files/785301-Product-0-I-638615484605550148.jpg?v=1725965189", price:355},
  {id: "5", name: "Samsung Galaxy Watch7 LTE 44mm GPS + Cellular Red Band",image: "https://cdn.shopify.com/s/files/1/0024/9803/5810/files/754671-Product-0-I-638562494404549905_600x600.jpg?v=1720653615", price:690},
  {id: "6", name: "Huawei Watch GT 5 Pro 46mm Titanium Case GPS + goodle",image: "https://www.jbhifi.com.au/cdn/shop/files/792215-Product-0-I-638675180408414794.jpg?v=1731921316", price:599},
];

// get cart information from localStorage
function getCartStorage(){

  const cartList = JSON.parse (localStorage.getItem ("cart_list"));
  if (!cartList) {
    // Requirement: e.Include at least 3 products in the shopping cart
    localStorage.setItem ("cart_list", JSON.stringify(['1','2','2']));
  }

  // const totalPrice = cartList.reduce((sum, item) => sum + item.price, 0) ?? 0;
  const totalPrice = cartList.reduce(
    (sum, item) => sum + productList.find(p=>p.id === item).price, 0
  ) ?? 0;

  const checkoutNumber = cartList.length;

  return {cartList, totalPrice, checkoutNumber};
}

// set cart information to localStorage
function setCartStorage(cart){
  localStorage.setItem ("cart_list", JSON.stringify(cart.cartList));
}

function addItem(productId) {

  const cart = getCartStorage ();

  cart.cartList.push (productId);
  cart.totalPrice += productList.find (product => product.id === productId).price;
  cart.checkoutNumber += 1;

  setCartStorage (cart);

  updateCartDisplay (cart);

}

function delItemByCartId (cartId){

  const cart = getCartStorage ();

  cart.totalPrice -= productList.find(product => product.id === cart.cartList[cartId]).price;
  cart.cartList.splice (cartId, 1);
  cart.checkoutNumber -= 1;
  setCartStorage (cart);

  updateCartDisplay (cart);
}

function updateCartDisplay(cart) {

  // Update Cart
  updateCartListDisplay (cart.cartList); 
  document.getElementById("checkout_number").innerHTML = cart.checkoutNumber;
  document.getElementById("total_price").innerHTML = '$' + cart.totalPrice;
}

function updateCartListDisplay(cartList) {
  let cartListHtml = '';
  let cartId = 0;

  // Update Cart list
  for (const productId of cartList) {
    cartListHtml += `
      <div class="cart_item">
        <div class="cart_item_img">
          <img 
            src="${productList.find(product => product.id === productId).image}" 
            alt="apple watch"
          >
        </div>
        <div class="cart_item_content">
          <div>${productList.find(product => product.id === productId).name}</div> 
          <button class="cart_item_remove" onclick="delItemByCartId(${cartId})">Remove</button>
        </div>
        <div class="cart_item_price">$${productList.find(product => product.id === productId).price}</div>
      </div>
    `;
    cartId ++;
  }
  document.querySelector(".cart_list").innerHTML = cartListHtml;
}

function initialProuctPage() {

  // Get the full query string part from the URL
  const queryString = window.location.search; 
  const params = new URLSearchParams(queryString);
  const productId = params.get("product_id"); 

  // Setup product page
  document.querySelector(".product_images").innerHTML = 
  `
    <div class="product_images_big">
      <img 
        class="product_images_big_img"
        src="${productList.find(product => product.id === productId).image}" 
        alt="${productId}"
      >
    </div>
    <div  class="product_images_list">
      <img 
        class="product_images_small"
        src="${productList.find(product => product.id === productId).thumb1}" 
        alt="${productId}"
      >
      <img 
        class="product_images_small"
        src="${productList.find(product => product.id === productId).thumb2}" 
        alt="${productId}"
      >
      <img 
        class="product_images_small"
        src="${productList.find(product => product.id === productId).thumb3}" 
        alt="${productId}"
      >
      <img 
        class="product_images_small"
        src="${productList.find(product => product.id === productId).thumb4}" 
        alt="${productId}"
      >
    </div>
  `
  document.querySelector(".product_des").innerHTML = 
  `
    <div class="product_des_title">
      ${productList.find(product => product.id === productId).name}
    </div>
    <div class="product_des_model">
      ${productList.find(product => product.id === productId).model}
    </div>
    <div class="product_des_price">
      $${productList.find(product => product.id === productId).price}
    </div>
    <button class="product_des_add" onclick="addItem('${productId}')">
      Add to Cart
    </button>
    <div class="product_des_overview">
      Product Overview
    </div>
    <div class="product_des_des">
      ${productList.find(product => product.id === productId).overview}
    </div>
  `

  // Get the main image element
  const mainImage = document.querySelector(".product_images_big_img");

  // Get all thumbnails
  const thumbnails = document.querySelectorAll(".product_images_small");

  // Add mouseover event to each thumbnail
  thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener("mouseover", () => {
      mainImage.src = thumbnail.src; // Change main image
    });
  });

}
