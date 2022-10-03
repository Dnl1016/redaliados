@extends('layouts.app')

@section('content')
window.Vue = require('vue');
<div class="container">
    <div class="row">
        <passport-clients></passport-clients>
    </div>
</div>
@endsection