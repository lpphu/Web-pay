
 const formatter = new Intl.NumberFormat('en-US', {
   style: 'currency',
   currency: 'USD',
   // These options are needed to round to whole numbers if that's what you want.
   //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
   maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
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