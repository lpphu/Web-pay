const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
  });
function get_cart(type) {
    // console.log(type);
      $.post("../models/shop_billdetails.php", {
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
      let tbody = $("tbody");
      tbody.html("");
      for (let i = 0; i < data.length; i++) {
        let product = `
            <tr>
                <td>${i+1}</td>
                <td>${data[i]['name']}</td>
                <td><input min='0' type="number" value="${data[i]['quantity']}"></td>
                <td><p>${formatter.format(data[i]['price'])}</p></td>
                <td>${formatter.format(data[i]['price']*data[i]['quantity'])}</td>
            </tr>
        `;
        tbody.append(product);
      }
      tbody.append(`
      <tr>
      <td colspan="7" style="text-align: right">
          <button type="button" class="btn btn-success" disabled>Cập nhật giỏ hàng</button>
          <button type="button" class="btn btn-danger">Thanh toán</button>
      </td>
  </tr>`);
    }
    $(function () {
      get_cart(0);
    });