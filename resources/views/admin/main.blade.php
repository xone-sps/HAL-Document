<!DOCTYPE html>
<html>
@include('admin.layout.header')
<body>
		@include('admin.layout.navbar')
		@include('admin.layout.sidebar')
		@yield('content')
		@include('admin.layout.footer')
</body>
</html>