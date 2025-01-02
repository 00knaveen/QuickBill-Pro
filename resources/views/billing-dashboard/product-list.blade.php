<div class="tasks-section">
    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Available Stocks</th>
                <th>price</th>
                <th>Tax Percentage</th>
                <th>created At</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products)>0)
            @foreach($products as $product)
            <tr data-status="en-cours">
                <td>{{@$product->id}}</td>
                <td>{{@$product->product_id}}</td>
                <td>{{@$product->name}}</td>
                <td>{{@$product->available_stocks}}</td>
                <td>${{@$product->price}}</td>
                <td>{{@$product->tax_percentage}} %</td>
                <td>{{@$product->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr data-status="a-faire">
                <td col="6">No Product Available</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>