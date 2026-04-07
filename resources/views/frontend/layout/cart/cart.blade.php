@extends('frontend.layout.app')
@section('content')
@livewire('frontend.cart', [
'showcartData' => $showcartData,
])
@endsection