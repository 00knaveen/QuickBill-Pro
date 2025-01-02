@extends('layouts.header')
@section('content')

<div class="layout">
@include('layouts.dashboard-sidebar')
@if(session()->has('status-success'))
            <div class="alert alert-success login-success">
            <div class="full" ><div class="notifications alert-success cf"><span class="message-icon success"></span><p>  {{ session()->get('status-success') }}</p></div></div>
            </div>
        @endif
    <main class="main-content">
        <header>
            <h1>QuickBill Pro</h1>
            <button class="btn-secondary" id="add-product-btn">+ Add New Product</button>
        </header>
        <section class="tasks-projects">
           @include('billing-dashboard.add-product')
           @include('billing-dashboard.product-list')
           
        </section>
    </main>
</div>
@endsection