@extends('layouts.app')
@section( 'content')
<div id="app">
  <form action="/send" method="GET">
    @csrf


    <div class="form-group">
      <label for=""></label>
      <input type="text"
        class="form-control" name="messege" id="" aria-describedby="helpId" placeholder="Messege">
      <small id="helpId" class="form-text text-muted">Help text</small>
      <button class="btn btn-primary">sand</button>
    </div>
  </form>
</div>
@endsection
