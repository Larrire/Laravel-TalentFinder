@extends('template_dashboard.template')

@section('head')
    <link href="{{ asset('css/pages/search.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('title', 'Search')

@section('breadcrumb')
    <span> > Search</span>
@endsection

@section('page-content')
    <section id="form-section" class="section card">
        <div class="search-element">
            <select class="button search-select" name="" id="">
                <option value="">Talents</option>
                <option value="">Companies</option>
            </select>
            <input type="text" class="search-input" placeholder="Search here...">
            <button class="button button-purple search-button">Search</button>
        </div>
    </section>
    <section id="main-section" style="height: 120vh;" class="section">
        <main id="main-search-results" class="card">
            <div class="card-body">
                Search results
            </div>
        </main>
        <aside id="aside-search-filters" class="card">
            <div class="card-body">
                Filters
            </div>
        </aside>
    </section>
@endsection