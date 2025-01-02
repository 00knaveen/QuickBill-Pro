
$("document").ready(function() {
    $('#add-product-btn').click(function(){
        $('#add-product-btn').addClass('d-none');
        $("#projects-section").removeClass('d-none');
    });
    $("#cancel-product-btn").click(function(){
        $('#add-product-btn').removeClass('d-none');
        $("#projects-section").addClass('d-none');
       
     });
     $('#checkProductId').on('keyup', function() {
        let id = $("#checkProductId").val();
        $.ajax({
            url: "/check/productId",
            data: {
                productId: id,
            },
            type: 'GET',
            dataType: 'JSON',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(data) {
               console.log('product id response');
               console.log(data.id);
               if(data && data.status == 200){
                $('#product-error').removeClass('d-none');
                $("#save-product").addClass('disabled');
               }
               else{
                $('#product-error').addClass('d-none');
                $("#save-product").removeClass('disabled');
               }
            },
            error: function(data) {
                console.log(data);
            }
        });
    
    });

        $("#add-more-product").click(function () {
            let layout = `
                <div class="product-container-billing">
                    <div class="form-control">
                        <label>Product ID</label>
                        <input class="form-control" name="product_id[]" placeholder="Enter Product ID">
                    </div>
                    <div class="form-control">
                        <label>Quantity</label>
                        <input class="form-control" name="quantity[]" placeholder="Enter Quantity">
                    </div>
                    <span type="button" class="btn btn-danger remove-product">X</span>
                </div>
            `;
            $("#generate-billing").removeClass('d-none');
            $("#billing-section").append(layout);
        });
        $(document).on("click", ".remove-product", function () {
            $(this).closest(".product-container-billing").remove();
        });
        $("#billing-form").submit(function (event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            let groupedData = [];
            let productIds = [];
            let quantities = [];
            formData.forEach((field) => {
                if (field.name === "product_id[]") {
                    productIds.push(field.value);
                } else if (field.name === "quantity[]") {
                    quantities.push(field.value);
                }
            });
            for (let product = 0; product < productIds.length; product++) {
                groupedData.push({
                    product_id: productIds[product],
                    quantity: quantities[product]
                });
            }
    
            console.log(groupedData);
            $.ajax({
                url: '/generate/billing',
                method: 'GET',
                data: { email: $('#customerEmail').val(), products: groupedData },
                success: function (response) {
                    if (response.status === 'success') {
                        const billingDetails = response.billing_details;
                        const products = billingDetails.products;
                        const tbody = $('#billing-details-table tbody');
                        tbody.empty();
                        
                        if(billingDetails && billingDetails.email){
                            let userDetails = `<div class="customer-email">
                            <label>Customer Email : </label>
                            ${billingDetails.email}</div>`;
                            $("#userEmail").html(userDetails);
                        }
                        if(products && products.length>0){
                            $("#no-product").addClass('d-none');
                            $('#billing-details').removeClass('d-none');
                        products.forEach((product, index) => {
                            const row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${product.product_id}</td>
                                    <td>${product.quantity}</td>
                                    <td>$${parseFloat(product.price_per_unit).toFixed(2)}</td>
                                    <td>$${parseFloat(product.subtotal).toFixed(2)}</td>
                                    <td>${parseFloat(product.tax_percentage).toFixed(2)}%</td>
                                    <td>$${parseFloat(product.tax_amount).toFixed(2)}</td>
                                    <td>$${parseFloat(product.total).toFixed(2)}</td>
                                </tr>
                            `;
                            tbody.append(row);
                        });
                        const summary = billingDetails.summary;
                        const summaryRow = `
                            <tr>
                                <td colspan="4" style="text-align: right; font-weight: bold;">Summary</td>
                                <td>Total Without Tax: $${parseFloat(summary.total_without_tax).toFixed(2)}</td>
                                <td>Total Tax: $${parseFloat(summary.total_tax).toFixed(2)}</td>
                                <td colspan="2">Grand Total: $${parseFloat(summary.grand_total).toFixed(2)}</td>
                            </tr>
                        `;
                        tbody.append(summaryRow);
                    }
                    else{
                        $("#billing-details").addClass('d-none');
                        $("#no-product").removeClass('d-none');
                    }
                    } else {
                        console.log("An error occurred while retrieving billing details.");
                    }
                },
                error: function (error) {
                    console.log("An error occurred!");
                    console.error(error);
                }
            });
            
        });
        $("#cancel-bill").click(function(){
            $("#generate-billing").addClass('d-none');
            $("#billing-details").addClass('d-none');
            $("#no-product").addClass('d-none');
            $('#billing-section').html('');
        })
    });
            
            
     
    