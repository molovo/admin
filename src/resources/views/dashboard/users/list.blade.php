@extends( 'admin::dashboard.users' )

@section( 'title', 'Users' )

@section( 'page' )
  <ul>
    @foreach( $users as $user )
      <li>
        {{ $user->title }}
      </li>
    @endforeach
  </ul>
@endsection