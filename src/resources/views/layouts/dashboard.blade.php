@extends( 'admin::layouts.master' )

@section( 'content' )

  <div class="admin--dashboard">
    @section( 'sidebar' )
      <aside class="admin--sidebar">
        <a href="/" class="admin--sidebar-logo">Admin</a>

        <nav class="admin--sidebar-menu">
          <ul>
            <li>
              <h6>Users</h6>

              <ul class="admin--sidebar-menu-sub">
                <li>
                  <a href="/users">Users</a>
                </li>
                <li>
                  <a href="/product-categories">Categories</a>
                </li>
              </ul>
            </li>

            <li>
              <h6>Customers</h6>

              <ul class="admin--sidebar-menu-sub">
                <li>
                  <a href="/customers">Customers</a>
                </li>
                <li>
                  <a href="/orders">Orders</a>
                </li>
                <li>
                  <a href="/baskets">Baskets</a>
                </li>
              </ul>
            </li>

            <li>
              <h6>Settings</h6>

              <ul class="admin--sidebar-menu-sub">
                <li>
                  <a href="/settings/payment-methods">Payment Methods</a>
                </li>
                <li>
                  <a href="/settings/delivery-methods">Delivery Methods</a>
                </li>
                <li>
                  <a href="/settings/emails">Emails</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </aside>
    @show

    <main role="main" class="admin--main">
      <h1>@yield( 'title' )</h1>

      @yield( 'page' )
    </main>
  </div>

@stop