<aside class="sidebar">
            <h2>Dashboard</h2>
            <nav>
                <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
                        Add Product
                    </a>
                </li>
                <li>
                    <a href="{{ route('billing') }}" class="{{ Route::current()->getName() == 'billing' ? 'active' : '' }}">
                        Billing
                    </a>
                </li>

                    <li><a href="{{route('logout')}}">Log Out</a></li>
                </ul>
            </nav>
        </aside>