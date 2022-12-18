
 const formatter = new Intl.NumberFormat('en-US', {
   style: 'currency',
   currency: 'USD',
   // These options are needed to round to whole numbers if that's what you want.
   //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
   maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
 });
 
     function get_product(type) {
       // console.log(type);
         $.post("../api/show_category.php", {
           type: type,
         }).done(function (data, status) {
           data = JSON.parse(data);
           console.log(data);
           console.log(status);
           if (status) {
               show_data(data);
           }
         });
     }
       function show_data(data) {
         let productbody = $("#product");
         productbody.html("");
         for (let i = 0; i < data.length; i++) {
           let product = `
             <div class="col-lg-4 col-md-6 mb-4">
             <div class="card h-100">
               <div class="card-body">
                 <h4 class="card-title">
                   <a href="#product">${data[i]['name']}</a>
                 </h4>
                 <h5 style="color: #f47442">${formatter.format(data[i]['price'])}</h5>
               </div>
               <div class="card-footer">
                 <button id="${data[i]['id']}" onclick="addToCard(${data[i]['id']})" type="button" class="btn btn-primary">Add to cart</button>
 
               </div>
             </div>
           </div>
           `;
           productbody.append(product);
         }
       }
       $(function () {
         get_product(0);
       });


       let countCart = new Map();
       let totalQuantity = 0;
       function addToCard(id){
        let quantity = countCart.get((id))
        if (countCart.has(id)) quantity++;
        else quantity = 1;
        countCart.set(id,quantity);
        showCart();
       }
       function showCart(){
        let ele = $("#myCart");
        totalQuantity=0
        countCart.forEach((value,key,map)=>{totalQuantity += value})
        ele.html(`Cart (${totalQuantity} items)`);

        // in ra console
        console.log(totalQuantity);
        console.log(countCart);

        // save to cookie
        let json = JSON.stringify(Object.fromEntries(countCart))
        document.cookie = `${json}, ${(JSON.stringify(totalQuantity))}`;
        console.log(document.cookie)
       }

       $("#myCart").click(function(e){
          $.post("../controllers/addBill.php",
            {
              "send":Object.fromEntries(countCart),
              "total": totalQuantity
            },
            function(data,status){
              console.log(data);
              console.log(status);
            }
          );
       }) 