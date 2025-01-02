<div id="projects-section" class="projects-section d-none">
    <h2>Add New Products</h2>
    <form action="{{route('add-product')}}" method="post">
        @csrf
        <div class="project-list">
            <div class="project-card" data-status="en-cours">
                <div class="form-control">
                    <label>Product Id</label>
                    <input class="form-control" Id="checkProductId" name="product_id" placeholder="Enter A Product ID">
                    <span id="product-error" class="error d-none">product Id is already Available</span>
                </div>
                <div class="form-control">
                    <label>Product Name</label>
                    <input class="form-control" name="name" placeholder="Enter A Product Name">
                </div>
            </div>
            <div class="project-card" data-status="a-faire">
                <div class="form-control">
                    <label>Available Stocks</label>
                    <input class="form-control" name="available_stocks" placeholder="Enter A Product Stocks">
                </div>
                <div class="form-control">
                    <div class="product-price-container">
                        <div class="product-price">
                            <label>Product Price</label>
                            <input class="form-control" name="price" placeholder="Enter A Product Price">
                        </div>
                        <div class="product-percentage">
                            <label>Product Tax Percentage</label>
                            <input class="form-control" name="tax_percentage" max="2" placeholder="Enter A Product Tax Percentage">
                        </div>
                        <div class="save-product">
                            <button type="submit" id="save-product" class="btn-secondary disabled">+ Save</button>
                            <button type="button" class="btn-secondary cancel-btn" id="cancel-product-btn">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>