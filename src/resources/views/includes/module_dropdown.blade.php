<?php
  $url = $_SERVER[ 'REQUEST_URI' ];
  $module = explode( '/', $url )[1];

  $module_count = 1;
  if ( $journal_module = class_exists( 'Molovo\Journal\JournalServiceProvider' ) )
    $module_count++;

  if ( $market_module = class_exists( 'Molovo\Market\MarketServiceProvider' ) )
    $module_count++;
?>

<nav class="admin--sidebar-module-selector" module-count="{{ $module_count }}">
  <ul>
    <li class="admin--sidebar-module-selector-item {{ $module == '_admin' ? 'selected' : '' }}">
      <a href="/_admin">Admin</a>
    </li>

    @if( $journal_module )
      <li class="admin--sidebar-module-selector-item {{ $module == '_journal' ? 'selected' : '' }}">
        <a href="/_journal">Journal</a>
      </li>
    @endif

    @if( $market_module )
      <li class="admin--sidebar-module-selector-item {{ $module == '_market' ? 'selected' : '' }}">
        <a href="/_market">Market</a>
      </li>
    @endif
  </ul>
</nav>