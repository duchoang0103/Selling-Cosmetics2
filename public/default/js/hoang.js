function sortBy(){
    $.get('/products?sortSelector='+$('#sortSelector').val()+'&catalog='+$('#catalogProducts').text(),function(data){
        $('#body').html(data);
    });
}

function addToCart(productid, product_title, product_price,verify){
    if(verify == null){
        alert("Bạn phải đăng nhập!");
    }else{
        let data = new Object();
        data.product_id = productid;
        data.product_title = product_title;
        data.quantity = 1;
        data.price = Number(product_price);
        //console.log(data);
        $.post('/cart',{product:JSON.stringify(data),addProduct:true},function(data){
            alert(data);
        });
    }
    
}