@extends( 'admin::layouts.master' )

@section( 'content' )

  <div class="admin--dashboard">
    @section( 'sidebar' )
      <aside class="admin--sidebar">
        @include( 'admin::includes/module_dropdown', [ 'selected' => 'admin' ] )

        <nav class="admin--sidebar-menu">
          <ul>
            <li>
              <h6>Auth</h6>

              <ul class="admin--sidebar-menu-sub">
                <li>
                  <a href="/_admin/users">Users</a>
                </li>
                <li>
                  <a href="/_admin/roles">Roles</a>
                </li>
                <li>
                  <a href="/_admin/permissions">Permissions</a>
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
      <nav class="admin--header">
        <ul>
          @section( 'header' )
            <li class="admin--header-separator"></li>

            <?php $user = new stdClass; $user->name = 'James' ?>
            <li class="admin--header-settings"><a href="/_admin/settings">
              <img src="https://molovo.co/assets/dist/img/me.jpg" />
              Hi, {{ $user->name }}</a>
            </li>
          @show
        </ul>
      </nav>

      <h1>@yield( 'title' )</h1>

      @yield( 'page' )
    </main>
  </div>

@stop