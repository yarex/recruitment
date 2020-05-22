@extends('base')

@section('title', "Create")


@section('content')

   <div class="container">
       <div class="row">
            <div class="col-4">Nazwa projektu</div>
            <div class="col-8">{{ $campaign->group->project->name ?? null}}</div>
        </div>
        <div class="row">
            <div class="col-4">Nazwa grupy projektu</div>
            <div class="col-8">{{ $campaign->group->name ?? null}}</div>
        </div>
        <div class="row">
            <div class="col-4">Nazwa kampanii</div>
            <div class="col-8">{{ $campaign->name }}</div>
        </div>
        <div class="row">
            <div class="col-4">Adres strony</div>
            <div class="col-8">{{ $campaign->group->project->website ?? null}}</div>
        </div>
        <div class="row">
            <div class="col-4">Zmiany aktywność projektu</div>
            <div class="col-8">
                @php
                    $active = $campaign->group->project->active ?? null;
                @endphp
                
                @if($active === 0)
                nieaktywny
                @elseif ($active === 1)
                aktywny
                @elseif ($active === 2)
                w trakcie realizacji
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">Data początkowa</div>
            <div class="col-8">{{ $campaign->date_start }}</div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="/projects">
                    <button class="btn btn-primary btn-block">Powrót</button>
                </a>
            </div>
        </div>
   </div>

@endsection