@extends('template_dashboard.template')

@section('title', 'Home')

@section('breadcrumb')
    <span> > Home</span>
    <span> > Test</span>
@endsection

<style>
    div.user {
        background: lightcyan;
        margin-bottom: 10px;
        box-shadow: 3px 3px 3px lightgray;
        border: 1px solid turquoise;
    }
</style>

@section('page-content')
    <section class="section card">
        <div class="card-body">
            first section
        </div>
    </section>
    <section style="height: 120vh;" class="section card">
        <div class="card-body">
            @foreach($users as $key => $user)
                <div class="user">
                    <div><strong>{{$user->name}}</strong></div>
                    <div>{{$user->email}}</div>
                    <div>{{$user->id}}</div>
                </div>
            @endforeach
        </div>
    </section>
@endsection