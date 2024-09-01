<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($id) ? 'Edit' : 'Tambah' }} {{ $data['title'] }}</title>
</head>

<body>
  <main>
    <h1>{{ isset($id) ? 'Edit' : 'Tambah' }} {{ $data['title'] }}</h1>
    @if (isset($id))
    <form method="POST" action="{{ route($data['name_route'] . ".update", $id) }}">
      @method('PUT')
    @else
      <form method="POST" action="{{ route($data['name_route'] . ".store") }}">
      @method('POST')
      <input type="hidden" name="{{ $data['primary'] }}" value="{{ bin2hex(random_bytes(10)) }}">
  @endif
        @csrf
        @foreach ($columns as $i => $name)
      @if ($i == 0)
      @continue
    @endif
      <input type="text" name="{{ $name }}" id="{{ $name }}" placeholder="{{$data['columns'][$i]}}">
    @endforeach
        <button type="submit">{{ isset($id) ? 'Edit' : 'Tambah' }}</button>
      </form>
  </main>
</body>

</html>
