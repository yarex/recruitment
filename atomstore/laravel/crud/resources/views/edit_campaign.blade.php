@extends('base')

@section('title', "Edit")


@section('content')

    <div class="container">

        <form action="/projects/{{ $campaign->id }}" method="post">

        <div class="row">
            <div class="col-4">Nazwa projektu</div>
            <div class="col-4">
                <input type="text" 
                    class="" 
                    name="project_name" 
                    value="{{ $campaign->group->project->name ?? null}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4">Nazwa grupy projektu</div>
            <div class="col-4">
                <input type="text" 
                    class="" 
                    name="group_name" 
                    value="{{ $campaign->group->name ?? null}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4">Nazwa kampanii</div>
            <div class="col-4">
                <input type="text" 
                    class="" 
                    name="campaign_name" 
                    value="{{ $campaign->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4">Adres strony</div>
            <div class="col-4">
                <input type="text" 
                    class="" 
                    name="website" 
                    value="{{ $campaign->group->project->website ?? null }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4">Zmiany aktywność projektu</div>
            <div class="col-4">
                @php
                    $active = $campaign->group->project->active ?? null;
                @endphp

                <select name="active">
                    <option value="0" {{ $active == "0" ? "selected" : ""}}>nieaktywny</option>
                    <option value="1" {{ $active == "1" ? "selected" : ""}}>aktywny</option>
                    <option value="2" {{ $active == "2" ? "selected" : ""}}>w trakcie realizacji</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">Data początkowa</div>
            <div class="col-4">
                <input type="date" 
                    class="" 
                    name="date_start" 
                    value="{{ $campaign->date_start }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-success btn-block">Zatwierdź</button>
            </div>
        </div>

        </form>

        <div class="row">
            <div class="col-6">
                <a href="/projects">
                    <button class="btn btn-primary btn-block">Powrót</button>
                </a>
            </div>
        </div>
    </div>



@endsection