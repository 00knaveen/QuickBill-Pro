@extends('layouts.header')
@section('content')

<div class="layout">
    @include('layouts.dashboard-sidebar')
    <main class="main-content">
        <header>
            <h1>Billing Page</h1>
        </header>
        <div class="project-list">
            <div class="project-card" data-status="en-cours">
                <div class="product-price-container">
                    <div class="form-control billing-email">
                        <label>Customer Email</label>
                        <input class="form-control" type="email" id="customerEmail" name="email" placeholder="Enter Customer Email">
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-more-product">+ Add New</button>
                </div>

                <form id="billing-form">
                    <div id="billing-section">
                    </div>
                    <div id="generate-billing" class="save-product d-none">
                        <button type="submit" class="btn btn-primary generate-billing">Generate Bill</button>
                        <button type="button" class="btn-secondary cancel-btn" id="cancel-bill">Cancel</button>
                    </div>
                </form>
                <div id="billing-details" class="tasks-section billing-details-container d-none">
                    <div id="userEmail"></div>
                <h2>Billing Details</h2>
                <span class="custormer-email"></span>
                <table id="billing-details-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Price per unit</th>
                            <th>Subtotal</th>
                            <th>Tax Percentage</th>
                            <th>Tax Amount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
             <span id="no-product" class="no-product-list d-none">
             Product details not found. Please try another product ID.
             </span>
            </div>
        </div>
    </main>
</div>

@endsection
